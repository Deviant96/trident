<?php
// required file
require LIB.'member_logon.inc.php';
// check if member already logged in
$is_member_login = utility::isMemberLogin();
if (!$is_member_login) {
  header('Location: index.php?p=member');
}
$page_title = __('Add Reference'); 

// captcha invalid warning
if (isset($_GET['captchaInvalid']) && $_GET['captchaInvalid'] === 'true') {
  $result = '<div class="alert alert-danger" role="alert">'.__('Wrong Captcha Code entered, Please write the right code!').'</div>';
}


if(isset($_POST["uploadButton"])) {


  $type = $dbs->escape_string(trim($_POST['book_type']));
  $title = $dbs->escape_string(trim($_POST['book_title']));
  $category = $dbs->escape_string(trim($_POST['category']));
  $author = $dbs->escape_string(trim($_POST['author']));
  $isbn = $dbs->escape_string(trim($_POST['isbn']));
  $edition = $dbs->escape_string(trim($_POST['edition']));
  $book_year = $dbs->escape_string(trim($_POST['book_year']));
  $publish_date = $dbs->escape_string(trim($_POST['publish_date']));
  $publisher = $dbs->escape_string(trim($_POST['publisher']));
  $stock = $dbs->escape_string(trim($_POST['stock']));
  $summarize = $dbs->escape_string(trim($_POST['summarize']));

  $upload_date = $dbs->escape_string(trim(date("Ymd_His")));
  $posted_date = $dbs->escape_string(trim(date("Y-m-d")));

  $uploadOk = 1;
  // ambil data file
  $nama_file = $upload_date.'_'.$_FILES['bookUpload']['name'];
  $strip_file_name = str_replace(" ", "_", strtolower($nama_file));
  $nama_cover = $upload_date.$_FILES['bookImageUpload']['name'];
  $strip_image_name = str_replace(" ", "_", strtolower($nama_cover));
  $namaFileSementara = $_FILES['bookUpload']['tmp_name'];
  $namaImageSementara = $_FILES['bookImageUpload']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUploadFile = UPLOAD."books/";
  $dirUploadImage = IMGBS."book-cover/";
  $target_file = $dirUploadFile . basename($_FILES["bookUpload"]["name"]);
  $target_image = $dirUploadImage . basename($_FILES["bookImageUpload"]["name"]);
  $docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $docImageType = strtolower(pathinfo($target_image,PATHINFO_EXTENSION));

  // Check file size larger than 20mb
  if (($_FILES["bookUpload"]["size"] > 20000000) || ($_FILES["bookImageUpload"]["size"] > 2000000)) {
    $result = "<div class='alert alert-warning' role='alert'>".__("Your file is too large")."</div>";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($docFileType != "pdf") {
    $result = "<div class='alert alert-warning' role='alert'>".__("Only PDF file are allowed")."</div>";
    $uploadOk = 0;
  } 

  if($docImageType != "jpg") {
    $result = "<div class='alert alert-warning' role='alert'>".__("Only PNG and JPG file are allowed")."</div>";
    $uploadOk = 0;
  } 

  if($uploadOk == 1){
    // pindahkan file
    $terupload = move_uploaded_file($namaFileSementara, $dirUploadFile.$strip_file_name);
    $teruploadImage = move_uploaded_file($namaImageSementara, $dirUploadImage.$strip_image_name);
    if ($terupload) {
    
      $book_file_name = $dbs->escape_string(trim($strip_file_name));
      $book_image_name = $dbs->escape_string(trim($strip_image_name));

      $tambah = sprintf("INSERT INTO book(book_type, img_cover, title, summarize, category, author, isbn, book_edition,  book_year, publisher, date_of_publication, stock,file_name) 
        VALUES (%d, '%s','%s', '%s', '%s', '%s', '%s', %d, %d, '%s', '%s', %d, '%s')",
          $type, $book_image_name, $title, $summarize, $category, $author, $isbn, $edition, $book_year, $publisher, $publish_date, $stock, $book_file_name);

          $cek_judul = sprintf("SELECT thesis_title FROM thesis");
          $cek = $dbs->query($cek_judul);

          $hasil = $dbs->query($tambah);
          if ($dbs->affected_rows > 0 ) {
            $result = "<div class='alert alert-success' role='alert'>".__("Upload success!")."</div>";
            
          } else if ($dbs->error) {
            $result = "<div class='alert alert-danger' role='alert'>".$dbs->error."</div>";
          }	

    } else {
      $result = "<div class='alert alert-danger' role='alert'>".__("Upload failed! Unknown error")."</div>";
    }
  }
}


if($_GET["type"]=="book") {?>
<div id="formAddReference" class="add-reference-box ">

<h2 class="text-center font-weight-bold my-3"><?php echo __('Add Reference'); ?></h2>
<div><?php echo $result;?></div>

  <form id="formTambahReferensi" name="formTambahReferensi" method="post" enctype="multipart/form-data" action="index.php?p=add-reference">
    <div class="row px-5">
      <div class="col-lg-5 text-center">
        <label for="uploadCover" style="cursor:pointer;">
        <i id="uploadIcon" class="fas fa-file-upload fa-10x"></i>
        </label>
        <div class="mt-3">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="bookImageUpload" id="uploadCover" accept="image/png, image/jpeg" required>
              <label class="custom-file-label" for="uploadCover"><?php echo __("Choose image for cover");?></label>
            </div>
          </div>
          <div class="form-group row">
          <div class="col-sm-12 centeri">
            <input type="submit" class="btn btn-block btn-border btn-info btn-3d" name="uploadButton" id="button" value="<?php echo __('Upload'); ?>" class="uploadButton" />
          </div>
        </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="p-4">
        
          <div class="text-left">

              <div class="form-group row">
                <label for="book_title" class="col-sm-3 col-form-label"><?php echo __('Book Title'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="book_title" name="book_title" placeholder="<?php echo __("Enter the title of the book/ebook");?>" required>
                  </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="category" class="col-sm-3 col-form-label"><?php echo __('Category'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="category" name="category" placeholder="<?php echo __("Enter the book category, ex: Management");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="author" class="col-sm-3 col-form-label"><?php echo __('Author'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="author" name="author" placeholder="<?php echo __("Enter the book author");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="<?php echo __("Enter the book ISBN");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm">
                  <div class="row">
                    <div class="col-sm">
                      <label for="edition" class="col-form-label"><?php echo __('Edition'); ?></label>
                      <input type="number" class="form-control" id="edition" name="edition" placeholder="<?php echo __("Enter edition of the book");?>" required>
                    </div>
                    <div class="col-sm">
                      <label for="book_year" class="col-form-label"><?php echo __('Year'); ?></label>
                      <input type="number" class="form-control" id="book_year" name="book_year" placeholder="<?php echo __("Enter the book year");?>" required>
                    </div>
                    <div class="col-sm">
                    <label for="publish_date" class="col-form-label"><?php echo __('Date of Publication'); ?></label>
                      <input type="date" class="form-control" id="publish_date" name="publish_date" placeholder="<?php echo __("Enter the date book published");?>" required>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="publisher" class="col-sm-3 col-form-label"><?php echo __('Publisher'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="<?php echo __("Enter the publisher");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label"><?php echo __('Stock'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="<?php echo __("Enter the book stock");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="summarize" class="col-sm-3 col-form-label"><?php echo __('Summarize'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <textarea class="form-control" id="summarize" name="summarize" rows=4 placeholder="<?php echo __("Enter the book summarize");?>" required></textarea>
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
</div>

<?php
} elseif($_GET["type"]=="ebook") {?>


<div id="formAddReference" class="add-reference-box ">

<h2 class="text-center font-weight-bold my-3"><?php echo __('Add Reference'); ?></h2>
<div><?php echo $result;?></div>

  <form id="formTambahReferensi" name="formTambahReferensi" method="post" enctype="multipart/form-data" action="index.php?p=add-reference">
    <div class="row px-5">
      <div class="col-lg-5 text-center">
        <label for="uploadCover" style="cursor:pointer;">
        <i id="uploadIcon" class="fas fa-file-upload fa-10x"></i>
        </label>
        <div class="mt-3">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="bookImageUpload" id="uploadCover" accept="image/png, image/jpeg" required>
              <label class="custom-file-label" for="uploadCover"><?php echo __("Choose image for cover");?></label>
            </div>
          </div>
          <div class="form-group row">
          <div class="col-sm-12 centeri">
            <input type="submit" class="btn btn-block btn-border btn-info btn-3d" name="uploadButton" id="button" value="<?php echo __('Upload'); ?>" class="uploadButton" />
          </div>
        </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="p-4">
        
          <div class="text-left">

              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="uploadFile"><?php echo __("Choose file");?></label>
                <div class="col-sm">
                  <div class="login_input">
                  <input type="file" name="bookUpload" id="uploadFile" accept=".pdf,.PDF" required>
              
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="book_title" class="col-sm-3 col-form-label"><?php echo __('Book Title'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="book_title" name="book_title" placeholder="<?php echo __("Enter the title of the book/ebook");?>" required>
                  </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="category" class="col-sm-3 col-form-label"><?php echo __('Category'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="category" name="category" placeholder="<?php echo __("Enter the book category, ex: Management");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="author" class="col-sm-3 col-form-label"><?php echo __('Author'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="author" name="author" placeholder="<?php echo __("Enter the book author");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="<?php echo __("Enter the book ISBN");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm">
                  <div class="row">
                    <div class="col-sm">
                      <label for="edition" class="col-form-label"><?php echo __('Edition'); ?></label>
                      <input type="number" class="form-control" id="edition" name="edition" placeholder="<?php echo __("Enter edition of the book");?>" required>
                    </div>
                    <div class="col-sm">
                      <label for="book_year" class="col-form-label"><?php echo __('Year'); ?></label>
                      <input type="number" class="form-control" id="book_year" name="book_year" placeholder="<?php echo __("Enter the book year");?>" required>
                    </div>
                    <div class="col-sm">
                    <label for="publish_date" class="col-form-label"><?php echo __('Date of Publication'); ?></label>
                      <input type="date" class="form-control" id="publish_date" name="publish_date" placeholder="<?php echo __("Enter the date book published");?>" required>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="publisher" class="col-sm-3 col-form-label"><?php echo __('Publisher'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="<?php echo __("Enter the publisher");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label"><?php echo __('Stock'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="<?php echo __("Enter the book stock");?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="summarize" class="col-sm-3 col-form-label"><?php echo __('Summarize'); ?></label>
                <div class="col-sm">
                  <div class="login_input">
                    <textarea class="form-control" id="summarize" name="summarize" rows=4 placeholder="<?php echo __("Enter the book summarize");?>" required></textarea>
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
</div>


<?php
} else {?>

<div class="card-deck">
  <div class="card">
      <a href="index.php?p=add-reference&type=book" class="text-center">
    <i class="fas fa-book fa-5x mt-3"></i>
    <div class="card-body">
      <h5 class="card-title">Book</h5>
    </div></a>
  </div>
  <div class="card"><a href="index.php?p=add-reference&type=ebook" class="text-center">
    <i class="fas fa-book fa-5x text-center mt-3"></i>
    <div class="card-body">
      <h5 class="card-title">E-Book</h5>
    </div></a>
  </div>
</div>
<?php
}

?>

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

require_once $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/add_reference_template.inc.php';

exit();
