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
  $id_ujian = @$_GET['id_ujian'];
  
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
$sql_ujian = "SELECT * FROM ujian WHERE id_ujian='$id_ujian'";
$hasil_ujian = mysql_query($sql_ujian); 
if($hasil_ujian)
{
 while($data_ujian = mysql_fetch_array($hasil_ujian))
 {
  $id_ujian = $data_ujian['id_ujian'];
  $nama_ujian = $data_ujian['nama_ujian'];
  $durasi = $data_ujian['durasi'];
  $aktif = $data_ujian['aktif'];
  $penyusun = $data_ujian['penyusun'];
  $id_mp = $data_ujian['id_mp'];
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
    <h4><i class="icon-reorder"></i><span class="hidden-480">PENGUBAHAN TRY OUT</span>&nbsp;</h4>
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="to_ubah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">Nama Try Out</label>
<div class="controls"><input type="text" value="<?php echo @$nama_ujian; ?>" name="nama_ujian" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Durasi Pengerjaan Per Soal</label>
<div class="controls"><input type="text" value="<?php echo @$durasi; ?>" name="durasi" class="m-wrap medium" /></div></div>
<input type="hidden" name="id_ujian" value="<?php echo @$id_ujian; ?>" />
<input type="hidden" name="aktif" value="<?php echo @$aktif; ?>" />
<input type="hidden" name="penyusun" value="<?php echo $sesi; ?>" />
<input type="hidden" name="id_mp" value="<?php echo $id_mp; ?>" /></div></div>
<div class="form-actions">
 <button type="submit" class="btn blue" name="Ubah" value="Ubah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="materi.php"><button type="button" class="btn green">Kembali</button></a>
</div>
</form>
 <?php
 if(@$_POST["Ubah"]=="Ubah")
 {
  $id_ujian = @$_POST['id_ujian'];
  $nama_ujian = $_POST['nama_ujian'];
  $durasi = $_POST['durasi'];
  $aktif = $_POST['aktif'];
  $penyusun = $_POST['penyusun'];
  $id_mp = $_POST['id_mp'];
  if(empty($nama_ujian) || empty($durasi))
  {
   ?>
   <script language="JavaScript">
   alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
   window.history.back();
   </script>
   <?php
  }
  else
  $sql = "UPDATE ujian SET 
          nama_ujian='$nama_ujian',
		  durasi='$durasi',
		  aktif='$aktif',
		  penyusun='$penyusun',
		  id_mp='$id_mp'
	      WHERE id_ujian='$id_ujian'";
  $result = mysql_query($sql);
  if($sql)
  {
   ?>
   <script language="JavaScript">
   alert('Status Try Out Berhasil Dirubah');
   document.location='to.php'</script>
   <?php
  }
 }
 ?>
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