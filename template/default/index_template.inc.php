<?php
/**
 * Template for OPAC
 *
 * Copyright (C) 2015 Arie Nugraha (dicarve@gmail.com)
 * Create by Eddy Subratha (eddy.subratha@slims.web.id)
 *
 * Slims 8 (Akasia)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */

// be sure that this file not accessed directly

if (!defined('INDEX_AUTH')) {
  die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
  die("can not access this file directly");
}

?>
<!--
==========================================================================
   ___  __    ____  __  __  ___      __    _  _    __    ___  ____    __
  / __)(  )  (_  _)(  \/  )/ __)    /__\  ( )/ )  /__\  / __)(_  _)  /__\
  \__ \ )(__  _)(_  )    ( \__ \   /(__)\  )  (  /(__)\ \__ \ _)(_  /(__)\
  (___/(____)(____)(_/\/\_)(___/  (__)(__)(_)\_)(__)(__)(___/(____)(__)(__)

==========================================================================
-->
<!DOCTYPE html>
<html lang="<?php echo substr($sysconf['default_lang'], 0, 2); ?>" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>

<?php
// Meta Template
include "partials/meta.php";
?>

</head>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

<!--[if lt IE 9]>
<div class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div>
<![endif]-->

<?php
// Header
include "partials/header.php";
?>

<?php
// Navigation
// include "partials/nav.php";
?>

<?php
// Content
?>
<?php if(isset($_GET['search']) || isset($_GET['p'])): ?>
<section  id="content" class="s-main-page" role="main">

  <!-- Search on Front Page
  ============================================= -->
  <div class="s-main-search container">
    <?php
    if(isset($_GET['p'])) {
      switch ($_GET['p']) {
      case ''             : $page_title = __('Collections'); break;
      case 'show_detail'  : $page_title = __("Record Detail"); break;
      case 'member'       : $page_title = __("Member Area"); break;
      case 'member'       : $page_title = __("Member Area"); break;
      default             : $page_title; break; }
    } else {
      $page_title = __('Collections');
    }
    ?>
    <h1 class="s-main-title animated fadeInUp delay1"><?php echo $page_title ?></h1>
  </div>

  <!-- Main
  ============================================= -->
  <?php include "partials/nav2.php";  ?>
  <div class="s-main-content container">
    <div class="row">

      <!-- Show Result
      ============================================= -->
      <div class="col-lg-12 col-sm-12 col-xs-12 animated fadeInUp delay2">
      <!-- Show if clustering search is enabled
        ============================================= -->
        <?php
          if(isset($_GET['keywords']) && (!empty($_GET['keywords']))) :
            if (($sysconf['enable_search_clustering'])) : ?>
            <h2><?php echo __('Search Cluster'); ?></h2>

            <hr/>

            <div id="search-cluster">
              <div class="cluster-loading"><?php echo __('Generating search cluster...');  ?></div>
            </div>

            <script type="text/javascript">
              $('document').ready( function() {
                $.ajax({
                  url     : 'index.php?p=clustering&q=<?php echo urlencode($criteria); ?>',
                  type    : 'GET',
                  success : function(data, status, jqXHR) { $('#search-cluster').html(data); }
                });
              });
            </script>

            <?php endif; ?>
          <?php endif; ?>

        <?php
          // Generate Output
          // catch empty list
          if(strlen($main_content) == 7) {
            echo '<h2>' . __('No Result') . '</h2><hr/><p>' . __('Please try again') . '</p>';
          } else {
            if(isset($_GET['search'])) : echo '<h2>'.__('Search Result').'</h2>
            <hr>';
            echo $search_result_info;
            endif;
            echo $main_content;
          }

          // Somehow we need to hack the layout
          if(isset($_GET['search']) || (isset($_GET['p']) && $_GET['p'] != 'member')){
            echo '</div>';
          } else {
            if(isset($_SESSION['mid'])) {
              echo  '</div></div>';
            }
          }

        ?>
    </div>
  </div>  
</section>

<?php else: ?>

<!-- Homepage
============================================= -->
<main id="content" class="s-main" role="main">

  <!-- Search form
  ============================================= -->
  <div class="container s-main-search animated fadeInUp delay1 text-left pb-5">
    <div id="simply-search">
      <h2><?php echo __('ARE YOU SEARCHING A BOOK?');  ?></h2>
      <p class="display-4 font-weight-bold"><?php echo __('BIGGEST LIBRARY');  ?></p>
    </div>
  </div>
  <!-- End of Search Form
  ============================================= -->
  
<?php
// Navigation
include "partials/nav2.php";
?>

  <!------------ ICON UTAMA ---------------->
  <section>
    <div id="feature" class="bg-light text-dark">
      <div class="container">
        <div id="opening" class="text-md-center p-2">
          <h2 class="font-weight-bold"><?php echo __('Welcome to Library of');  ?><br>
          Politeknik Negeri Jakarta</h2>
        </div>
        <hr>
        <div class="row">
          <div class="col">
            <div class="card-deck p-2 border">
              <div class="card bg-transparent card-hover" style="border:0px;">
                <a href="index.php?p=katalog-buku">
                  <i class="fas fa-bookmark fa-5x text-center p-3 pnj-color"></i>
                  <div class="card-body">
                    <h3 class="card-title text-center"><?php echo __('Department / Study Book Catalog');  ?></h3>
                    <p class="card-text"><?php echo __('Collection of library books by majors / study programs.');  ?></p>
                  </div>
                </a>
              </div>
              <div class="card bg-transparent card-hover" style="border:0px;">
                <a href="http://opac.perpustakaan.pnj.ac.id/">
                  <i class="fas fa-book fa-5x text-center p-3 pnj-color"></i>
                  <div class="card-body">
                    <h3 class="card-title text-center">OPAC</h3>
                    <p class="card-text"><?php echo __('Online catalog search of the central library collection Jakarta State Polytechnic.');  ?></p>
                  </div>
                </a>
              </div>
              <div class="card bg-transparent card-hover" style="border:0px;">
                <a href="index.php?p=erepository">
                  <i class="fas fa-layer-group fa-5x text-center p-3 pnj-color"></i>
                  <div class="card-body">
                    <h3 class="card-title text-center">E-Repository</h3>
                    <p class="card-text"><?php echo __('A collection of articles, journals, theses, theses and scientific works.');  ?></p>
                  </div>
                </a>
              </div>
              <div class="card bg-transparent card-hover" style="border:0px;">
                <a href="index.php?p=elibrary">
                  <i class="fas fa-book-reader fa-5x text-center p-3 pnj-color"></i>
                  <div class="card-body">
                    <h3 class="card-title text-center">E-Library</h3>
                    <p class="card-text"><?php echo __('One door to search for all public collections from libraries, museums, archives, and electronic sources in Indonesia.');  ?></p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!------------ ICON UTAMA END ---------------->

  <!------------ BERITA DAN POLLING ---------------->
  <section>
    <div id="berita" class="bg-light text-dark pt-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <h2><?php echo __('News');  ?></h2>

            <div class="card-group">
              <?php
                require_once LIB.'content.inc.php';
                require_once SB.$sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/news_index_template.php';
                
                $keywords = null;
                if (isset($_GET['keywords'])) {
                  $keywords = trim($_GET['keywords']);
                }
                
                $content = new Content();
                $total = 0;
                $content_list = $content->getContents($dbs, 3, $total, $keywords); // 3 = Total berita yang akan muncul
                if ($total > 0) {
                  echo '';  
                } else {
                  echo '<div class="alert alert-warning">'.__('Sorry, we don\'t have any news for you yet.').'</div>';  
                }
                
                
                foreach ($content_list as $c) {
                    $summary = Content::createSummary($c['content_desc'], 300);
                    echo news_list_tpl($c['content_title'], $c['content_path'], $c['last_update'], $summary);
                }
                
                echo simbio_paging::paging($total, $sysconf['news']['num_each_page'], 5);
              ?>
            </div>

            <nav aria-label="Page navigation example" class="p-2">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="index.php?p=news" tabindex="-1"><?php echo __('Other news');  ?></a>
                </li>
              </ul>
            </nav>
          </div>
          
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Polling</h2>
                <hr>
                <p class="card-text"><?php echo __('Are you satisfied with library services?');  ?></p><br>
                <?php
                if (isset($_POST['vote'])) {
                  global $dbs;

                  $option = $dbs->escape_string(trim($_POST['votechoice']));
                  $vote_date = $dbs->escape_string(trim(date('Y-m-d H:i:s')));
                  $ip_address = $dbs->escape_string(trim($_SERVER['REMOTE_ADDR']));

                  // current password checking
                  $_votes = sprintf("INSERT INTO votes(option_id, voted_tgl, ip)
                    VALUES (%d, '%s', '%s')", $option, $vote_date, $ip_address);

                  $dbs->query($_votes);
                  if ($dbs->affected_rows > 0 ) {
                    echo '<div class="infoBox">'.__("Thanks for voting!").'</div>';
                  } else if ($dbs->error) {
                    echo '<div class="errorBox">'.$dbs->error.'</div>';
                  }
                }
                ?>

                <form method="post" enctype="multipart/form-data" action="index.php">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary">
                      <input type="radio" name="votechoice" id="option1" value="1" checked> <?php echo __('Yes');  ?>
                    </label>
                    <label class="btn btn-secondary">
                      <input type="radio" name="votechoice" id="option2" value="0"> <?php echo __('No');  ?>
                    </label>
                  </div>
                  <br><br>
                  <input type="submit" name="vote" id="button" value="<?php echo __('Submit'); ?>" class="btn btn-primary btn-block" />
                </form>

                <?php
                  $_votesql_yes = sprintf('SELECT COUNT(*) FROM votes
                  WHERE option_id=1');
                  $_votesql_no = sprintf('SELECT COUNT(*) FROM votes
                      WHERE option_id=0');
                  $_vote_yes = $dbs->query($_votesql_yes);
                  $_vote_no = $dbs->query($_votesql_no);
        
                  $_voteresult_yes = $_vote_yes->fetch_row();
                  $_voteresult_no = $_vote_no->fetch_row();
                ?>
                <h2><?php echo __("Result");?></h2>
                <table>
                <tr>
                <td>Yes:</td>
                <td>
                <?php echo $_voteresult_yes[0];?>
                </td>
                </tr>
                <tr>
                <td>No:</td>
                <td>
                <?php echo $_voteresult_no[0];?>
                </td>
                </tr>
                </table> 
              </div>
              <div class="card-footer">
                <p class="text-center h5"><?php echo __('Library Service Rating');  ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!------------ BERITA DAN POLLING END ---------------->

  <!------------ PENGUMUMAN ---------------->
  <section>
    <div id="pengumuman" class="bg-light pb-3">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="text-dark"><?php echo __('Announcement');  ?></h2>
            
            <div class="card-group">
              <div class="card bg-dark text-white position-relative">
                <img src="https://perpus.milkruby.com/images/soft-launching-web-pnj.jpg" class="card-img" alt="...">
                <div class="card-img-overlay overlay">
                  <a href="https://perpus.milkruby.com/index.php?p=soft-launching-websi"><h5 class="card-title text-light">SOFT LAUNCHING WEBSITE BARU POLITEKNIK NEGERI JAKARTA</h5></a>
                </div>
              </div>
              <div class="card bg-dark text-white position-relative">
                <img src="https://perpus.milkruby.com/images/perpanjangan-edom.jpg" class="card-img" alt="...">
                <div class="card-img-overlay overlay">
                  <a href="https://perpus.milkruby.com/index.php?p=perpanjangan-masa-ed"><h5 class="card-title text-light">Perpanjangan Masa Pengisian EDOM Semester Genap 2019/2020</h5></a>
                </div>
              </div>
              <div class="card bg-dark text-white position-relative">
                <img src="https://perpus.milkruby.com/images/pelantikan-pembantu-direktur.jpg" class="card-img" alt="...">
                <div class="card-img-overlay overlay">
                  <a href="https://perpus.milkruby.com/index.php?p=pelantikan-pembantu-"><h5 class="card-title text-light">PELANTIKAN DAN SERAH TERIMA PARA PEMBANTU DIREKTUR DI POLITEKNIK NEGERI JAKARTA</h5></a>
                </div>
              </div>
              <div class="card bg-dark text-white position-relative">
                <img src="https://perpus.milkruby.com/images/kuliah-umum-agama.jpg" class="card-img" alt="...">
                <div class="card-img-overlay overlay">
                  <a href="https://perpus.milkruby.com/index.php?p=kuliah-umum-agama"><h5 class="card-title text-light">KULIAH UMUM AGAMA ISLAM SECARA DARING</h5></a>
                </div>
              </div>
            </div>
            <!--<a class="btn btn-info mt-3 float-right text-light"><?php //echo __("Other announcements");?></a>-->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!------------ PENGUMUMAN END ---------------->
            
  <!------------ REKAP ---------------->
  <section>
    <div id="rekap">
      <div class="container">
        <div class="row h-100">
          <div class="col-sm-3 my-auto">
            <h3 class="text-center"><?php echo __("Data Recapitulation of Jakarta State Polytechnic Library");?></h3>
          </div>
          <div class="col-sm-3 centeri">
            <div class="counter mb-5" data-count="167234">0</div>
            <h4><?php echo __('Book');  ?></h4>
          </div>
          <div class="col-sm-3 centeri">
            <div class="counter mb-5" data-count="150">
              <?php
                $_ta_sql = sprintf('SELECT COUNT(*) FROM thesis');
                $_ta_q = $dbs->query($_ta_sql);
                $_ta_d = $_ta_q->fetch_row();
                  echo $_ta_d[0];
              ?>
            </div>
            <h4><?php echo __('Thesis');  ?></h4>
          </div>
          <div class="col-sm-3 centeri">
            <div class="counter mb-5" data-count="2200">0</div>
            <h4><?php echo __('Reference');  ?></h4>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!------------ REKAP END ---------------->

  <!------------ AKTIVITAS DAN JAM LAYANAN ---------------->
  <section>
    <div id="kegiatan" class="bg-light text-dark text-left">
      <div class="container">
        <div class="row pt-3 pb-3">
          <div class="col-sm-6">
            <h2><?php echo __('Activities');  ?></h2>
              <p><?php echo __('Exploring E-Resources Activities');  ?></p>
              <ul>
                <li><strong><?php echo __('Time');  ?></strong> : <?php echo __('Every Teusday 10 A.M. - Done');  ?></li>
                <li><strong><?php echo __('Place');  ?></strong> : <?php echo __('Multipurpose Room Library Floor');  ?></li>
                <li><strong><?php echo __('Contact');  ?></strong> : <?php echo __('Library information section');  ?></li>
              </ul>
          </div>
          <div class="col-sm-6">
            <h2><?php echo __('Service Hours');  ?></h2>
            <ul>
                <li><span class="font-weight-bold"><?php echo __("Monday - Friday");?> -</span> 07.30 - 16.00</li>
                <li><span class="font-weight-bold"><?php echo __("Saturday - Sunday");?> -</span> Libur</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!------------ AKTIVITAS DAN JAM LAYANAN END ---------------->

  <!------------ KONTAK ---------------->
  <section>
    <div id="kontak" class="text-light pt-3 pb-3 text-left bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h2><i class="fas fa-phone fa-2x pnj-color"></i ><?php echo __('Contact');  ?></h2>
            <ul>
              <li><strong><?php echo __('Address');  ?></strong> : Jl. Prof. Dr. G.A. Siwabessy, Kampus Baru UI, Depok, 16424</li>
              <li><strong><?php echo __('Phone Number');  ?></strong> : (021) 7270036 ext 235</li>
              <li><strong><?php echo __('Fax Number');  ?></strong> : (021) 7270036</li>
              <li><a href="https://twitter.com" class="btn btn-primary" style="background-color:var(--color1);"><?php echo __("Follow");?> @HumasPNJ</a></li>
            </ul>
          </div>
          <div class="col-sm-6">
            <h2><i class="fas fa-map fa-2x pnj-color"></i> <?php echo __('Maps');  ?></h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15860.67694066194!2d106.8243398!3d-6.3721401!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2f054fe3a0295245!2sPoliteknik%20Negeri%20Jakarta!5e0!3m2!1sid!2sid!4v1586953430597!5m2!1sid!2sid" width="320" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!------------ KONTAK END ---------------->


</main>
<?php endif; ?>


<?php
// Advance Search
//include "partials/advsearch.php";


// Footer
include "partials/footer.php"; 

// Chat Engine
//include LIB."contents/chat.php";

// Background
include "partials/bg.php";
?>

<script>
  <?php if(isset($_GET['search']) && (isset($_GET['keywords'])) && ($_GET['keywords'] != ''))   : ?>
  $('.biblioRecord .detail-list, .biblioRecord .title, .biblioRecord .abstract, .biblioRecord .controls').highlight(<?php echo $searched_words_js_array; ?>);
  <?php endif; ?>

  //Replace blank cover
  $('.book img').error(function(){
    var title = $(this).parent().attr('title').split(' ');
    $(this).parent().append('<div class="s-feature-title">' + title[0] + '<br/>' + title[1] + '<br/>... </div>');
    $(this).attr({
      src   : './template/default/img/book.png',
      title : title + title[0] + ' ' + title[1]
    });
  });

  //Replace blank photo
  $('.librarian-image img').error(function(){
    $(this).attr('src','./template/default/img/avatar.jpg');
  });

  //Feature list slider
  function mycarousel_initCallback(carousel)
  {
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
      carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
      carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
      carousel.stopAuto();
    }, function() {
      carousel.startAuto();
    });
  };

  jQuery('#topbook').jcarousel({
      auto: 5,
      wrap: 'last',
      initCallback: mycarousel_initCallback
  });

  $(window).scroll(function() {
    // console.log($(window).scrollTop());
    if ($(window).scrollTop() > 50) {
      $('.s-main-search').removeClass("animated fadeIn").addClass("animated fadeOut");
    } else {
      $('.s-main-search').removeClass("animated fadeOut").addClass("animated fadeIn");
    }
  });

  $('.s-search-advances').click(function() {
    $('#advance-search').animate({opacity : 1,}, 500, 'linear');
    $('#simply-search, .s-menu, #content').hide();
    $('.s-header').addClass('hide-header');
    $('.s-background').addClass('hide-background');
  });

  $('#hide-advance-search').click(function(){
    $('.s-header').toggleClass('hide-header');
    $('.s-background').toggleClass('hide-background');
    $('#advance-search').animate({opacity : 0,}, 500, 'linear', function(){
      $('#simply-search, .s-menu, #content').show();
    });
  });

</script>


<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="<?php echo SWB.'template'.DS.$sysconf['template']['theme']; ?>/css/smartmenus-1.1.0/jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery Bootstrap 4 Addon -->
<script type="text/javascript" src="<?php echo SWB.'template'.DS.$sysconf['template']['theme']; ?>/css/smartmenus-1.1.0/addons/bootstrap-4/jquery.smartmenus.bootstrap-4.js"></script>

<!-- SmartMenus jQuery init -->
<script type="text/javascript">
	$(function() {
		$('#main-menu').smartmenus({
			subMenusSubOffsetX: 1,
			subMenusSubOffsetY: -8
		});
	});
</script>

<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","index.php?vote="+int,true);
  xmlhttp.send();
}
</script>

</body>
</html>