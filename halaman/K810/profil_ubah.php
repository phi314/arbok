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
  
  $sql_mp = "SELECT * FROM mp";
  $result_mp = mysql_query($sql_mp);
  
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
<?php
 $nis = @$_GET['nis'];
 $sql = "SELECT * FROM siswa JOIN kelas WHERE siswa.nis=$nis";
 $hasil = mysql_query($sql);
 
 if($hasil)
 {
  while($data = mysql_fetch_array($hasil))
  {
   $nis = $data['nis'];
   $nama_siswa = $data['nama_siswa'];
   $jklamin_siswa = $data['jklamin_siswa'];
   $password = $data['password'];
   $email = $data['email'];
   $dispict = $data['dispict'];
   $status = $data['status'];
   $id_kelas = $data['id_kelas'];
  }
 }
?>
<?php
$sql_dp = "SELECT * FROM siswa WHERE nis='$nis'";
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
<h3 class="page-title">HALAMAN SISWA</h3>
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
    <h4><i class="icon-reorder"></i> PENGUBAHAN INFORMASI PENGGUNA</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="tabbable portlet-tabs">
     <div class="tab-content">
      <div class="tab-pane active">
<form method="post" action="profil_ubah.php" enctype="multipart/form-data">
<table>
<tr><td><b>NIS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
								 <input type="text" name="nis" value="<?php echo @$nis; ?>" disabled></td></tr>
<tr><td><b>NAMA PENGGUNA</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
								 <input type="text" name="nama_siswa" value="<?php echo @$nama_siswa; ?>">
							     <input type="hidden" name="nis" value="<?php echo @$nis; ?>">
							     <input type="hidden" name="id_kelas" value="<?php echo @$id_kelas; ?>">
							     <input type="hidden" name="status" value="<?php echo @$status; ?>">
							     <input type="hidden" name="dispict" value="<?php echo @$dispict; ?>">
							     <input type="hidden" name="password" value="<?php echo @$password; ?>"></td></tr>
<tr><td><b>KELAS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
								 <input type="text" name="nama_kelas" value="<?php echo @$nama_kelas; ?>" disabled></td></tr>
<tr><td><b>JENIS KELAMIN</b> <td><select name="jklamin_siswa">
                                  <option value="Laki-Laki">Laki-Laki</option>
                                  <option value="Perempuan">Perempuan</option>
								 </select></td></tr>
<tr><td><b>EMAIL</b> <td><input type="text" name="email" value="<?php echo @$email; ?>"></td></tr>
<tr><td colspan=2><center><input type="submit" name="Ubah" value="Ubah"></center></td></tr>
</table>
</form>
<?php
 if(@$_POST["Ubah"]=="Ubah")
 {
  $nis = $_POST['nis'];
  $nama_siswa =  $_POST['nama_siswa'];
  $jklamin_siswa = $_POST['jklamin_siswa'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  $dispict = $_POST['dispict'];
  $status = strtoupper($_POST['status']);
  $id_kelas = $_POST['id_kelas'];
  if(empty($nama_siswa) || empty($jklamin_siswa))
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
		  email='$email'
	      WHERE nis='$nis'";
  $result = mysql_query($sql);
  if($sql)
  {
   ?>
   <script language="JavaScript">
   alert('Profil Berhasil Dirubah');
   document.location='profil.php?nis=<?php echo $nis; ?>'</script>
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