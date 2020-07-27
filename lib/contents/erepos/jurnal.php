<h1>Jurnal</h1>
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="erep-jurnal-tab1-tab" data-toggle="pill" href="#erep-jurnal-tab1" role="tab" aria-controls="erep-jurnal-tab1" aria-selected="true">Teknik Informatika dan Komputer</a>
      <a class="nav-link" id="erep-jurnal-tab2-tab" data-toggle="pill" href="#erep-jurnal-tab2" role="tab" aria-controls="erep-jurnal-tab2" aria-selected="false">Administrasi Niaga</a>
      <a class="nav-link" id="erep-jurnal-tab3-tab" data-toggle="pill" href="#erep-jurnal-tab3" role="tab" aria-controls="erep-jurnal-tab3" aria-selected="false">Teknik Mesin</a>
      <a class="nav-link" id="erep-jurnal-tab4-tab" data-toggle="pill" href="#erep-jurnal-tab4" role="tab" aria-controls="erep-jurnal-tab4" aria-selected="false">Teknik Sipil</a>
      <a class="nav-link" id="erep-jurnal-tab5-tab" data-toggle="pill" href="#erep-jurnal-tab5" role="tab" aria-controls="erep-jurnal-tab5" aria-selected="false">Teknik Elektro</a>
      <a class="nav-link" id="erep-jurnal-tab6-tab" data-toggle="pill" href="#erep-jurnal-tab6" role="tab" aria-controls="erep-jurnal-tab6" aria-selected="false">Akuntansi</a>
      <a class="nav-link" id="erep-jurnal-tab7-tab" data-toggle="pill" href="#erep-jurnal-tab7" role="tab" aria-controls="erep-jurnal-tab7" aria-selected="false">Teknik Grafika dan Penerbitan (Tata Niaga)</a>
      <a class="nav-link" id="erep-jurnal-tab8-tab" data-toggle="pill" href="#erep-jurnal-tab8" role="tab" aria-controls="erep-jurnal-tab8" aria-selected="false">Teknik Grafika Penerbitan (Rekayasa)</a>
      <a class="nav-link" id="erep-jurnal-tab9-tab" data-toggle="pill" href="#erep-jurnal-tab9" role="tab" aria-controls="erep-jurnal-tab9" aria-selected="false">Dosen</a>
    </div>
  </div>
  <div class="col-9">
  <input type="text" id="tags" class="form-control" data-role="tagsinput" />
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="erep-jurnal-tab1" role="tabpanel" aria-labelledby="erep-jurnal-tab1-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurTIK">Search</button>
        </div>
        <ul id="hslCarijurTIK" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=4 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-jurnal-tab2" role="tabpanel" aria-labelledby="erep-jurnal-tab2-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurAN">Search</button>
        </div>
        <ul id="hslCarijurAN" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=7 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-jurnal-tab3" role="tabpanel" aria-labelledby="erep-jurnal-tab3-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurTM">Search</button>
        </div>
        <ul id="hslCarijurTM" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=2 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-jurnal-tab4" role="tabpanel" aria-labelledby="erep-jurnal-tab4-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurTS">Search</button>
        </div>
        <ul id="hslCarijurTS" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=1 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-jurnal-tab5" role="tabpanel" aria-labelledby="erep-jurnal-tab5-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurTE">Search</button>
        </div>
        <ul id="hslCarijurTE" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=3 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-jurnal-tab6" role="tabpanel" aria-labelledby="erep-jurnal-tab6-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurA">Search</button>
        </div>
        <ul id="hslCarijurA" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=6 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-jurnal-tab7" role="tabpanel" aria-labelledby="erep-jurnal-tab7-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurTGPTN">Search</button>
        </div>
        <ul id="hslCarijurTGPTN" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=5 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-jurnal-tab8" role="tabpanel" aria-labelledby="erep-jurnal-tab8-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurTGPR">Search</button>
        </div>
        <ul id="hslCarijurTGPR" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=8 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-jurnal-tab9" role="tabpanel" aria-labelledby="erep-jurnal-tab9-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="jurDosen">Search</button>
        </div>
        <ul id="hslCarijurDosen" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=2 AND member_major=11 ORDER BY time_uploaded DESC');
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