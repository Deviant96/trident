<?php
$page_title = __('E-Repository');
?> 

<div class="container-fluid bg-light pt-5 pb-5">
  
<!-- Responsive CSS tab by Axelaredz
https://codepen.io/axelaredz/pen/ipome -->

			<!-- tabs -->
			<div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
        
				<input type="radio" name="pcss3t" checked  id="tab1" class="tab-content-first">
				<label for="tab1"><img  class="tab-image" src="<?php echo $sysconf['template']['dir']; ?>/default/img/skripsi.png" /><span>Skripsi/TA</span></label>
				
				<input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
				<label for="tab2"><img  class="tab-image" src="<?php echo $sysconf['template']['dir']; ?>/default/img/pkl.png" /><span>Laporan PKL</span></label>
				
				<input type="radio" name="pcss3t" id="tab3" class="tab-content-3">
				<label for="tab3"><img  class="tab-image" src="<?php echo $sysconf['template']['dir']; ?>/default/img/jurnal.png" /><span>Jurnal</span></label>
				
				<input type="radio" name="pcss3t" id="tab4" class="tab-content-4">
        <label for="tab4"><img  class="tab-image" src="<?php echo $sysconf['template']['dir']; ?>/default/img/proposal.png" /><span>Proposal Event</span></label>
        
        <input type="radio" name="pcss3t" id="tab5" class="tab-content-last">
        <label for="tab5"><img  class="tab-image" src="<?php echo $sysconf['template']['dir']; ?>/default/img/thesis.png" /><span>Tesis</span></label>
				
				<ul>
					<li class="tab-content tab-content-first">
						<?php include "erepos/ta.php";?>
					</li>
					
					<li class="tab-content tab-content-2">
          <?php include "erepos/laporan.php";?>
					</li>
					
					<li class="tab-content tab-content-3">
          <?php include "erepos/jurnal.php";?>
          </li>
          
          <li class="tab-content tab-content-4">
          <?php include "erepos/proposal.php";?>
					</li>
					
					<li class="tab-content tab-content-last">
          <?php include "erepos/tesis.php";?>
						</div>
					</li>
				</ul>
			</div>
			<!--/ tabs -->
		</div>


<!--Live search-->

<script>
$(document).ready(function(){
 
 load_data();

 function load_data(query,type)
 {
  $.ajax({
   url:"http://localhost/trident/lib/contents/search_AJAX_response.php",
   method:"POST",
   data:{query:query,type:type},
   dataType:"json",
   success:function(data)
   {
    $('#total_records').text(data.length);
    var html = '';
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {
      html += '<a href='+data[count].thesis_file_url+'><li class="list-group-item d-flex justify-content-between align-items-center">'+data[count].thesis_title+'<span class="badge badge-primary badge-pill">PDF</span></li></a>';
     }
    }
    else
    {
     html += '<tr><td colspan="5">No Data Found</td></tr>';
    }
    $('#hslCari'+$("#search").data("upload-type")).html(html);
   }
  })
 }

 $('#search').click(function(){
  var query = $('#tags').val();
  var type = $("#search").data("upload-type");
  load_data(query,type);
 });

});
</script>


<?php
// main content
$main_content = ob_get_clean();

require_once $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/erepository_template.inc.php';

exit();
