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
<?php
 if(@$_POST['Tambah'] == "Tambah")
 {
  $id_ujian = @$_POST['id_ujian'];
  $nama_ujian = $_POST['nama_ujian'];
  $durasi = $_POST['durasi'];
  $aktif = $_POST['aktif'];
  $penyusun = $_POST['penyusun'];
  $id_mp = $_POST['id_mp'];
  $query = "INSERT INTO ujian VALUES ('','$nama_ujian','$durasi','$aktif','$penyusun','$id_mp')";
  $result = mysql_query($query);
  if ($query)
  {
   ?>
   <script language="JavaScript">
   alert('Try Out Berhasil Ditambahkan');
   document.location='to.php';
   </script>
   <?php
   }
  }
?>
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
  <div class="portlet box blue tabbable">
   <div class="portlet-title">
    <h4><i class="icon-reorder"></i><span class="hidden-480">TAMBAH TRY OUT</span>&nbsp;</h4>
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="to_tambah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">Nama Try Out</label>
<div class="controls"><input type="text" placeholder="Nama Materi Baru" name="nama_ujian" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Durasi Pengerjaan Per Soal</label>
<div class="controls"><input type="text" placeholder="Durasi Dalam Satuan Menit" name="durasi" class="m-wrap medium" /></div></div>
<input type="hidden" name="aktif" value="tidak" />
<input type="hidden" name="penyusun" value="<?php echo $sesi; ?>" />
<input type="hidden" name="id_mp" value="<?php echo $id_mp; ?>" /></div></div>
<div class="form-actions">
 <button type="submit" class="btn blue" name="Tambah" value="Tambah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="materi.php"><button type="button" class="btn green">Kembali</button></a>
</div>
</form>
</div>
</div>
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