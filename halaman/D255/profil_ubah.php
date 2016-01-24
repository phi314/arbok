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
  
  $sql_mp = "SELECT * FROM mp";
  $result_mp = mysql_query($sql_mp);
  
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
 $nip = @$_GET['nip'];
 $sql = "SELECT * FROM guru JOIN mp WHERE guru.nip=$nip";
 $hasil = mysql_query($sql);
 
 if($hasil)
 {
  while($data = mysql_fetch_array($hasil))
  {
   $nip = $data['nip'];
   $nama_guru = $data['nama_guru'];
   $jklamin_guru = $data['jklamin_guru'];
   $password = $data['password'];
   $email = $data['email'];
   $dispict = $data['dispict'];
   $status = $data['status'];
   $id_mp = $data['id_mp'];
  }
 }
?>
<?php
$sql_dp = "SELECT * FROM guru WHERE nip='$nip'";
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
<h3 class="page-title">HALAMAN GURU</h3>
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
<form method="post" action="profil_ubah.php" enctype="multipart/form-data">
<table>
<tr><td><b>NAMA PENGGUNA</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
								 <input type="text" name="nama_guru" value="<?php echo @$nama_guru; ?>">
							     <input type="hidden" name="nip" value="<?php echo @$nip; ?>">
							     <input type="hidden" name="status" value="<?php echo @$status; ?>">
							     <input type="hidden" name="dispict" value="<?php echo @$dispict; ?>">
							     <input type="hidden" name="password" value="<?php echo @$password; ?>"></td></tr>
<tr><td><b>BIDANG AJAR</b> <td><select name="id_mp">
                                <?php
								while($data_mp = mysql_fetch_object($result_mp))
								{
								 ?><option value="<?php echo $data_mp -> id_mp; ?>"><?php echo $data_mp -> nama_mp; ?></option>
								<?php } ?>
							   </select></td></tr>
<tr><td><b>JENIS KELAMIN</b> <td><select name="jklamin_guru">
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
  $nip = $_POST['nip'];
  $nama_guru =  $_POST['nama_guru'];
  $jklamin_guru = $_POST['jklamin_guru'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  $dispict = $_POST['dispict'];
  $status = strtoupper($_POST['status']);
  $id_mp = $_POST['id_mp'];
  if(empty($nama_guru) || empty($jklamin_guru) || empty($password) || empty($email) || empty($id_mp))
  {
   ?>
   <script language="JavaScript">
   alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
   window.history.back();
   </script>
   <?php
  }
  else
  $sql = "UPDATE guru SET 
          nama_guru='$nama_guru',
		  jklamin_guru='$jklamin_guru',
		  email='$email',
		  id_mp='$id_mp' 
	      WHERE nip='$nip'";
  $result = mysql_query($sql);
  if($sql)
  {
   ?>
   <script language="JavaScript">
   alert('Profil Berhasil Dirubah');
   document.location='profil.php?nip=<?php echo $nip; ?>'</script>
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