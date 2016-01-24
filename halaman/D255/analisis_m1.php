<?php
  session_start();
  if(!isset($_SESSION['stat']))
  {
    ?>
	  <script type="text/javascript">
      alert("Maaf Harus Login Terlebih Dahulu");
      document.location='../../index.php';</script>
    <?php
  }
  include_once "../../lib_function.php";
  koneksi_db();
  include_once "desain_guru.php";
  $nip = $_SESSION['nip'];
  $sesi = $_SESSION['nama_guru'];
  $id_mp = $_SESSION['id_mp'];
  $nama_mp = $_SESSION['nama_mp'];
  
  if($_SESSION["stats"] != "guru")
  {
    ?>
	<script type="text/javascript">
    alert("Maaf Halaman Ini Hanya Untuk Guru");
    document.location='../../index.php';</script>
    <?php
  }
  else
  {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>LMS SMA NEGERI 7 BANDUNG</title>
<?php cess() ?>
<link rel="shortcut icon" href="../../gambar/icon.ico" />
</head>
<body class="fixed-top">
<div class="header navbar navbar-inverse navbar-fixed-top">

<!--AWAL HEADER-->
<div class="navbar-inner">
<div class="container-fluid">
<!--AWAL LOGO--><a class="brand" href="#">LMS SMA NEGERI 7 BANDUNG</a><!--AKHIR LOGO-->			
<ul class="nav pull-right">
<!--AWAL INFO USER LOGIN--><?php pengguna() ?><!--AKHIR INFO USER LOGIN-->
</ul>
</div>
</div>
</div>
<div class="page-container row-fluid">
<!--AWAL MENU UTAMA--><?php menu_utama() ?><!--AKHIR MENU UTAMA-->
<!--MULAI HALAMAN-->
<div class="page-content">
<!--AWAL KONFIGURASI FORM--><?php konfig_form() ?><!--AKHIR KONFIGURASI FORM-->
<div class="container-fluid">
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
<div class="span12">
<!--AWAL MENU TEMA <?php tema() ?> AKHIR MENU TEMA-->	
<h3 class="page-title">HALAMAN GURU</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> ANALISIS TINGKAT KESUKARAN SOAL</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NO</th>
       <th>SOAL</th>
	   <th>JUMLAH</th>
	   <th>JAWABAN BENAR</th>
	   <th>JAWABAN SALAH</th>
	   <th>TINGKAT SOAL</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
$query_adps = mysql_query("
    SELECT 
    z.*,
    (CASE
      WHEN z.p >=0 AND z.p <= 0.3 THEN 'sukar'
      WHEN z.p >=0.31 AND z.p <= 0.7 THEN 'sedang'
      ELSE 'mudah'
    END) AS analisis_soal
    FROM
    (
    SELECT 
       `analisis_tingkat_kesukaran`.`id_analisis` AS `id_analisis`,
       `analisis_tingkat_kesukaran`.`id_soal` AS `id_soal`, 
       soal.isi_soal,
       SUM(`analisis_tingkat_kesukaran`.`benar`) AS jumlah_benar,
       SUM(`analisis_tingkat_kesukaran`.`salah`) AS jumlah_salah,
       (SELECT COUNT(id_analisis) FROM  analisis where id_ujian=analisis_tingkat_kesukaran.id_ujian AND id_soal=analisis_tingkat_kesukaran.id_soal GROUP BY id_ujian,id_soal) AS jumlah_peserta,
       SUM(`analisis_tingkat_kesukaran`.`benar`)/(SUM(`analisis_tingkat_kesukaran`.`benar`)+SUM(`analisis_tingkat_kesukaran`.`salah`)) AS p,
       `analisis_tingkat_kesukaran`.`id_ujian` AS `id_ujian`,
       `analisis_tingkat_kesukaran`.`nama_ujian` AS `nama_ujian` 
    FROM `analisis_tingkat_kesukaran` 
    LEFT JOIN soal ON soal.id_soal=analisis_tingkat_kesukaran.id_soal
    GROUP BY `analisis_tingkat_kesukaran`.`id_ujian`,`analisis_tingkat_kesukaran`.`id_soal`
    ) z 
") or die("gagal menampilkan data analisis pembeda soal!!!");
if( mysql_num_rows( $query_adps ) )
{
 $i=0;
 while($data_soal = mysql_fetch_object($query_adps))
 {
  $i++;
  ?>
  <tr class="">
    <td><center><?php echo $i; ?></center></td>
   <td><center><?php echo $data_soal -> isi_soal; ?></center></td>
   <td><center><?php echo $data_soal->jumlah_peserta; ?> Peserta</center></td>
   <td><center><?php echo $data_soal->jumlah_benar; ?> Peserta</center></td>
   <td><center><?php echo $data_soal->jumlah_salah; ?> Peserta</center></td>
   <td><center><?php 
    if( $data_soal->analisis_soal == 'sedang' ):
        echo '<font color="yellow"><b>Sedang</b></font>';
    elseif( $data_soal->analisis_soal == 'mudah' ):
        echo '<font color="green"><b>Mudah</b></font>';
    else:
        echo '<font color="red"><b>Sedang</b></font>';
    endif;
   ?></center></td>
  </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=11><center><b>Belum Teranalisis</b></center></td></tr><?php
}
?>
     </tbody>
    </table>
   </div>
  </div>
 </div>
</div>
</div>
</div>
<!--AWAL FOOTER--><?php foot() ?><!--AKHIR FOOTER-->
<?php jas() ?>
<!--UNTUK TABEL-->
<script>
jQuery(document).ready(function() {			
// initiate layout and plugins
App.setPage("table_editable");
App.init();
});
</script>
</body>
</html>
<?php
}
?>