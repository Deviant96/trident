<?php
$page_title = __('Submitting Final Report');
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
          <h2><?php echo __('Submission of Student Final Report 2019'); ?></h2>
          <p><?php echo __('Students who will submit the Final Report (PKL Report / Final Project / Thesis / Thesis) 2019 at UPT Library, please complete the data independently on the following link <a href="https://forms.gle/7PCn3YSpQwAJirCo9">https://forms.gle/7PCn3YSpQwAJirCo9</a> . Charging can be done using a PC or Android phone.'); ?></p>
          <p><?php echo __('All students who submit the 2019 Student Final Report are required to fill in the link to facilitate rediscovery and search at the UPT Library.'); ?></p>
          <p><?php echo __('If you have difficulty filling it, please contact the library staff.'); ?></p>
          <p><?php echo __('Thank you for your attention.'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

