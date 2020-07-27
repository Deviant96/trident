<?php
$page_title = __('E-Library');

?> 

  <div class="container-fluid bg-light pt-3 pb-2">

    <div id="erephead">
      <div class="elibrary-search container p-3 mb-3 text-black text-center">
        <a href="index.php?p=elibrary"><h2 class="font-weight-bolder" style="font-size: 3rem;text-transform: uppercase;">E-Library</h2></a>
        <p class="text-muted"><?php echo __("A collection of ebooks and books can be accessed online in pdf format by users.");?></p>
        <!-- Custom rounded search bars with input group -->
        <form action="index.php?p=elibrary" method="POST">
            <div class="input-group mb-4 border rounded-pill p-1">
              <input type="search" name="keywords" placeholder="<?php echo __("Search for Book or E-book ...");?>" aria-describedby="button-addon3" class="form-control bg-none border-0">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-link pnj-color"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
          <!-- End -->
      </div>
    </div>
    
  </div>

  
  <div class="book-result container bg-light pt-2 pb-5" style="max-width:900px;">.

  <?php
  if(isset($_POST['keywords']) || isset($_POST['list_book']) || isset($_POST['list_ebook'])){
    if(strlen($_POST['keywords']) == 0 && !isset($_POST['list_book']) && !isset($_POST['list_ebook'])){
        echo __("Insert a search string");
    } else {?>
  <!-- Search Result------------------------------->
  <div id="erepresult">
      <?php

      $keywords = null;
      if (isset($_POST['keywords'])) {
        $keywords = trim($_POST['keywords']);
      }
      $total = 0;
      $search = str_replace(",", "|", $keywords);
      if(isset($_POST['list_book'])){
        $content = $dbs->query("SELECT * FROM book WHERE title LIKE '%$keywords%' AND book_type=1 ORDER BY posted_date DESC");
      }
      elseif(isset($_POST['list_ebook'])){
        $content = $dbs->query("SELECT * FROM book WHERE title LIKE '%$keywords%' AND book_type=2 ORDER BY posted_date DESC");
      } else {
        $content = $dbs->query("SELECT * FROM book WHERE title LIKE '%$keywords%' ORDER BY posted_date DESC");
      }
      $total = $content->num_rows;
      if ($total > 0) {
        echo '<div class="alert alert-info">'.__(sprintf('The search returned %d results', $total)).'</div>';  
      } else {
        echo '<div class="alert alert-warning">'.__('No result found').'</div>';  
      }

      while ($tes = $content->fetch_assoc()) {
        ?>
        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-2 col-sm-2 p-3">
              <img src="images/book-cover/<?php echo $tes["img_cover"]?>" width="50%" class="card-img" alt="...">
            </div>
            <div class="col-md-10 col-sm-4">
              <div class="card-body">
                <h5 class="card-title font-weight-bold"><?php echo $tes["title"]?></h5>
                <p class="card-text">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>
                  <span class="text-muted"><?php echo $tes["author"]?></span>
                </p>
                <p class="card-text">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.261 13.666c.345.14.739-.105.739-.477V2.5a.472.472 0 0 0-.277-.437c-1.126-.503-5.42-2.19-7.723.129C5.696-.125 1.403 1.56.277 2.063A.472.472 0 0 0 0 2.502V13.19c0 .372.394.618.739.477C2.738 12.852 6.125 12.113 8 14c1.875-1.887 5.262-1.148 7.261-.334z"/>
                </svg>
                  <span class="text-muted"><?php echo $tes["category"]?></span>
                </p>
                <p class="card-text text-truncate"><em><?php echo $tes["summarize"]?></em></p>
                <a href="index.php?p=book-view&book_id=<?php echo $tes["book_id"]?>" class="btn btn-pnj"><?php echo __("View Content")?></a>
                <a href="files/books/<?php echo $tes["file_name"] ?>" class="btn btn-pnj"><?php echo __("Download")?></a>
                <p class="card-text"><small class="text-muted"><?php echo __("Uploaded on");?> <?php echo $tes["posted_date"] ?></small></p>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <!-- Search Result end------------------------>
  <?php
    }  
  } else {?>
    <div class="container">
      <div class="elibrary-search container p-5 mb-3 text-black text-center">
        <div class="text-center"><h3 class="font-weight-bold"><?php echo __("Our Database");?></h3></div>
        <div class="row">
          <div class="col-md-6">
            <form action="index.php?p=elibrary" method="POST">
              <label for="list_book" style="cursor:pointer;">
              <div class="card-counter pnj">
                <i class="fa fa-book"></i>
                <span class="count-numbers"><?php $counta=$dbs->query("SELECT * FROM book WHERE book_type=1");echo $counta->num_rows;?></span>
                <span class="count-name"><?php echo __("Book");?></span>
              </div>
              </label>
              <input type="submit" name="list_book" id="list_book" class="d-none" value="TRUE">
            </form>
          </div>

          <div class="col-md-6">
            <form action="index.php?p=elibrary" method="POST">
              <label for="list_ebook" style="cursor:pointer;">
              <div class="card-counter pnj-dark">
                <i class="fa fa-atlas"></i>
                <span class="count-numbers"><?php $countb=$dbs->query("SELECT * FROM book WHERE book_type=2");echo $countb->num_rows;?></span>
                <span class="count-name">E-Book</span>
              </div>
              </label>
              <input type="submit" name="list_ebook" id="list_ebook" class="d-none" value="TRUE">
          </div>
        </div>

      </div>
    </div>
  <?php } ?>

</div>


<?php
// main content
$main_content = ob_get_clean();

require_once $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/elibrary_template.inc.php';

exit();
