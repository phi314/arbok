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
  
  $sql_kelas = "SELECT * FROM kelas JOIN tahun_ajaran USING (id_tahun_ajaran) ORDER BY kelas.id_kelas ASC";
  $result_kelas = mysql_query($sql_kelas);
  $jmldata_kelas = mysql_num_rows($result_kelas);
  $i = 0;
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
    <h4><i class="icon-edit"></i> TAMBAH NILAI -> DAFTAR KELAS</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NAMA KELAS</th>
	   <th>TAHUN AJARAN</th>
	   <th>PILIHAN</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
if($jmldata_kelas > 0)
{
 while($data_kelas = mysql_fetch_object($result_kelas))
 {
  $i++;
  ?>
  <tr class="">
   <td><center><?php echo $data_kelas -> nama_kelas; ?></center></td>
   <td><center><?php echo $data_kelas -> nama_tahun_ajaran; ?></center></td>
   <td><center><a href="nilai_tambah_kelas.php?id_kelas=<?php echo $data_kelas -> id_kelas; ?>">Pilih Kelass</a></center></td>
   </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=4><center><b>TIDAK TERDAPAT KELAS</b></center></td></tr><?php
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