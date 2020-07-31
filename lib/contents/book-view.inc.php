<?php
$page_title = __('Book View');
?> 

  
  <div class="book-view container bg-light pt-2 pb-5 mb-5" style="max-width:900px;">
    <a href="index.php?p=elibrary" class="btn btn-info mb-2"><?php echo __("Back to search");?></a>

    <div class="row">

      <?php
      if(isset($_GET['book_id'])){
        if(strlen($_GET['book_id']) == 0){
            echo __("Ga ada yang dicari. Balik to homepage");
        } else {?>
      <!-- Search Result------------------------------->
          <?php

          $book_id = null;
          if (isset($_GET['book_id'])) {
            $book_id = trim($_GET['book_id']);
          }
          $total = 0;
          $content = $dbs->query("SELECT * FROM book WHERE book_id='$book_id'");
          
          $total = $content->num_rows;
          if ($total = 0) {
            echo '<div class="alert alert-warning">'.__('No result found').'</div>';  
          }
          foreach($content as $key => $value) {
              if($value["book_type"]==1){ // Book type
            ?>
            <div class="col-lg-4">
              <img src="images/book-cover/<?php echo $value["img_cover"]?>" width="100%">
            </div>
            <div class="col-lg-8">
              <form>
                <div class="form-group row book-title">
                  <div class="col-sm-12">
                    <h4 class="font-weight-bold"><?php echo $value["title"]?></h4>
                  </div>
                </div>

                <div class="form-group row book-author">
                  <div class="col-sm-12">
                    <input type="text" readonly class="form-control-plaintext" id="author" value="<?php echo $value["author"]?>">
                  </div>
                </div>

                <hr>

                <div class="form-group row book-summarize">
                  <div class="col-sm-12">
                    <p class="text-break"><em><?php echo $value["summarize"]?></em></p>
                  </div>
                </div>

                <hr>

                <h5 class="font-weight-bold my-4"><?php echo __("Detail Information");?></h5>

                <div class="form-group row book-detail">
                  <label for="category" class="col-sm-2 col-form-label"><?php echo __("Category");?></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="category" value=": <?php echo $value["category"]?>">
                  </div>
                </div>

                <div class="form-group row book-detail">
                  <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="isbn" value=": <?php echo $value["isbn"]?>">
                  </div>
                </div>

                <div class="form-group row book-detail">
                  <label for="edition" class="col-sm-2 col-form-label"><?php echo __("Edition");?></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="edition" value=": <?php echo $value["book_edition"]?>">
                  </div>
                </div>

                <div class="form-group row book-detail">
                  <label for="year" class="col-sm-2 col-form-label"><?php echo __("Year");?></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="year" value=": <?php echo $value["book_year"]?>">
                  </div>
                </div>

                <div class="form-group row book-detail">
                  <label for="publisher" class="col-sm-2 col-form-label"><?php echo __("Publisher");?></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="publisher" value=": <?php echo $value["publisher"]?>">
                  </div>
                </div>

                <div class="form-group row book-detail">
                  <label for="publish-date" class="col-sm-2 col-form-label"><?php echo __("Date of Publication");?></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="publish-date" value=": <?php echo $value["date_of_publication"]?>">
                  </div>
                </div>

                <div class="form-group row book-detail">
                  <label for="posted_date" class="col-sm-2 col-form-label"><?php echo __("Added on");?></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="posted_date" value=": <?php echo $value["posted_date"]?>">
                  </div>
                </div>

                <div class="form-group row book-detail">
                  <label for="stock" class="col-sm-2 col-form-label"><?php echo __("Stock");?></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="stock" value=": <?php echo $value["stock"]?>">
                  </div>
                </div>
              </form>
            </div>
            <?php
            } //Book type
            else {?>
            <iframe src="https://docs.google.com/gview?url=https://perpus.milkruby.com/files/books/<?php echo $value["file_name"]?>&embedded=true" 
                frameBorder="0"
                scrolling="auto"
                height="500px"
                width="100%">
            </iframe>
            <?php }
          }
          ?>
      </div>
      <!-- Search Result end------------------------>
      <?php
        }  
      } else {
        echo "Ga ada yang dicari. Balik to homepage";
        } ?>
  </div>

</div>


<?php
// main content
$main_content = ob_get_clean();

require_once $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/elibrary_template.inc.php';

exit();
