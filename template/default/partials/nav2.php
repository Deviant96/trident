<div class="position-relative mt-5 centeri">
    <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light rounded text-left">
      
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">


        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php"><?php echo __('Profile'); ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?p=history"><?php echo __('History'); ?></a></li>
                <li><a class="dropdown-item" href="index.php?p=visi"><?php echo __('Vision and Mission'); ?></a></li>
                <li><a class="dropdown-item" href="index.php?p=struktur-organisasi"><?php echo __('Organization Structure'); ?></a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php"><?php echo __('Facility'); ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php"><?php echo __('Correction'); ?></a></li>
                <li><a class="dropdown-item" href="index.php"><?php echo __('Reading Room'); ?></a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php?p=news"><?php echo __('News'); ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?p=undangan-seminar"><?php echo __('National Seminar and Workshop'); ?></a></li>
                <li><a class="dropdown-item" href="index.php?p=agenda-seminar"><?php echo __('Agenda'); ?></a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php"><?php echo __('Catalog'); ?></a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="http://opac.perpustakaan.pnj.ac.id/"><?php echo __('OPAC'); ?></a></li>
                  <li><a class="dropdown-item" href="https://onesearch.id"><?php echo __('One Search'); ?></a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"><?php echo __('Major Book Catalog'); ?> &raquo</a>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="files/f/ak_d3_1.pdf"><?php echo __('D3 Accountant'); ?></a></li>
                          <li><a class="dropdown-item" href="files/f/AN.pdf"><?php echo __('Commerce Administration'); ?></a></li>
                          <li><a class="dropdown-item" href="files/f/mice.pdf"><?php echo __('MICE'); ?></a></li>
                          <li><a class="dropdown-item" href="files/f/TEKNIK_ELEKTRO.pdf"><?php echo __('Electrical Engineering'); ?></a></li>
                          <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="files/f/TEKNIK_MESINN.pdf"><?php echo __('Machine Engineering'); ?> &raquo</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/makara-journal-of-technology"><?php echo __('Makara Journal of Technology'); ?></a></li>
                            </ul>
                          </li>
                          <li><a class="dropdown-item" href="files/f/TEKNIK_SIPIL.pdf"><?php echo __('Civil Engineering'); ?></a></li>
                          <li><a class="dropdown-item" href="files/f/TIKNIK_INFORMATIKA_KOMPUTER.pdf"><?php echo __('Informatics and Computer Engineering'); ?></a></li>
                          <li><a class="dropdown-item" href="files/f/TEKNIK_GRAFIKA_DAN_PENERBITAN.pdf"><?php echo __('Graphic Publishing Engineering'); ?></a></li>
                      </ul>
                  </li>
              </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo __('Digital Collection'); ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="https://onesearch.id/"><?php echo __('One Search'); ?></a></li>
                <li><a class="dropdown-item" href="https://www.cambridge.org/core"><?php echo __('Cambridge'); ?></a></li>
                <li><a class="dropdown-item" href="index.php?p=eresources-pnri"><?php echo __('E-Resources PERPUSNAS'); ?></a></li>
                <li><a class="dropdown-item" href="https://ebookcentral.proquest.com/lib/pnj/home.action"><?php echo __('Proquest'); ?></a></li>
                <li><a class="dropdown-item" href="http://search.ebscohost.com/"><?php echo __('EBSCO'); ?></a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php?p=jurnal_akreditasi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo __('Journal of Accreditation'); ?></a>
            <ul class="dropdown-menu">
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php"><?php echo __('Computer Science'); ?> &raquo</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/buletin-pos-dan-telekomunikasi"><?php echo __('PROSTEL'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/commit"><?php echo __('Jurnal Comm IT'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/inkom-jurnal-informatika-sistem-kendali-dan-komputer"><?php echo __('INKOM: Jurnal Informatika, Sistem Kendali, dan Komputer'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-ilmu-komputer-dan-informasi"><?php echo __('Jurnal Ilmu Komputer dan Informasi (JIKI)'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/iptekkom-jurnal-penelitian-teknologi-informasi-dan-komunikasi"><?php echo __('Jurnal Ilmu Pengetahuan dan Teknologi Komputasi'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-sistem-informasi"><?php echo __('Jurnal Sistem Informasi'); ?></a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php"><?php echo __('Management and Business'); ?> &raquo</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/journal-of-indonesian-economy-and-business"><?php echo __('Journal JIEB'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-manajemen-teknologi"><?php echo __('Jurnal Manajemen Teknologi'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-manajemen-untar"><?php echo __('Jurnal Manajemen Untar'); ?></a></li>
                  <li><a class="dropdown-item" href="https://mix.mercubuana.ac.id/id/"><?php echo __('MIX: Jurnal Ilmiah Manajemen'); ?></a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php"><?php echo __('Industry Engineering and Manufacture'); ?> &raquo</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-dinamika-penelitian-industri"><?php echo __('Journal of Industrial Research Dynamics (JDPI)'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/journal-of-industrial-research-jurnal-riset-industri"><?php echo __('Jurnal Riset Industri'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-riset-teknologi-pencegahan-pencemaran-industri"><?php echo __('Jurnal Riset Teknologi Pencegahan Pencemaran Industri'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/makara-journal-of-technology"><?php echo __('Makara Journal of Technology'); ?></a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php"><?php echo __('Banking Finance, Accounting'); ?> &raquo</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-akuntansi-dan-keuangan-indonesia"><?php echo __('Indonesian Financial and Accounting Journal (JAKI)'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-akuntansi-dan-investasi"><?php echo __('Journal of Accounting and Investment (JAI)'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-akuntansi-dan-auditing-indonesia"><?php echo __('Jurnal Akuntansi dan Auditing Indonesia (JAAI)'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-keuangan-dan-perbankan"><?php echo __('Jurnal Keuangan dan Perbankan (JKP)'); ?></a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php"><?php echo __('Machine Engineering'); ?> &raquo</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/journal-of-mechatronics-electrical-power-and-vehicular-technology"><?php echo __('Journal of Mechantronics, Electrical Power (MEV)'); ?></a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php"><?php echo __('Civil Engineering, Architecture, Construction'); ?> &raquo</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-teknik-sipil-itb"><?php echo __('Civil Engineering Journal ITB'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/journal-of-islamic-architecture"><?php echo __('Journal of Islamic Architecture (JIA)'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/makara-journal-of-technology"><?php echo __('Makara Journal of Technology'); ?></a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php"><?php echo __('Tourism'); ?> &raquo</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/humaniora-ugm"><?php echo __('Humanities'); ?></a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php"><?php echo __('Electrical Engineering and TELKOM'); ?> &raquo</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/jurnal-rekayasa-elektrika"><?php echo __('Journal of Electrical Engineering'); ?></a></li>
                  <li><a class="dropdown-item" href="https://www.neliti.com/id/journals/buletin-pos-dan-telekomunikasi"><?php echo __('Buletin Pos dan Telekomunikasi (BPOSTEL)'); ?></a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php?p=prosiding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo __('Proceedings'); ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="https://elektro.pnj.ac.id/upload/artikel/files/elektro/Buku%20Prosiding%20SNTE%202014.pdf"><?php echo __('Proceedings SNTE 2014'); ?></a></li>
                <li><a class="dropdown-item" href="https://elektro.pnj.ac.id/upload/artikel/files/elektro/Prosiding%20SNTE%202015.pdf"><?php echo __('Proceedings SNTE 2015'); ?></a></li>
                <li><a class="dropdown-item" href="https://elektro.pnj.ac.id/upload/artikel/files/elektro/PROSIDING%20SNTE%202016.pdf.pdf"><?php echo __('Proceedings SNTE 2016'); ?></a></li>
                <li><a class="dropdown-item" href="https://elektro.pnj.ac.id/upload/artikel/files/elektro/PROSIDING%20SNTE%20VOL%203%202017.pdf"><?php echo __('Proceedings SNTE 2017'); ?></a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php?p=kuesioner" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo __('Questionnaire'); ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?p=kuesioner"><?php echo __('Questionnaire'); ?></a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo __('Download'); ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="files/f/manual_e_books_Repaired.pdf"><?php echo __('E-Book User Guide'); ?></a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo __('Submitting Final Report'); ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?p=laporan-akhir-2019"><?php echo __('Submitting Final Report for Student 2019'); ?></a></li>
            </ul>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="index.php?p=contact"><?php echo __('Contact'); ?></a>
          </li>

        </ul>
      </div>
    </nav>
  </div>