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
  include_once "desain_admin.php";
  $id_kelas = @$_GET['id_kelas'];
  
  if($_SESSION["stats"] != "admin")
  {
    ?>
	<script type="text/javascript">
    alert("Maaf Halaman Ini Hanya Untuk Administrator");
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
$sql_kelas = "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
$hasil_kelas = mysql_query($sql_kelas); 
if($hasil_kelas)
{
 while($data_kelas = mysql_fetch_array($hasil_kelas))
 {
  $id_kelas = $data_kelas['id_kelas'];
  $nama_kelas = $data_kelas['nama_kelas'];
  $id_tahun_ajaran = $data_kelas['id_tahun_ajaran'];
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
<h3 class="page-title">HALAMAN ADMINISTRATOR</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> PENGUBAHAN INFORMASI KELAS</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="kelas_ubah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">Nama Kelas</label>
<div class="controls">
<input type="text" name="nama_kelas" value="<?php echo @$nama_kelas?>" class="m-wrap large" />
<input type="hidden" name="id_kelas" value="<?php echo @$id_kelas?>" class="m-wrap large" />
</div></div>
<div class="control-group"><label class="control-label">Tahun Ajaran</label>
<div class="controls"><select name="id_tahun_ajaran">
<?php
$sql_thajar = "SELECT * FROM tahun_ajaran";
$result_thajar = mysql_query($sql_thajar);
while($data_thajar = mysql_fetch_object($result_thajar))
{
?>
<option value="<?php echo $data_thajar -> id_tahun_ajaran ?>"><?php echo $data_thajar -> nama_tahun_ajaran ?></option>
<?php } ?>
</select></div></div>
<div class="form-actions">
 <button type="submit" class="btn blue" name="Ubah" value="Ubah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="kelas.php"><button type="button" class="btn green">Kembali</button></a>
</div>
</form>
 <?php
 if(@$_POST["Ubah"]=="Ubah")
 {
  $id_kelas = @$_POST['id_kelas'];
  $nama_kelas = $_POST['nama_kelas'];
  $id_tahun_ajaran = $_POST['id_tahun_ajaran'];
  if(empty($nama_kelas))
  {
   ?>
   <script language="JavaScript">
   alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
   window.history.back();
   </script>
   <?php
  }
  else
  $sql = "UPDATE kelas SET 
          nama_kelas='$nama_kelas', 
		  id_tahun_ajaran='$id_tahun_ajaran' 
	      WHERE id_kelas='$id_kelas'";
  $result = mysql_query($sql);
  if($sql)
  {
   ?>
   <script language="JavaScript">
   alert('Informasi Kelas Dirubah');
   document.location='kelas.php'</script>
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