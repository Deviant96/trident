<?php
$info = __('Questionnaire');
$page_title = __('Questionnaire').' | '.$sysconf['library_name'];
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
          <h2><?php echo __('Questionnaire'); ?></h2>
          <p>
            <?php echo __('In order to compile a library quality improvement program and evaluate the performance of the UPT Library it is expected that students will fill in the questionnaire as part of the requirements for obtaining information free of problems / free of library material loans.'); ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>