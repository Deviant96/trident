<footer class="s-footer">
  <?php
  // Promoted titles - Only show at the homepage
  if($sysconf['enable_promote_titles'] && !( isset($_GET['search']) || isset($_GET['title']) || isset($_GET['keywords']) || isset($_GET['p']) ) ) :
    // query top book
    $topbook = $dbs->query('SELECT biblio_id, title, image FROM biblio WHERE
        promoted=1 ORDER BY last_update DESC LIMIT 30');
    if ($num_rows = $topbook->num_rows) :
    ?>
    <!-- Featured
    ============================================= -->
    <div class="s-feature-content animated fadeInUp delay9">
    <div class="s-feature-list" itemscope itemtype="http://schema.org/Book" vocab="http://schema.org/" typeof="Book">
      <ul id="topbook" class="jcarousel-skin-tango">
        <?php
          while ($book = $topbook->fetch_assoc()) :
            $title = explode(" ", $book['title']);
            if (!empty($book['image'])) : ?>
            <li class="book">
              <a itemprop="name" property="name" href="./index.php?p=show_detail&amp;id=<?php echo $book['biblio_id'] ?>" title="<?php echo $book['title'] ?>">
                <img itemprop="image" src="images/docs/<?php echo $book['image'] ?>" alt="<?php echo $book['title'] ?>" />
              </a>
            </li>
            <?php else: ?>
            <li class="book">
              <a itemprop="name" property="name" href="./index.php?p=show_detail&amp;id=<?php echo $book['biblio_id'] ?>" title="<?php echo $book['title'] ?>">
                <div class="s-feature-title"><?php echo $title[0].'<br/>'.$title[1] ?><br/>...</div>
                <img itemprop="image" src="./template/default/img/book.png" alt="<?php echo $book['title'] ?>" />
              </a>
            </li>
            <?php
            endif;
          endwhile;
        ?>
      </ul>
    </div>
    </script>
    </div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="s-footer-content container">
    <div class="row">
      <nav class="col-lg-12 col-sm-12 col-xs-24">
        <ul class="s-footer-menu centeri">
          <li><a href="index.php"><?php echo __('Home'); ?></a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Fasilitas</a></li>
          <li><a href="#">Berita</a></li>
          <li><a href="#">Koleksi Digital</a></li>
          <li><a href="#">Jurnal Akreditasi</a></li>
          <li><a href="#">Prosiding</a></li>
          <li><a href="#">Kuesioner</a></li>
          <li><a href="#">Download</a></li>
          <li><a href="#">Penyerahan Laporan Akhir</a></li>
          <li><a href="#">Kontak</a></li> 
        </ul>
      </nav>
    </div>
  </div>
</footer>
