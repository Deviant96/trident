<?php
$page_title = __('Seminar Agenda');
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
        <p><?php echo __('Tidak ada agenda seminar saat ini');?></p>
        <p><?php echo __('The seminar will be held on:');?></p>
        <p><?php echo __('Day / Date: Wednesday, September 30, 2015');?></p>
        <p><?php echo __('Hours: 08.00 WIB s.d. done');?></p>
        <p><?php echo __('Place: Multipurpose Building Room (GSG) UPT Jakarta State Polytechnic Library');?></p>
        <p><a href="files/f/SEMINAR_BROSUR_2015_OK.pdf"><?php echo __('Download file');?></a></p>
        </div>
      </div>
    </div>
  </div>
</section>