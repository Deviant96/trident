<header class="s-header bg-light" role="banner">
  <div class="row bg">
    <div class="col">
    <div class="flags float-right">
      <ul>
        <li><span class="small text-dark">Pilih Bahasa / Select Language : </span></li>
        <li><a href="index.php?select_lang=id_ID"><img src="https://cdn2.iconfinder.com/data/icons/flags/flags/32/Indonesia.png" /></a></li>
        <li><a href="index.php?select_lang=en_US"><img src="https://cdn2.iconfinder.com/data/icons/fourth-of-july-13/32/flag_usa_america_united-32.png" /></a></li>
      </ul>
    </div>
    </div>
  </div>
  <div class="row pt-4">
    <div class="col-lg-7">
      <a href="index.php" class="s-brand text-dark">
        <img class="s-logo animated flipInY delay7" src="<?php echo $sysconf['template']['dir']; ?>/default/img/logo.png" alt="<?php echo $sysconf['library_name']; ?>" />
        <h1 class="animated fadeInUp delay2"><?php echo $sysconf['library_name']; ?></h1>
        <div class="s-brand-tagline animated fadeInUp delay3"><?php echo $sysconf['library_subname']; ?></div>
      </a>
    </div>
    <div class="col-lg-3">
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
      </div>
    </div>
    <div class="col-lg-2">
    <!-- If Member Logged
        ============================================= -->
    <?php echo (utility::isMemberLogin()) ? $header_info : 
    '<a href="index.php?p=member" class="btn login-btn">'.__('Member Area').'</a>
    <div class="register-btn">'.__('Don\'t have an account? <br>').'<a href="index.php?p=form">'.__('Register').'</a> | <a href="index.php?p=forgot_password">'.__('Forgot Password').'</a></div>'
    ; ?>
    </div>
  </div>
</header>
