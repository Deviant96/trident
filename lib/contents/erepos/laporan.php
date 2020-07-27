<h1>Laporan PKL</h1>
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="erep-laporan-tab1-tab" data-toggle="pill" href="#erep-laporan-tab1" role="tab" aria-controls="erep-laporan-tab1" aria-selected="true">Teknik Informatika dan Komputer</a>
      <a class="nav-link" id="erep-laporan-tab2-tab" data-toggle="pill" href="#erep-laporan-tab2" role="tab" aria-controls="erep-laporan-tab2" aria-selected="false">Administrasi Niaga</a>
      <a class="nav-link" id="erep-laporan-tab3-tab" data-toggle="pill" href="#erep-laporan-tab3" role="tab" aria-controls="erep-laporan-tab3" aria-selected="false">Teknik Mesin</a>
      <a class="nav-link" id="erep-laporan-tab4-tab" data-toggle="pill" href="#erep-laporan-tab4" role="tab" aria-controls="erep-laporan-tab4" aria-selected="false">Teknik Sipil</a>
      <a class="nav-link" id="erep-laporan-tab5-tab" data-toggle="pill" href="#erep-laporan-tab5" role="tab" aria-controls="erep-laporan-tab5" aria-selected="false">Teknik Elektro</a>
      <a class="nav-link" id="erep-laporan-tab6-tab" data-toggle="pill" href="#erep-laporan-tab6" role="tab" aria-controls="erep-laporan-tab6" aria-selected="false">Akuntansi</a>
      <a class="nav-link" id="erep-laporan-tab7-tab" data-toggle="pill" href="#erep-laporan-tab7" role="tab" aria-controls="erep-laporan-tab7" aria-selected="false">Teknik Grafika dan Penerbitan (Tata Niaga)</a>
      <a class="nav-link" id="erep-laporan-tab8-tab" data-toggle="pill" href="#erep-laporan-tab8" role="tab" aria-controls="erep-laporan-tab8" aria-selected="false">Teknik Grafika Penerbitan (Rekayasa)</a>
    </div>
  </div>
  <div class="col-9">
  <input type="text" id="tags" class="form-control" data-role="tagsinput" />
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="erep-laporan-tab1" role="tabpanel" aria-labelledby="erep-laporan-tab1-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="lapTIK">Search</button>
        </div>
        <ul id="hslCarilapTIK" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=3 AND member_major=4 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-laporan-tab2" role="tabpanel" aria-labelledby="erep-laporan-tab2-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="lapAN">Search</button>
        </div>
        <ul id="hslCarilapAN" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=3 AND member_major=7 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-laporan-tab3" role="tabpanel" aria-labelledby="erep-laporan-tab3-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="lapTM">Search</button>
        </div>
        <ul id="hslCarilapTM" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=3 AND member_major=2 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-laporan-tab4" role="tabpanel" aria-labelledby="erep-laporan-tab4-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="lapTS">Search</button>
        </div>
        <ul id="hslCarilapTS" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=3 AND member_major=1 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-laporan-tab5" role="tabpanel" aria-labelledby="erep-laporan-tab5-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="lapTE">Search</button>
        </div>
        <ul id="hslCarilapTE" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=3 AND member_major=3 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-laporan-tab6" role="tabpanel" aria-labelledby="erep-laporan-tab6-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="lapA">Search</button>
        </div>
        <ul id="hslCarilapA" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=3 AND member_major=6 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-laporan-tab7" role="tabpanel" aria-labelledby="erep-laporan-tab7-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="lapTGPTN">Search</button>
        </div>
        <ul id="hslCarilapTGPTN" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=3 AND member_major=5 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-laporan-tab8" role="tabpanel" aria-labelledby="erep-laporan-tab8-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="lapTGPR">Search</button>
        </div>
        <ul id="hslCarilapTGPR" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=3 AND member_major=8 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>