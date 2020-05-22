<header class="s-header bg-light" role="banner">
  <div class="row bg">
    <div class="col">
    <div class="flags float-right">
      <ul>
        <li><span class="small text-dark">Select Language/Pilih Bahasa : </span></li>
        <li><a href="index.php?select_lang=id_ID"><img src="http://cdn2.iconfinder.com/data/icons/flags/flags/32/Indonesia.png" /></a></li>
        <li><a href="index.php?select_lang=en_US"><img src="https://cdn2.iconfinder.com/data/icons/fourth-of-july-13/32/flag_usa_america_united-32.png" /></a></li>
      </ul>
    </div>
    </div>
  </div>
  <div class="row pt-4">
    <div class="col-lg-6">
      <a href="index.php" class="s-brand text-dark">
        <img class="s-logo animated flipInY delay7" src="<?php echo $sysconf['template']['dir']; ?>/default/img/logo.png" alt="<?php echo $sysconf['library_name']; ?>" />
        <h1 class="animated fadeInUp delay2"><?php echo $sysconf['library_name']; ?></h1>
        <div class="s-brand-tagline animated fadeInUp delay3"><?php echo $sysconf['library_subname']; ?></div>
      </a>
    </div>
    <div class="col-lg-4">
      <div class="dv-header-search">
        <form action="index.php" method="get" autocomplete="off">
          <div class="marquee down">
            <label for="search_bar">Search</label>
            <input class="search_bar" 
              name="keywords" 
              type="text" 
              id="keyword"
              lang="<?php echo $sysconf['default_lang']; ?>" 
              aria-hidden="true" 
              autocomplete="off"
              placeholder="Search">
              <button type="submit" name="search" value="search" style="display:none;"></button>
          </div>
        </form>
        <a href="#" class="s-search-advances" width="800" height="500" title="<?php echo __('Advanced Search') ?>"><?php echo __('Advanced Search') ?></a>
      </div>
    </div>
    <div class="col-lg-2">
    <button class="login-btn"><?php echo __('Login') ?></button>
    <div class="register-btn">Don't have an account? <a href="#"><?php echo __('Register') ?></a></div>
    </div>
  </div>
</header>
