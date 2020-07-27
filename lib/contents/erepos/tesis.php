<h1>Tesis</h1>
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="erep-tesis-tab1-tab" data-toggle="pill" href="#erep-tesis-tab1" role="tab" aria-controls="erep-tesis-tab1" aria-selected="true">Magister Terapan Teknik Elektro</a>
      <a class="nav-link" id="erep-tesis-tab2-tab" data-toggle="pill" href="#erep-tesis-tab2" role="tab" aria-controls="erep-tesis-tab2" aria-selected="false">Magister Terapan Rekayasa Teknologi Manufaktur</a>
      <a class="nav-link" id="erep-tesis-tab3-tab" data-toggle="pill" href="#erep-tesis-tab3" role="tab" aria-controls="erep-tesis-tab3" aria-selected="false">Dosen</a>
    </div>
  </div>
  <div class="col-9">
  <input type="text" id="tags" class="form-control" data-role="tagsinput" />
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="erep-tesis-tab1" role="tabpanel" aria-labelledby="erep-tesis-tab1-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="tesMTTE">Search</button>
        </div>
        <ul id="hslCaritesMTTE" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=5 AND member_major=9 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-tesis-tab2" role="tabpanel" aria-labelledby="erep-tesis-tab2-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="tesMTRTM">Search</button>
        </div>
        <ul id="hslCaritesMTRTM" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=5 AND member_major=10 ORDER BY time_uploaded DESC');
            $_thesis_q = $dbs->query($_thesis_sql);
            while($_thesis_d=$_thesis_q->fetch_row()){
              echo "<a href=".$_thesis_d[1]."><li class='list-group-item d-flex justify-content-between align-items-center'>".$_thesis_d[0]."<span class='badge badge-primary badge-pill'>PDF</span></li></a>";
            }
          ?>
        </ul>
      </div>
      <div class="tab-pane fade" id="erep-tesis-tab3" role="tabpanel" aria-labelledby="erep-tesis-tab3-tab">
        <div class="input-group mb-3">
          <button type="button" name="search" class="btn btn-primary btn-block" id="search" data-upload-type="tesDosen">Search</button>
        </div>
        <ul id="hslCaritesDosen" class="list-group list-group-flush">
          <?php
            $_thesis_sql = sprintf('SELECT thesis_title,thesis_file_url FROM thesis WHERE thesis_type=5 AND member_major=11 ORDER BY time_uploaded DESC');
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