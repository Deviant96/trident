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

      <h2>ARE YOU SEARCHING A BOOK?</h2>
      <p class="display-4 font-weight-bold">BIGGEST LIBRARY</p>

    </div>

  </div>
  <!-- End of Search Form
  ============================================= -->

  <div class="container position-relative mt-5">
    <nav id="menu" class="navbar navbar-expand-lg">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto font-weight-light centeri" style="margin-left:20px;">
          <li class="nav-item active">
            <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown dropdown-slide dropdown-hover">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="index.php?p=history"><?php echo __('History'); ?></a>
              <a class="dropdown-item" href="index.php?p=visi"><?php echo __('Vision and Mission'); ?></a>
              <a class="dropdown-item" href="index.php?p=struktur_organisasi"><?php echo __('Organization Structure'); ?></a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=news"><?php echo __('News'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=catalog"><?php echo __('Catalog'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=digital_collection"><?php echo __('Digital Collection'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=jurnal_akreditasi"><?php echo __('Journal of Accreditation'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=prosiding"><?php echo __('Proceedings'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=kuesioner"><?php echo __('Questionnaire'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo __('Download'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=laporan_akhir"><?php echo __('Submitting Final Report'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=contact"><?php echo __('Contact'); ?></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>


  <section>
    <div id="feature" class="bg-light text-dark">
      <div class="container">
        <div id="opening" class="text-md-center p-5">
          <h2 class="font-weight-bold">Selamat Datang di Perpustakaan<br>
          Politeknik Negeri Jakarta</h2>
        </div>
        <hr>
        <div class="row p-5">
          <div class="col">
            <div class="card-deck">
              <div class="card bg-transparent" style="border:0px;">
                <i class="fas fa-gift fa-7x text-center p-3 pnj-color"></i>
                <div class="card-body">
                  <h3 class="card-title text-center">Katalog Buku Jurusan/Prodi</h3>
                  <p class="card-text">Koleksi buku perpustakaan berdasarkan kategori jurusan/prodi.</p>
                </div>
              </div>
              <div class="card bg-transparent" style="border:0px;">
                <i class="fas fa-book fa-7x text-center p-3 pnj-color"></i>
                <div class="card-body">
                  <h3 class="card-title text-center">OPAC</h3>
                  <p class="card-text">Katalog online pencarian koleksi perpustakaan pusat Politeknik Negeri Jakarta.</p>
                </div>
              </div>
              <div class="card bg-transparent" style="border:0px;">
                <i class="fas fa-layer-group fa-7x text-center p-3 pnj-color"></i>
                <div class="card-body">
                  <h3 class="card-title text-center">E-Repository</h3>
                  <p class="card-text">Kumpulan artikel, jurnal, skripsi, tesis dan karya ilmiah.</p>
                </div>
              </div>
              <div class="card bg-transparent" style="border:0px;">
                <i class="fas fa-calculator fa-7x text-center p-3 pnj-color"></i>
                <div class="card-body">
                  <h3 class="card-title text-center">Onesearch</h3>
                  <p class="card-text">Satu pintu pencarian untuk semua koleksi publik dari perpustakaan, museum, arsip, dan sumber elektronik di Indonesia.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section>
    <div id="rekap">
      <div class="container">
        <div class="row h-100">
          <div class="col-3 my-auto">
            <h3 class="text-center">Rekapitulasi Data Perpustakaan Politeknik Negeri Jakarta</h3>
          </div>
          <div class="col-3 centeri">
            <div class="counter mb-5" data-count="167234">0</div>
            <h4>Buku</h4>
          </div>
          <div class="col-3 centeri">
            <div class="counter mb-5"" data-count="150">0</div>
            <h4>Tugas Akhir</h4>
          </div>
          <div class="col-3 centeri">
            <div class="counter mb-5"" data-count="2200">0</div>
            <h4>Referensi</h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div id="kegiatan" class="bg-light text-dark text-left">
      <div class="container">
        <div class="row pt-3 pb-3">
          <div class="col-6">
            <h2>Kegiatan</h2>
              <p>Kegiatan Penelusuran E-Resources</p>
              <ul>
                <li><strong>Waktu</strong> : Tiap hari selasa jam 10.00 - selesai</li>
                <li><strong>Tempat</strong> : Ruang Serbaguna Lantai Perpustakaan</li>
                <li><strong>Kontak</strong> : Bagian informasi perpustakaan</li>
              </ul>
          </div>
          <div class="col-6">
            <h2>Jam Layanan</h2>
            <ul>
              <li><strong>Senin - Kamis</strong><br>Buka jam 08.00 - 19.00</li>
              <li><strong>Jumat</strong><br>Buka jam 09.00 - 19.30<br>Istirahat Jam 11.30 - 13.00</li>
              <li><strong>Sabtu</strong><br>Buka jam 09.00 - 14.00</li>
              <li><strong>Minggu</strong><br>Libur</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div id="kontak" class="text-dark pt-5 pb-3 text-left">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="col-3">
                <i class="fas fa-phone fa-3x float-right mt-5 pnj-color"></i>
              </div>
              <div class="col-9">
                <h2>Kontak</h2>
                <ul>
                  <li>Address : Jl. Prof. Dr. G.A. Siwabessy, Kampus Baru UI, Depok, 16424</li>
                  <li>Phone Number : (021) 7270036 ext 235</li>
                  <li>Fax Number : (021) 7270036</li>
                  <li><a href="https://twitter.com" class="btn btn-primary" style="background-color:var(--color1);">Ikuti @HumasPNJ</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="row">
              <div class="col-3">
                <i class="fas fa-map fa-3x float-right mt-5 pnj-color"></i>
              </div>
              <div class="col-9">
                <h2>Maps</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15860.67694066194!2d106.8243398!3d-6.3721401!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2f054fe3a0295245!2sPoliteknik%20Negeri%20Jakarta!5e0!3m2!1sid!2sid!4v1586953430597!5m2!1sid!2sid" width="320" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
  <div id="weblink" class="pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="weblink-col">
          <h2>Tautan Terkait</h2>
          <ul>
            <li><a href="https://google.com">Akademik & Kemahasiswaan</a></li>
            <li><a href="https://google.com">AKN Demak</a></li>
            <li><a href="https://google.com">Bidang Kerjasama</a></li>
            <li><a href="https://google.com">IBIKK-LSK</a></li>
            <li><a href="https://google.com">International Office</a></li>
            <li><a href="https://google.com">Kearsipan</a></li>
            <li><a href="https://google.com">Kemahasiswaan</a></li>
            <li><a href="https://google.com">Keuangan</a></li>
            <li><a href="https://google.com">Koperasi Karyawan</a></li>
            <li><a href="https://google.com">LPSE</a></li>
            <li><a href="https://google.com">LSP</a></li>
            <li><a href="https://google.com">P3AI</a></li>
            <li><a href="https://google.com">P3M</a></li>
            <li><a href="https://google.com">Perencanaan</a></li>
            <li><a href="https://google.com">Perpustakaan</a></li>
            <li><a href="https://google.com">PUSDATIN</a></li>
            <li><a href="https://google.com">Puskominfo Alumni</a></li>
            <li><a href="https://google.com">Senat</a></li>
            <li><a href="https://google.com">SPMI</a></li>
            <li><a href="https://google.com">UP2B</a></li>
            <li><a href="https://google.com">PUTOL</a></li>
          </ul>
        </div>
        <div class="weblink-col">
          <h2>Jurusan</h2>
            <ul>
            <li><a href="https://google.com">Teknik Sipil</a></li>
            <li><a href="https://google.com">Teknik Elektro</a></li>
            <li><a href="https://google.com">TIK</a></li>
            <li><a href="https://google.com">TGP</a></li>
            <li><a href="https://google.com">Akuntansi</a></li>
            <li><a href="https://google.com">Administrasi Niaga</a></li>
            <li><a href="https://google.com">Manajemen Pemasaran</a></li>
            <li><a href="https://google.com">Bispro</a></li>
          </ul>
        </div>
        <div class="weblink-col">
          <h2>Portal Aplikasi</h2>
          <ul>
            <li><a href="https://google.com">Edmodo</a></li>
            <li><a href="https://google.com">Google Classrom</a></li>
            <li><a href="https://google.com">OPM</a></li>
            <li><a href="https://google.com">Simpeg</a></li>
            <li><a href="https://google.com">Simkeu</a></li>
            <li><a href="https://google.com">Sink</a></li>
            <li><a href="https://google.com">SIKTI</a></li>
            <li><a href="https://google.com">SIKS</a></li>
            <li><a href="https://google.com">Sister</a></li>
          </ul>
        </div>
        <div class="weblink-col">
          <h2>Mahasiswa</h2>
          <ul>
            <li><a href="https://google.com">Website Mahasiswa</a></li>
            <li><a href="https://google.com">Email Mahasiswa</a></li>
            <li><a href="https://google.com">Badan Eksekutif Mahasiswa</a></li>
            <li><a href="https://google.com">Hima</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

</main>
<?php endif; ?>


<?php
// Advance Search
include "partials/advsearch.php";

// Footer
include "partials/footer.php";

// Chat Engine
include LIB."contents/chat.php";

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
<script>
  

  jQuery(document).on('click', '.mega-dropdown', function(e) {
        e.stopPropagation()
    });

  </script>
</body>
</html>
