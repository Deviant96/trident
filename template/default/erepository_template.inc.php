<?php
/**
 * Template for Login
 *
 * Copyright (C) 2015 Arie Nugraha (dicarve@gmail.com)
 * Create by Eddy Subratha (eddy.subratha@slims.web.id)
 *
 * Slims 8 (Akasia)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
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
 */

// be sure that this file not accessed directly
if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
    die("can not access this file directly");
}
?>
<!--
==========================================================================
   ___  __    ____  __  __  ___      __    _  _    __    ___  ____    __
  / __)(  )  (_  _)(  \/  )/ __)    /__\  ( )/ )  /__\  / __)(_  _)  /__\
  \__ \ )(__  _)(_  )    ( \__ \   /(__)\  )  (  /(__)\ \__ \ _)(_  /(__)\
  (___/(____)(____)(_/\/\_)(___/  (__)(__)(_)\_)(__)(__)(___/(____)(__)(__)

==========================================================================
-->
<!DOCTYPE html>
<html lang="<?php echo substr($sysconf['default_lang'], 0, 2); ?>" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
<?php
// Meta
// =============================================
include "partials/meta.php"; ?>

</head>

<body itemscope itemtype="http://schema.org/WebPage" id="login-page">
  <div class="container font-weight-bold">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent justify-content-between">
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
            <a class="nav-link text-white mr-3 ml-3" href="index.php?p=unggah_mandiri"><?php echo __('Unggah Mandiri'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mr-3 ml-3" href="index.php?p=contact"><?php echo __('Contact'); ?></a>
          </li>
        </ul>
      </div>
    </nav>
    <div id="erephead" class="text-white text-center mt-5">
      <h2 class="font-weight-bolder" style="font-size: 3rem;text-transform: uppercase;">E-Repository</h2>
      <h5 style="text-transform: uppercase;">Online Repository</h5>
      <p>Kumpulan artikel, jurnal, skripsi, tesis dan karya ilmiah yang<br> 
      dapat diakses secara online dalam format pdf oleh pengguna.</p>
      <p>Pengguna juga dapat melakukan unggah mandiri</p>
    </div>
  </div>



      <?php echo $main_content; ?>

  <?php
  
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
