<?php
function news_list_tpl($title, $path, $date, $summary) {
?>


<div class="card bg-dark text-white position-relative">
    
<a href="<?php echo SWB.'index.php?p='.$path ?>">
    <img src="images/pnj2.jpg" class="card-img" alt="...">
    <div class="card-img-overlay overlay text-light">
    <h5 class="card-title"><?php echo $title ?></h5>
    <small><?php echo $date ?></small>
    </div>
    </a>
</div>

<?php
}