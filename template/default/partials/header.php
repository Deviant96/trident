<header class="s-header" role="banner">
  <div class="row">
    <div class="col-lg-6">
      <a href="index.php" class="s-brand">
        <img class="s-logo animated flipInY delay7" src="<?php echo $sysconf['template']['dir']; ?>/default/img/logo.png" alt="<?php echo $sysconf['library_name']; ?>" />
        <h1 class="animated fadeInUp delay2"><?php echo $sysconf['library_name']; ?></h1>
        <div class="s-brand-tagline animated fadeInUp delay3"><?php echo $sysconf['library_subname']; ?></div>
      </a>
    </div>
    <div class="col-lg-4">
      <div class="dv-header-search">
        <form action="index.php" method="get" autocomplete="off">
          <div class="marquee down">
            <input type="text" class="s-search animated fadeInUp delay4" id="keyword" name="keywords" value="" lang="<?php echo $sysconf['default_lang']; ?>" aria-hidden="true" autocomplete="off">
            <button type="submit" name="search" value="search" class="s-btn animated fadeInUp delay4"><?php echo __('Search'); ?></button>
          </div>
        </form>
        <a href="#" class="s-search-advances" width="800" height="500" title="<?php echo __('Advanced Search') ?>"><?php echo __('Advanced Search') ?></a>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="s-pmenu">
        <div class="s-menu animated fadeInUp delay4">

        <div class="hamburger hamburger--3dy s-menu-toggle" role="navigation">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</header>
