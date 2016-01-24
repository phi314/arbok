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
    <h4><i class="icon-edit"></i> PENAMBAHAN PENGAJAR</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="guru_tambah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">NIP</label>
 <div class="controls"><input type="text" placeholder="Nomor Induk Pegawai Baru" name="nip" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Nama Pengajar</label>
 <div class="controls"><input type="text" placeholder="Nama Pengajar Baru" name="nama_guru" class="m-wrap large" /></div></div>
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
<input type="hidden" name="password" class="m-wrap large" />
<input type="hidden" name="email" class="m-wrap large" />
<input type="hidden" name="dispict" value="unknown.png" class="m-wrap large" />
<input type="hidden" name="status" value="guru" class="m-wrap large" />
<div class="form-actions">
 <button type="submit" class="btn blue" name="Tambah" value="Tambah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="guru.php"><button type="button" class="btn green">Kembali</button></a>
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