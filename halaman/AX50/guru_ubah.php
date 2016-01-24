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
  $nip = @$_GET['nip'];
  
  $sql_mp = "SELECT * FROM mp";
  $result_mp = mysql_query($sql_mp);
  
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
$sql_guru = "SELECT * FROM guru JOIN mp USING (id_mp) WHERE nip='$nip'";
$hasil_guru = mysql_query($sql_guru); 
if($hasil_guru)
{
 while($data_guru = mysql_fetch_array($hasil_guru))
 {
  $nip = $data_guru['nip'];
  $nama_guru = $data_guru['nama_guru'];
  $jklamin_guru = $data_guru['jklamin_guru'];
  $password = $data_guru['password'];
  $email = $data_guru['email'];
  $dispict = $data_guru['dispict'];
  $status = $data_guru['status'];
  $id_mp = $data_guru['id_mp'];
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
    <h4><i class="icon-edit"></i> PENGUBAHAN INFORMASI PENGAJAR</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="guru_ubah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">Nama Pengajar</label>
 <div class="controls"><input type="text" value="<?php echo @$nama_guru; ?>" name="nama_guru" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Jenis Kelamin</label>
 <div class="controls">
 <select name="jklamin_guru">
  <option value="Perempuan">Perempuan</option>
  <option value="Laki-Laki">Laki-Laki</option>
 </select></div></div>
<div class="control-group"><label class="control-label">Bidang Ajaran</label>
 <div class="controls">
 <select name="id_mp">
  <?php
  while($data_mp = mysql_fetch_object($result_mp))
  {
  ?>
  <option value="<?php echo $data_mp -> id_mp; ?>"><?php echo $data_mp -> nama_mp; ?></option>
  <?php } ?>
 </select></div></div>
<input type="hidden" name="nip" value="<?php echo @$nip; ?>" class="m-wrap large" />
<input type="hidden" name="password" value="<?php echo @$password; ?>" class="m-wrap large" />
<input type="hidden" name="email" value="<?php echo @$email; ?>" class="m-wrap large" />
<input type="hidden" name="dispict" value="<?php echo @$dispict; ?>" class="m-wrap large" />
<input type="hidden" name="status" value="guru" class="m-wrap large" />
<div class="form-actions">
 <button type="submit" class="btn blue" name="Ubah" value="Ubah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="guru.php"><button type="button" class="btn green">Kembali</button></a>
</div>
</form>
 <?php
 if(@$_POST["Ubah"]=="Ubah")
 {
  $nip = @$_POST['nip'];
  $nama_guru = $_POST['nama_guru'];
  $jklamin_guru = $_POST['jklamin_guru'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $dispict = $_POST['dispict'];
  $status = $_POST['status'];
  $id_mp = $_POST['id_mp'];
  if(empty($nama_guru))
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
		  id_mp='$id_mp'
	      WHERE nip='$nip'";
  $result = mysql_query($sql);
  if($sql)
  {
   ?>
   <script language="JavaScript">
   alert('Informasi Pengajar Berhasil Dirubah');
   document.location='guru.php'</script>
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