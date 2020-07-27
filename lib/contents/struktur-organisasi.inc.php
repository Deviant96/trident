<?php
$page_title = __('Organizational Structure');
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
        <p><?php echo __('ORGANIZATIONAL STRUCTURE OF STATE LIBRARY POLITECHNIC JAKARTA');?></p>
        <p><a href="files/f/STRUKTUR_ORGANISASI.pdf"><?php echo __('Download File');?></a></p>
        </div>
      </div>
    </div>
  </div>
</section>

