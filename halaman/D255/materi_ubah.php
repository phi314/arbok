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
  $id_modul = @$_GET['id_modul'];
  
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
$sql_modul = "SELECT * FROM modul WHERE id_modul='$id_modul'";
$hasil_modul = mysql_query($sql_modul);
if($hasil_modul)
{
 while($data_modul = mysql_fetch_array($hasil_modul))
 {
  $id_modul = $data_modul['id_modul'];
  $nama_modul = $data_modul['nama_modul'];
  $file_modul = $data_modul['file_modul'];
  $penyusun = $data_modul['penyusun'];
  $id_mp = $data_modul['id_mp'];
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
    <h4><i class="icon-reorder"></i><span class="hidden-480">PENGUBAHAN INFORMASI MATERI</span>&nbsp;</h4>
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="materi_ubah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">Nama Materi</label>
<div class="controls"><input type="text" value="<?php echo @$nama_modul; ?>" name="nama_modul" class="m-wrap large" /></div></div>
<input type="hidden" name="id_modul" value="<?php echo @$id_modul; ?>" />
<input type="hidden" name="file_materi" value="<?php echo @$file_materi; ?>" />
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
  $id_modul = @$_POST['id_modul'];
  $nama_modul = $_POST['nama_modul'];
  $file_modul = @$_POST['file_modul'];
  $penyusun = $_POST['penyusun'];
  $id_mp = $_POST['id_mp'];
  if(empty($nama_modul))
  {
   ?>
   <script language="JavaScript">
   alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
   window.history.back();
   </script>
   <?php
  }
  else
  $sql = "UPDATE modul SET 
          nama_modul='$nama_modul'
	      WHERE id_modul='$id_modul'";
  $result = mysql_query($sql);
  if($sql)
  {
   ?>
   <script language="JavaScript">
   alert('Materi Berhasil Dirubah');
   document.location='materi.php?nip=<?php echo $nip; ?>'</script>
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