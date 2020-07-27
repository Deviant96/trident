<?php

// be sure that this file not accessed directly
if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} elseif (INDEX_AUTH != 1) { 
    die("can not access this file directly");
}

/*
if (defined('LIGHTWEIGHT_MODE')) {
    header('Location: index.php');
}
*/

// required file
require LIB.'member_logon.inc.php';

// start the output buffering for main content
ob_start();

// update password
if (isset($_POST['forgotPassword'])) {

  # <!-- Captcha form processing - start -->
  if ($sysconf['captcha']['register']['enable']) {
    if ($sysconf['captcha']['register']['type'] == 'recaptcha') {
        require_once LIB.$sysconf['captcha']['register']['folder'].'/'.$sysconf['captcha']['register']['incfile'];
        $privatekey = $sysconf['captcha']['register']['privatekey'];
        $resp = recaptcha_check_answer ($privatekey,
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]);

        if (!$resp->is_valid) {
            // What happens when the CAPTCHA was entered incorrectly
            session_unset();
            header("location:index.php?p=forgot_password&captchaInvalid=true");
            die();
        }
    } else if ($sysconf['captcha']['register']['type'] == 'others') {
        # other captchas here
    }
    }
    # <!-- Captcha form processing - end -->

    $change_pass = ChangePasswordNew( $_POST['nim'], $_POST['newpasswd'], $_POST['cnfrmnewpasswd'], $_POST['member_name']);
    if ($change_pass === true) {
        echo "<div class='alert alert-success' role='alert'>".__('Your password have been changed successfully.')."</div>";
        header('refresh:2; url=index.php?p=member');
      } else {
        if ($change_pass === PASSWD_NOT_MATCH) {
            $info = __('Password confirmation FAILED! Make sure to check undercase or uppercase letters!');
        } else {
            $info = __('Password update FAILED! ERROR ON DATABASE!' .$_POST['birthdate']);
        }
       echo '<span style="font-size: 120%; font-weight: bold; color: red;">'.$info.'</span>';
    }
}

function ChangePasswordNew($str_user, $str_new_pass, $str_conf_new_pass, $str_name)
    {
        global $dbs;
        $bdate = date($str_birthdate);
        $_sql_user_check = sprintf('SELECT member_id FROM member WHERE member_id=\'%s\' AND member_name=\'%s\'',
            $dbs->escape_string(trim($str_user)), $dbs->escape_string(trim($str_name)));
        /*($_sql_pass_check = sprintf('SELECT member_id FROM member
            WHERE mpasswd=MD5(\'%s\') AND member_id=\'%s\'',
            $dbs->escape_string(trim($str_curr_pass)), $dbs->escape_string(trim($str_user)));*/
        //$_pass_check = $dbs->query($_sql_pass_check);
        $_user_check = $dbs->query($_sql_user_check);
        if ($_user_check->num_rows == 1) {
            $str_new_pass = trim($str_new_pass);
            $str_conf_new_pass = trim($str_conf_new_pass);
            // password confirmation check
            if ($str_new_pass && $str_conf_new_pass && ($str_new_pass === $str_conf_new_pass)) {
                $_new_password = password_hash($str_conf_new_pass, PASSWORD_BCRYPT);
                $_sql_update_mpasswd = sprintf('UPDATE member SET mpasswd=\'%s\'
                    WHERE member_id=\'%s\'', $dbs->escape_string($_new_password), $dbs->escape_string(trim($str_user)));
                @$dbs->query($_sql_update_mpasswd);
                if (!$dbs->error) {
                    return true;
                } else {
                    return CANT_UPDATE_PASSWD;
                }
            } else {
                return PASSWD_NOT_MATCH;
            }
        }
    }
?>
<div class="pnjForm text-left">
    <noscript>
        <div style="font-weight: bold; color: #FF0000;"><?php echo __('Your browser does not support Javascript or Javascript is disabled. Application won\'t run without Javascript!'); ?><div>
    </noscript>
    <?php
    // captcha invalid warning
    if (isset($_GET['captchaInvalid']) && $_GET['captchaInvalid'] === 'true') {
      echo '<div class="alert alert-danger" role="alert">'.__('Wrong Captcha Code entered, Please write the right code!').'</div>';
    }
    ?>
    <form action="index.php?p=forgot_password" method="post" >

        <div class="form-group row">
          <label for="textfield3" class="col-sm-2 col-form-label"><?php echo __('Member Name'); ?></label>
          <div class="col-sm-10">
            <div class="login_input">
              <input type="text" class="form-control" id="textfield3" name="member_name" placeholder="<?php echo __('Please input your name');?>" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="textfield3" class="col-sm-2 col-form-label"><?php echo __('NIM/NIP'); ?></label>
          <div class="col-sm-10">
            <div class="login_input">
              <input type="number" class="form-control" id="textfield3" name="nim" placeholder="<?php echo __('Please input your NIM or NIP');?>" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label"><?php echo __('New Password'); ?></label>
          <div class="col-sm-10">
            <div class="login_input">
              <input type="password" class="form-control" id="inputPassword3" name="newpasswd" placeholder="<?php echo __('Please input your password');?>" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputPassword4" class="col-sm-2 col-form-label"><?php echo __('Confirm Password'); ?></label>
          <div class="col-sm-10">
            <div class="login_input">
              <input type="password" class="form-control" id="inputPassword4" name="cnfrmnewpasswd" placeholder="<?php echo __('Please input your password again');?>" required>
            </div>
          </div>
        </div>

        <!-- Captcha in form - start -->
        <div>
          <?php if ($sysconf['captcha']['register']['enable']) { ?>
            <?php if ($sysconf['captcha']['register']['type'] == "recaptcha") { ?>
            <div class="captchaMember centeri mb-3">
            <?php
              require_once LIB.$sysconf['captcha']['register']['folder'].'/'.$sysconf['captcha']['register']['incfile'];
              $publickey = $sysconf['captcha']['register']['publickey'];
              echo recaptcha_get_html($publickey);
            ?>
            </div>
            <!-- <div><input type="text" name="captcha_code" id="captcha-form" style="width: 80%;" /></div> -->
          <?php
            } elseif ($sysconf['captcha']['register']['type'] == "others") {

            }
            #debugging
            #echo SWB.'lib/'.$sysconf['captcha']['folder'].'/'.$sysconf['captcha']['webfile'];
          } ?>
          </div>
          <!-- Captcha in form - end -->

        <div class="marginTop">
        <input type="submit" name="forgotPassword" value="<?php echo __('Change Password'); ?>" class="btn btn-primary btn-block" />
        </div>
    </form>
</div>

<script type="text/javascript">jQuery('#userName').focus();</script>

<?php
// main content
$main_content = ob_get_clean();

// page title
$page_title = __('Library Automation Login').' | '.$sysconf['library_name'];

if ($sysconf['template']['base'] == 'html') {
    // create the template object
    $template = new simbio_template_parser($sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/forgot_password_template.html');
    // assign content to markers
    $template->assign('<!--PAGE_TITLE-->', $page_title);
    $template->assign('<!--CSS-->', $sysconf['template']['css']);
    $template->assign('<!--MAIN_CONTENT-->', $main_content);
    // print out the template
    $template->printOut();
} else if ($sysconf['template']['base'] == 'php') {
    require_once $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/forgot_password_template.inc.php';
}
exit();
