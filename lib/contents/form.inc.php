<?php
/**
 *
 * Member Area/Information
 * Copyright (C) 2009  Arie Nugraha (dicarve@yahoo.com)
 * Patched by Hendro Wicaksono (hendrowicaksono@yahoo.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */


$info = __('Registration');
$page_title = __('Registration');
// Modified by Ilham Arnomo
if (isset($_POST['daftarButton'])) {

  
  $member_name = $dbs->escape_string(trim($_POST['member_name']));
	$member_id = $dbs->escape_string(trim($_POST['member_id']));
	//$register_date = $_POST['register_date'];
	$register_date = $dbs->escape_string(trim(date("Y-m-d")));
	$expire_date = $dbs->escape_string(trim(date("Y-m-d")));
	$member_since_date = $dbs->escape_string(trim(date("Y-m-d")));
	$last_update = $dbs->escape_string(trim(date("Y-m-d")));
  $inst_name = $dbs->escape_string(trim($_POST["member_major"]));
  $study_year = $dbs->escape_string(trim($_POST["study_year"]));
	$member_phone = $dbs->escape_string(trim($_POST['member_phone']));
	$pin = $dbs->escape_string(trim($_POST['pin']));
	$member_email = $dbs->escape_string(trim($_POST['member_email']));
	$mpasswd = $dbs->escape_string(trim(password_hash($_POST['mpasswd'],PASSWORD_BCRYPT)));
	$cnfrmmpasswd = $dbs->escape_string(trim($_POST['cnfrmmpasswd']));



	$tambah = sprintf("INSERT INTO member(
    member_id, 
    member_name, 
    inst_name, 
    study_year,
		register_date,
    expire_date,
    member_since_date,
    is_pending,
    member_phone,
    pin, 
    member_email, 
    last_update, 
    mpasswd) 
		VALUES (
      '%s', 
      '%s', 
      '%s', 
      %d,
      '%s', 
      '%s', 
      '%s',
       %d, 
       '%s', 
       '%s', 
			'%s', 
      '%s', 
      '%s')",
      $member_id, 
      $member_name, 
      $inst_name, 
      $study_year,
      $register_date, 
      $expire_date,
      $member_since_date, 
      1, 
      $member_phone, 
      $pin, 
      $member_email, 
      $last_update, 
      $mpasswd);

	//die($tambah);

  global $dbs;

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
            header("location:index.php?p=form&captchaInvalid=true");
            die();
        }
    } else if ($sysconf['captcha']['register']['type'] == 'others') {
        # other captchas here
    }
    }
    # <!-- Captcha form processing - end -->

    if(empty($_POST['member_name']) || empty($_POST['member_id']) || empty($_POST['member_major']) || empty($_POST['study_year']) || empty($_POST['member_phone']) || empty($_POST['member_email']))
    {
      $result = "<div class='alert alert-danger' role='alert'>Pendaftaran Gagal! Pastikan semua form terisi</div>";
    }
    else
    {
      if(strlen($_POST['member_phone']) > 15)
      {
        $result = "<div class='alert alert-danger' role='alert'>Pendaftaran Gagal! Nomor telepon melebihi batas maks 15 digit</div>";
      } else {
        if (password_verify($cnfrmmpasswd, $mpasswd)) {
              


            if (!$dbs->error) {
              $hasil = @$dbs->query($tambah);
              if ($dbs->affected_rows > 0 ) {
                $result = "<div class='alert alert-success' role='alert'>Terima kasih, anda telah terdaftar. Anda akan diarahkan ke halaman login</div>";
                header('refresh:5; url=index.php?p=member');
              } else if ($dbs->error) {
                echo '<div class="errorBox">'.$dbs->error.'</div>';
              }	
            } else {
                $result = "<div class='alert alert-danger' role='alert'>Pendaftaran Gagal! Error tidak diketahui</div>";
            }
        } else {
          var_dump($mpasswd);var_dump($cnfrmmpasswd);
            $result = "<div class='alert alert-danger' role='alert'>Pendaftaran Gagal! Password tidak sama</div>";
        }
      }
    }


}
?>

<?php
  // captcha invalid warning
  if (isset($_GET['captchaInvalid']) && $_GET['captchaInvalid'] === 'true') {
    echo '<div class="errorBox">'.__('Wrong Captcha Code entered, Please write the right code!').'</div>';
  }
?>

<div class="pnjForm text-left">
  <div><?php echo $result;?></div>
  <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="index.php?p=form">
    <div class="form-group row">
      <label for="textfield3" class="col-sm-3 col-form-label"><?php echo __('Member Name'); ?></label>
      <div class="col-sm">
        <div class="login_input">
          <input type="text" class="form-control" id="textfield3" name="member_name" placeholder="<?php echo __('Please input your name');?>" required>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="member_id" class="col-sm-3 col-form-label"><?php echo __('NIM/NIP'); ?></label>
      <div class="col-sm">
        <div class="login_input">
          <input type="number" class="form-control" id="member_id" name="member_id" aria-describedby="nimHelpBlock" placeholder="<?php echo __('Please input your NIM or NIP');?>" required>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="textfield3" class="col-sm-3 col-form-label"><?php echo __('Major/Rank'); ?></label>
      <div class="col-sm">
        <div class="login_input">
        <select name="member_major" class="custom-select" required>
          <option disabled selected><?php echo __("Select your major/rank");?></option>
          <?php
            $_jurusan_sql = sprintf('SELECT nama_jurusan FROM tipe_jurusan ORDER BY jurusan_id DESC');
            $_jurusan_q = $dbs->query($_jurusan_sql);
            while($_jurusan_d=$_jurusan_q->fetch_row()){
              echo "<option value='". $_jurusan_d[0] ."'>" .$_jurusan_d[0] ."</option>";
            }
          ?>
        </select>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="textfield3" class="col-sm-3 col-form-label"><?php echo __('Study Year'); ?></label>
      <div class="col-sm">
        <div class="login_input">
          <input type="number" class="form-control" id="textfield3" name="study_year"  placeholder="<?php echo __('Please input your study year');?>" required>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="textfield3" class="col-sm-3 col-form-label"><?php echo __('Phone Number'); ?></label>
      <div class="col-sm">
        <div class="login_input">
          <input type="number" class="form-control" id="textfield3" name="member_phone" placeholder="<?php echo __('Please input your phone number');?>" max="999999999999999" required>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="mail" class="col-sm-3 col-form-label"><?php echo __('Email'); ?></label>
      <div class="col-sm">
        <div class="login_input">
          <input type="email" class="form-control" id="mail" name="member_email" placeholder="<?php echo __('Please input your email');?>" required>
        </div>
      </div>
    </div>
    
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo __('Password'); ?></label>
      <div class="col-sm">
        <div class="login_input">
          <input type="password" class="form-control" id="inputPassword3" name="mpasswd" placeholder="<?php echo __('Please input your password');?>" required>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword4" class="col-sm-3 col-form-label"><?php echo __('Confirm Password'); ?></label>
      <div class="col-sm">
        <div class="login_input">
          <input type="password" class="form-control" id="inputPassword4" name="cnfrmmpasswd" placeholder="<?php echo __('Please input your password again');?>" required>
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
      
    
    <div class="form-group row">
      <div class="col-sm-12 centeri">
        <input type="submit" name="daftarButton" id="button" value="<?php echo __('Register'); ?>" class="btn btn-primary btn-block" />
      </div>
    </div>

        </td>
        </tr>
    </table>
  </form>
</div>
</align>

<script>
const email = document.getElementById("mail");

email.addEventListener("input", function (event) {
  if (email.validity.typeMismatch) {
    email.setCustomValidity("I am expecting an e-mail address!");
  } else {
    email.setCustomValidity("");
  }
});
</script>

<?php
// main content
$main_content = ob_get_clean();

require_once $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/register_template.inc.php';

exit();
