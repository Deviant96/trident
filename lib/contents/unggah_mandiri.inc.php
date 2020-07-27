<?php
// required file
require LIB.'member_logon.inc.php';
// check if member already logged in
$is_member_login = utility::isMemberLogin();
if (!$is_member_login) {
  header('Location: index.php?p=member');
}
$page_title = __('Self Upload');

function has_similar($to_test, $values, $similar = 60) {
  $perc = 0 ;
  foreach ($values as $key => $value) {
      similar_text($value[0], $to_test, $perc);
      if ($perc > $similar) return true ;
  }
  return false ;
}

// captcha invalid warning
if (isset($_GET['captchaInvalid']) && $_GET['captchaInvalid'] === 'true') {
  $result = '<div class="alert alert-danger" role="alert">'.__('Wrong Captcha Code entered, Please write the right code!').'</div>';
}

if(isset($_POST["uploadButton"])) {

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

  $thesis_type = intval($dbs->escape_string(trim($_POST['thesis_type'])));
  $thesis_title = $dbs->escape_string(trim($_POST['thesis_title']));
  $upload_date = $dbs->escape_string(trim(date("Y-m-d H:i:s")));
  $member_name = $dbs->escape_string(trim($_SESSION['m_name']));
  $member_id = $dbs->escape_string(trim($_SESSION['mid']));
  $member_study_year = $dbs->escape_string(trim($_SESSION['study_year']));

  $member_major = 0;

  switch ($_SESSION['m_institution']) {
    case "Teknik Sipil":
      $member_major = 1;
      break;
    case "Teknik Mesin":
      $member_major = 2;
      break;
    case "Teknik Elektro":
      $member_major = 3;
      break;
    case "Teknik Informatika & Komputer":
      $member_major = 4;
      break;
    case "Teknik Grafika & Penerbitan (Tata Niaga)":
      $member_major = 5;
      break;
    case "Akuntansi":
      $member_major = 6;
      break;
    case "Administrasi Niaga":
      $member_major = 7;
      break;
    case "Teknik Grafika Penerbitan (Rekayasa)":
      $member_major = 8;
      break;
    case "Magister Terapan Teknik Elektro":
      $member_major = 9;
      break;
    case "Magister Terapan Rekayasa Teknologi Manufaktur":
      $member_major = 10;
      break;
    case "Dosen":
      $member_major = 11;
      break;
    default:
    $member_major = 0;
  }


  $uploadOk = 1;
  // ambil data file
  $namaFile = $_FILES['thesisUpload']['name'];
  $strip_file_name = str_replace(" ", "_", strtolower($namaFile));
  $namaSementara = $_FILES['thesisUpload']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUpload = UPLOAD."thesis/";
  $target_file = $dirUpload . basename($_FILES["thesisUpload"]["name"]);
  $docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($member_major==11 && ($thesis_type==1 || $thesis_type==3 || $thesis_type==4))
  {
    $result = "<div class='alert alert-warning' role='alert'>".__("Lecturer only allowed to upload journal and thesis")."</div>";
    $uploadOk = 0;
    var_dump($member_major);
    var_dump($thesis_type);
  }

    // Check if file already exists
  if (file_exists($target_file)) {
    $result = "<div class='alert alert-warning' role='alert'>".__("File already exists")."</div>";
    $uploadOk = 0;
  }

  // Check file size larger than 20mb
  if ($_FILES["thesisUpload"]["size"] > 20000000) {
    $result = "<div class='alert alert-warning' role='alert'>".__("Your file is too large")."</div>";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($docFileType != "pdf") {
    $result = "<div class='alert alert-warning' role='alert'>".__("Only PDF files are allowed")."</div>";
    $uploadOk = 0;
  } 

  if($uploadOk == 1){
    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$strip_file_name);
    if ($terupload) {

      

      $thesis_file_name = $dbs->escape_string(trim($strip_file_name));
      $thesis_file_url = $dbs->escape_string(trim($sysconf['custom_baseurl'].FLS."/thesis/".$thesis_file_name));
    

      $tambah = sprintf("INSERT INTO thesis(thesis_type, thesis_title, uploader_member_id, member_name, member_major, member_study_year, thesis_file_name,  thesis_file_url, time_uploaded) 
        VALUES (%d, '%s', '%s', '%s', %d, %d, '%s', '%s', '%s')",
          $thesis_type, $thesis_title, $member_id, $member_name, $member_major, $member_study_year, $thesis_file_name, $thesis_file_url, $upload_date);

          $cek_judul = sprintf("SELECT thesis_title FROM thesis");
          $cek = $dbs->query($cek_judul);


          if(has_similar($thesis_title,$cek->fetch_all(MYSQLI_NUM)))
          {
            $result = "<div class='alert alert-danger' role='alert'>".__("Upload failed! Detected title with the same name in database")."</div>";
          } else {

            $hasil = $dbs->query($tambah);
            if ($dbs->affected_rows > 0 ) {
              $result = "<div class='alert alert-success' role='alert'>".__("Upload success!")."</div>";
              
            } else if ($dbs->error) {
              $result = "<div class='alert alert-danger' role='alert'>".$dbs->error."</div>";
            }	
          }

    } else {
      $result = "<div class='alert alert-danger' role='alert'>".__("Upload failed! Unknown error")."</div>";
    }
  }
}
?>

<form id="formMandiri" name="formMandiri" method="post" enctype="multipart/form-data" action="index.php?p=unggah_mandiri">
<div class="row">
  <div class="col-sm-5 text-center mb-5">
    <div class="text-white" style="position:relative;top:20%;">
      <h2><?php echo __('Self Upload'); ?></h2>
      <label for="uploadFile" style="cursor:pointer;">
      <i id="uploadIcon" class="fas fa-file-upload fa-10x"></i>
      </label>
      <div><?php echo $result;?></div>
      <div class="mt-3">
        <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="thesisUpload" id="uploadFile" aria-describedby="uploadFileAddon01" required>
            <label class="custom-file-label" for="uploadFile"><?php echo __("Choose file");?></label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12 centeri">
            <input type="submit" name="uploadButton" id="button" value="<?php echo __('Upload'); ?>" class="uploadButton" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-7 text-right p-4">
    <div class="p-4 formOverlay">
    
      <div class="pnjForm text-left">
        
          <div class="form-group row">
            <div class="col-sm-12">
              <div class="alert alert-info text-left" role="alert">
                <?php echo __("Requirements for uploading files : Max size=20mb, file type=PDF");?>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="textfield3" class="col-sm-3 col-form-label"><?php echo __('Member Name'); ?></label>
            <div class="col-sm">
              <div class="login_input">
                <input type="text" class="form-control" id="textfield3" name="member_name" value="<?php echo $_SESSION['m_name'];?>"] disabled>
              </div>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="member_id" class="col-sm-3 col-form-label"><?php echo __('NIM/NIP'); ?></label>
            <div class="col-sm">
              <div class="login_input">
                <input type="number" class="form-control" id="member_id" name="member_id" aria-describedby="nimHelpBlock" value="<?php echo $_SESSION['mid'];?>"] disabled>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="textfield3" class="col-sm-3 col-form-label"><?php echo __('Major/Rank'); ?></label>
            <div class="col-sm">
              <div class="login_input">
                <input type="text" class="form-control" id="textfield3" name="member_major" aria-describedby="nimHelpBlock" value="<?php echo $_SESSION['m_institution'];?>"] disabled>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="textfield3" class="col-sm-3 col-form-label"><?php echo __('Study Year'); ?></label>
            <div class="col-sm">
              <div class="login_input">
                <input type="number" class="form-control" id="textfield3" name="member_study_year" value="<?php echo $_SESSION['study_year'];?>"] disabled>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="mail" class="col-sm-3 col-form-label"><?php echo __('Title'); ?></label>
            <div class="col-sm">
              <div class="login_input">
                <input type="text" class="form-control" id="mail" name="thesis_title" required>
              </div>
            </div>
          </div>
          
          <div class="form-group row">
            <div class="col-sm centeri">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="thesis_type" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1"><?php echo __("Essay");?></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="thesis_type" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2"><?php echo __("Journal");?></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="thesis_type" id="inlineRadio3" value="3">
                <label class="form-check-label" for="inlineRadio3"><?php echo __("Fieldwork Report");?></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="thesis_type" id="inlineRadio4" value="4">
                <label class="form-check-label" for="inlineRadio4"><?php echo __("Event Proposal");?></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="thesis_type" id="inlineRadio5" value="5">
                <label class="form-check-label" for="inlineRadio5"><?php echo __("Thesis");?></label>
              </div>
            </div>
          </div>

        <!-- Captcha in form - start -->
        <div>
          <?php if ($sysconf['captcha']['register']['enable']) { ?>
            <?php if ($sysconf['captcha']['register']['type'] == "recaptcha") { ?>
            <div class="captchaMember centeri">
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
          
        
      </div>
    </div>
  </div>
</div>
</form>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script>
$('#uploadFile').on('change', function (e) { 
  $("#uploadIcon").removeClass("fas fa-file-upload fa-10x");
  $("#uploadIcon").addClass("far fa-file-pdf fa-10x");
 });
</script>

<?php
// main content
$main_content = ob_get_clean();

require_once $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/unggah_mandiri_template.inc.php';

exit();
