<?php
$page_title = __('Vision and Mission');
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
        <h3><strong><?php echo __('Vision');?></strong></h3>
        <p><?php echo __('Become an Information Outlet (as an information resource center)');?></p>
        <h3><strong><?php echo __('Mission');?></strong></h3>
        <p><?php echo __('Can meet the information needs of the civitas, PNJ academics for the needs of the education, research and community service processes');?></p>
        </div>
      </div>
    </div>
  </div>
</section>