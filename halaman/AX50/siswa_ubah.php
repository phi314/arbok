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
  $nis = @$_GET['nis'];
  
  $sql_kelas = "SELECT * FROM kelas";
  $result_kelas = mysql_query($sql_kelas);
  
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
$sql_siswa = "SELECT * FROM siswa JOIN kelas USING (id_kelas) WHERE nis='$nis'";
$hasil_siswa = mysql_query($sql_siswa); 
if($hasil_siswa)
{
 while($data_siswa = mysql_fetch_array($hasil_siswa))
 {
  $nis = $data_siswa['nis'];
  $nama_siswa = $data_siswa['nama_siswa'];
  $jklamin_siswa = $data_siswa['jklamin_siswa'];
  $password = $data_siswa['password'];
  $email = $data_siswa['email'];
  $dispict = $data_siswa['dispict'];
  $status = $data_siswa['status'];
  $id_kelas = $data_siswa['id_kelas'];
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
    <h4><i class="icon-edit"></i> PENGUBAHAN INFORMASI SISWA</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="siswa_ubah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">Nama Siswa</label>
 <div class="controls"><input type="text" value="<?php echo @$nama_siswa; ?>" name="nama_siswa" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Jenis Kelamin</label>
 <div class="controls">
 <select name="jklamin_siswa">
  <option value="Perempuan">Perempuan</option>
  <option value="Laki-Laki">Laki-Laki</option>
 </select></div></div>
<div class="control-group"><label class="control-label">Kelas</label>
 <div class="controls">
 <select name="id_kelas">
  <?php
  while($data_kelas = mysql_fetch_object($result_kelas))
  {
  ?>
  <option value="<?php echo $data_kelas -> id_kelas; ?>"><?php echo $data_kelas -> nama_kelas; ?></option>
  <?php } ?>
 </select></div></div>
<input type="hidden" name="nis" value="<?php echo @$nis; ?>" class="m-wrap large" />
<input type="hidden" name="password" value="<?php echo @$password; ?>" class="m-wrap large" />
<input type="hidden" name="email" value="<?php echo @$email; ?>" class="m-wrap large" />
<input type="hidden" name="dispict" value="<?php echo @$dispict; ?>" class="m-wrap large" />
<input type="hidden" name="status" value="siswa" class="m-wrap large" />
<div class="form-actions">
 <button type="submit" class="btn blue" name="Ubah" value="Ubah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="siswa.php"><button type="button" class="btn green">Kembali</button></a>
</div>
</form>
 <?php
 if(@$_POST["Ubah"]=="Ubah")
 {
  $nis = @$_POST['nis'];
  $nama_siswa = $_POST['nama_siswa'];
  $jklamin_siswa = $_POST['jklamin_siswa'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $dispict = $_POST['dispict'];
  $status = $_POST['status'];
  $id_kelas = $_POST['id_kelas'];
  if(empty($nama_siswa))
  {
   ?>
   <script language="JavaScript">
   alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
   window.history.back();
   </script>
   <?php
  }
  else
  $sql = "UPDATE siswa SET 
          nama_siswa='$nama_siswa', 
		  jklamin_siswa='$jklamin_siswa', 
		  id_kelas='$id_kelas'
	      WHERE nis='$nis'";
  $result = mysql_query($sql);
  if($sql)
  {
   ?>
   <script language="JavaScript">
   alert('Informasi Siswa Berhasil Dirubah');
   document.location='siswa.php'</script>
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