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
  include_once "desain_siswa.php";
  $nis = $_SESSION['nis'];
  $sesi = $_SESSION['nama_siswa'];
  $id_kelas = $_SESSION['id_kelas'];
  $nama_kelas = $_SESSION['nama_kelas'];
  $id_tahun_ajaran = $_SESSION['id_tahun_ajaran'];
  $nama_tahun_ajaran = $_SESSION['nama_tahun_ajaran'];
  
  $sql_gal = "SELECT * FROM foto WHERE pemilik='$nis'";
  $result_gal = mysql_query($sql_gal);
  $jmldata_gal = mysql_num_rows($result_gal);
  
  if($_SESSION["stats"] != "siswa")
  {
    ?>
	<script type="text/javascript">
    alert("Maaf Halaman Ini Hanya Untuk Siswa");
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
<h3 class="page-title">HALAMAN SISWA</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-reorder"></i>Gallery <?php echo $sesi?></h4>
   </div>
   <div class="portlet-body">
    <div class="row-fluid">
     <div class="span12">
	  <div class="pull-right"><div class="clearfix space5"></div><a href="gallery_tambah.php" class="btn pull-right green"><i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Unggah Foto Baru</a></div>
     </div>
    </div>
    <hr class="clearfix" />
    <div class="row-fluid">
	<?php
	if($jmldata_gal > 0)
    {
    while($data_gal = mysql_fetch_object($result_gal))
    {
	?>
     <div class="span3">
      <div class="item">
       <a class="fancybox-button" data-rel="fancybox-button" href="../../foto_profil/<?php echo $data_gal -> file_foto?>">
        <div class="zoom"><img src="../../foto_profil/<?php echo $data_gal -> file_foto?>" alt="Photo" /><div class="zoom-icon"></div></div>
       </a>
       <div class="details">
	    <a href="gallery_ubah.php?id_foto=<?php echo $data_gal -> id_foto?>&file_foto=<?php echo $data_gal -> file_foto; ?>" title="Jadikan Foto Profil" class="icon"><i class="icon-paper-clip"></i></a>
		<a href="gallery_hapus.php?id_foto=<?php echo $data_gal -> id_foto?>" title="Hapus Foto" class="icon"><i class="icon-remove"></i></a>
	   </div>
	  </div>
	 </div>
    <?php 
    }
    }
    else
    { 
     ?><b><center>Belum Terdapat Foto Pada Gallery</center></b><?php 
    } 
    ?>
	</div>
   </div>
  </div>
 </div>
</div>
</div>
</div>
<!--AWAL FOOTER--><?php foot() ?><!--AKHIR FOOTER-->
<?php jas() ?>
<script>
<!--UNTUK SLIDE NON TABEL-->
jQuery(document).ready(function() {			
// initiate layout and plugins
App.init();
});
</script>
</body>
</html>
<?php
}
?>