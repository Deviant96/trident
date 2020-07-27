<h1>Proposal Event</h1>
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="erep-proposal-tab1-tab" data-toggle="pill" href="#erep-proposal-tab1" role="tab" aria-controls="erep-proposal-tab1" aria-selected="true">Teknik Informatika dan Komputer</a>
      <a class="nav-link" id="erep-proposal-tab2-tab" data-toggle="pill" href="#erep-proposal-tab2" role="tab" aria-controls="erep-proposal-tab2" aria-selected="false">Administrasi Niaga</a>
      <a class="nav-link" id="erep-proposal-tab3-tab" data-toggle="pill" href="#erep-proposal-tab3" role="tab" aria-controls="erep-proposal-tab3" aria-selected="false">Teknik Mesin</a>
      <a class="nav-link" id="erep-proposal-tab4-tab" data-toggle="pill" href="#erep-proposal-tab4" role="tab" aria-controls="erep-proposal-tab4" aria-selected="false">Teknik Sipil</a>
      <a class="nav-link" id="erep-proposal-tab5-tab" data-toggle="pill" href="#erep-proposal-tab5" role="tab" aria-controls="erep-proposal-tab5" aria-selected="false">Teknik Elektro</a>
      <a class="nav-link" id="erep-proposal-tab6-tab" data-toggle="pill" href="#erep-proposal-tab6" role="tab" aria-controls="erep-proposal-tab6" aria-selected="false">Akuntansi</a>
      <a class="nav-link" id="erep-proposal-tab7-tab" data-toggle="pill" href="#erep-proposal-tab7" role="tab" aria-controls="erep-proposal-tab7" aria-selected="false">Teknik Grafika dan Penerbitan (Tata Niaga)</a>
      <a class="nav-link" id="erep-proposal-tab8-tab" data-toggle="pill" href="#erep-proposal-tab8" role="tab" aria-controls="erep-proposal-tab8" aria-selected="false">Teknik Grafika Penerbitan (Rekayasa)</a>
    </div>
  </div>
  <div class="col-9">
    <input type="text" id="tags" class="form-control" data-role="tagsinput" />
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="erep-proposal-tab1" role="tabpanel" aria-labelledby="erep-proposal-tab1-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="propTIK">Search</button>
        </div>
        <ul id="hslCaripropTIK" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=4 AND member_major=4 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-proposal-tab2" role="tabpanel" aria-labelledby="erep-proposal-tab2-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="propAN">Search</button>
        </div>
        <ul id="hslCaripropAN" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=4 AND member_major=7 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-proposal-tab3" role="tabpanel" aria-labelledby="erep-proposal-tab3-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="propTM">Search</button>
        </div>
        <ul id="hslCaripropTM" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=4 AND member_major=2 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-proposal-tab4" role="tabpanel" aria-labelledby="erep-proposal-tab4-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="propTS">Search</button>
        </div>
        <ul id="hslCaripropTS" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=4 AND member_major=1 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-proposal-tab5" role="tabpanel" aria-labelledby="erep-proposal-tab5-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="propTE">Search</button>
        </div>
        <ul id="hslCaritaTE" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=4 AND member_major=3 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-proposal-tab6" role="tabpanel" aria-labelledby="erep-proposal-tab6-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="propA">Search</button>
        </div>
        <ul id="hslCaripropA" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=4 AND member_major=6 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-proposal-tab7" role="tabpanel" aria-labelledby="erep-proposal-tab7-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="propTGPTN">Search</button>
        </div>
        <ul id="hslCaripropTGPTN" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=4 AND member_major=5 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-proposal-tab8" role="tabpanel" aria-labelledby="erep-proposal-tab8-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="propTGPR">Search</button>
        </div>
        <ul id="hslCaripropTGPR" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=4 AND member_major=8 ORDER BY time_uploaded DESC');
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