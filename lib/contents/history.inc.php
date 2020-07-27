<?php
$page_title = __('History');
// be sure that this file not accessed directly
if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} elseif (INDEX_AUTH != 1) { 
    die("can not access this file directly");
}
?>

<section>
  <div class="mt-3 pt-3 pb-3">
    <div class="container">
      <div class="row">
        <div class="col">
          <img src="./images/head-bg.jpeg">
          <br>
          <br>
          <p><?php echo __('The Jakarta State Polytechnic Library was established along with the opening of the University of Indonesia Polytechnic Education Program in 1982. Due to various physical and material limitations, a year later the UI Polytechnic library began operations. At that time the collection was limited and was a contribution to the PEDC (Polytechnic Education Development Center) contribution. Since August 27, 1998 the Polytechnic made a mistake from UI and changed its name to Jakarta State Polytechnic. Since March 2019 occupy a new building.'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

