<?php
$info = __('Contact information and address');
$page_title = __('Contact');
// be sure that this file not accessed directly
if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} elseif (INDEX_AUTH != 1) { 
    die("can not access this file directly");
}
?>

<section>
  <div id="kontak" class="mt-3 pt-3 pb-3">
    <div class="container">
      <div class="row">
        <div class="col-6">
            <h2>Informasi</h2>
            <ul>
                <li><span class="font-weight-bold">Address :</span> Jl. Prof. Dr. G.A. Siwabessy, Kampus Baru UI, Depok, 16424</li>
                <li><span class="font-weight-bold">Email :</span> perpustakaan@pnj.ac.id</li>
                <li><span class="font-weight-bold">Phone Number :</span> (021) 7270036 ext 235</li>
            </ul>
            <br>
            <h2>Jam Kerja</h2>
            <ul>
                <li><span class="font-weight-bold">Senin - Jumat -</span> 07.30 - 16.00</li>
                <li><span class="font-weight-bold">Sabtu - Minggu -</span> Libur</li>
            </ul>
        </div>
        <div class="col-6">
            <h2>Maps</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15860.67694066194!2d106.8243398!3d-6.3721401!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2f054fe3a0295245!2sPoliteknik%20Negeri%20Jakarta!5e0!3m2!1sid!2sid!4v1586953430597!5m2!1sid!2sid" width="320" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

