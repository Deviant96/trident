<?php
/**
 * Template for Member
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

<body itemscope itemtype="http://schema.org/WebPage" id="login-page" class="loginPage">

  <div class="container mt-5 font-weight-bold">
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
            <a class="nav-link text-white mr-3 ml-3" href="index.php?p=contact"><?php echo __('Contact'); ?></a>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="row mt-5">
      <div class="col-sm-5 text-center mb-5">
        <div class="text-white" style="position:relative;top:25%;">
          <i class="fas fa-user-lock fa-10x"></i>
          <div class="mt-3">
            <h2 class="font-weight-bolder" style="text-transform: uppercase;"><?php echo __('Login'); ?></h2>
          </div>
        </div>
      </div>
      <div class="col-sm-7 text-right p-4">
        <div class="p-4 formOverlay">
          <!-- Login
          ============================================= -->
          <?php echo $main_content; ?>
        </div>
      </div>
    </div>
    
    <?php
    // Background
    // ================================================
    //include "partials/bg.php"; ?>

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

  </div>


</body>

</html>
