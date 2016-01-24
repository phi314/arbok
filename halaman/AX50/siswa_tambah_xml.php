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
 if(@$_POST['Tambah'] == "Tambah")
 {
  $nip = @$_POST['nip'];
  $nama_guru = $_POST['nama_guru'];
  $jklamin_guru = @$_POST['jklamin_guru'];
  $password = md5($_POST['nip']);
  $email = @$_POST['nama_guru']."@domain.com";
  $dispict = $_POST['dispict'];
  $status = @$_POST['status'];
  $id_mp = $_POST['id_mp'];
    
  $query = "INSERT INTO guru VALUES ('$nip','$nama_guru','$jklamin_guru','$password','$email','$dispict','$status','$id_mp')";
  $result = mysql_query($query);
  if ($query)
  {
   ?>
   <script language="JavaScript">
   alert('Pengajar Berhasil Ditambahkan');
   document.location='guru.php';
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
<h3 class="page-title">HALAMAN ADMINISTRATOR</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> PENAMBAHAN SISWA DARI MS.EXCEL</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="siswa_tambah_xml_proses.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">File Excel</label>
 <div class="controls"><input name="userfile" type="file"></div></div>
<div class="form-actions">
 <button type="submit" class="btn blue" name="upload" value="Import"><i class="icon-ok"></i> Import</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="siswa.php"><button type="button" class="btn green">Kembali</button></a>
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