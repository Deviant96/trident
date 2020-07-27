<?php
// key to authenticate
define('INDEX_AUTH', '1');
?>
<!DOCTYPE html>
<html lang="<?php echo substr($sysconf['default_lang'], 0, 2); ?>" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
<?php
// Meta
// =============================================
include "partials/meta.php"; ?>
<style>
body {
  background-color: #f3f3f3;
  color:#000;
}
.form-control:focus {
  box-shadow: none;
}

.form-control-underlined {
  border-width: 0;
  border-bottom-width: 1px;
  border-radius: 0;
  padding-left: 0;
}
.form-control::placeholder {
  font-size: 0.95rem;
  color: #aaa;
  font-style: italic;
}
  </style>

</head>

<body itemscope itemtype="http://schema.org/WebPage">
  <nav class="navbar navbar-expand-lg navbar-light bg-secondary-color justify-content-between">
    <a href="index.php" class="s-brand">
      <img class="s-logo animated flipInY delay7" src="<?php echo $sysconf['template']['dir']; ?>/default/img/logo.png" alt="<?php echo $sysconf['library_name']; ?>" />
      <h1 class="animated fadeInUp delay2"><?php echo $sysconf['library_name']; ?></h1>
      <div class="s-brand-tagline animated fadeInUp delay3"><?php echo $sysconf['library_subname']; ?></div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto font-weight-bold">
        <li class="nav-item active">
          <a class="nav-link text-white mr-3 ml-3" href="index.php"><?php echo __('Home'); ?> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mr-3 ml-3" href="index.php?p=add-reference"><?php echo __('Add Reference'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mr-3 ml-3" href="index.php?p=contact"><?php echo __('Contact'); ?></a>
        </li>
      </ul>
    </div>
  </nav>

    <?php echo $main_content; 


  // Footer
include "partials/footer.php"; 

  // Background
  // ================================================
  include "partials/bg.php"; ?>

  <script>
    $("form, input").attr({
      autocomplete    : "off",
      autocorrect     : "off",
      autocapitalize  : "off",
      spellcheck      : "off"
    });

    $('.homeButton').val('<?php echo __('Back To Home'); ?>');

    //If captcha available
    $('.captchaAdmin').parent().parent().attr('style','padding: 25px 20px;');
    $('.captchaAdmin').parent().parent().parent().attr('style','top: -40px;');

  </script>

</body>

</html>
