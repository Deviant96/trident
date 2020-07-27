<?php
$page_title = __('E-Resources PNRI');
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
        <p><?php echo __('To meet the needs of visitors, the National Library of the Republic of Indonesia subscribes to various digital library materials online (e-Resources) such as journals, ebooks, and other online reference works. Web address:');?> <a href="http://e-resources.pnri.go.id/">http://e-resources.perpusnas.go.id/</a></p>
        <p><?php echo __('To access e-Resources services, you must be registered as a library member. Library member registration can be done online through the web address:');?> <a href="http://keanggotaan.pnri.go.id/">http://keanggotaan.perpusnas.go.id/</a></p>
        <p><?php echo __('Hope to be useful');?></p>
        </div>
      </div>
    </div>
  </div>
</section>