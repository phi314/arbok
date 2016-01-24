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
  include_once "desain_ortu.php";
  $id_ortu = $_SESSION['id_ortu'];
  $sesi = $_SESSION['nama_ortu'];
  $nis = $_SESSION['nis'];
  
  if($_SESSION["stats"] != "ortu")
  {
    ?>
	<script type="text/javascript">
    alert("Maaf Halaman Ini Hanya Untuk Orang Tua Siswa");
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
 $id_ortu = @$_GET['id_ortu'];
 $sql = "SELECT * FROM ortu WHERE id_ortu=$id_ortu";
 $hasil = mysql_query($sql);
 
 if($hasil)
 {
  while($data = mysql_fetch_array($hasil))
  {
   $id_ortu = $data['id_ortu'];
   $nama_ortu = $data['nama_ortu'];
   $password = $data['password'];
   $dispict = $data['dispict'];
   $status = $data['status'];
   $nis = $data['nis'];
  }
 }
?>
<?php
$sql_dp = "SELECT * FROM ortu WHERE id_ortu='$id_ortu'";
$result_dp = mysql_query($sql_dp);
$data_dp = mysql_fetch_object($result_dp);
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
<h3 class="page-title">HALAMAN ORANG TUA SISWA</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span4"><!--PANJANG TABEL-->
  <div class="portlet box blue tabbable"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-reorder"></i> FOTO PROFIL</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="tabbable portlet-tabs">
     <div class="tab-content">
      <div class="tab-pane active">
       <center><img src="../../foto_profil/<?php echo @$data_dp -> dispict; ?>"></center>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

  <div class="span6"><!--PANJANG TABEL-->
  <div class="portlet box blue tabbable"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-reorder"></i> INFORMASI PENGGUNA</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="tabbable portlet-tabs">
     <div class="tab-content">
      <div class="tab-pane active">
<form method="post" action="profil_ubah_password.php" enctype="multipart/form-data">
<table><br>
<tr><td><b>PASSWORD BARU</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
								 <input type="password" name="password">
							     <input type="hidden" name="id_ortu" value="<?php echo @$id_ortu; ?>">
							     <input type="hidden" name="nama_ortu" value="<?php echo @$nama_ortu; ?>">
							     <input type="hidden" name="dispict" value="<?php echo @$dispict; ?>">
							     <input type="hidden" name="status" value="<?php echo @$status; ?>">
							     <input type="hidden" name="nis" value="<?php echo @$nis; ?>"></td></tr>
<tr><td colspan=2><center><input type="submit" name="Ubah" value="Ubah"></center></td></tr>
</table>
</form>
<?php
 if(@$_POST["Ubah"]=="Ubah")
 {
  $id_ortu = $_POST['id_ortu'];
  $nama_ortu =  $_POST['nama_ortu'];
  $password = md5($_POST['password']);
  $dispict = $_POST['dispict'];
  $status = $_POST['status'];
  $nis = $_POST['nis'];
  if(empty($password))
  {
   ?>
   <script language="JavaScript">
   alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
   window.history.back();
   </script>
   <?php
  }
  else
  $sql = "UPDATE ortu SET 
          password='$password' 
	      WHERE id_ortu='$id_ortu'";
  $result = mysql_query($sql);
  if($sql)
  {
   ?>
   <script language="JavaScript">
   alert('Password Berhasil Dirubah');
   document.location='../../logout.php'</script>
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