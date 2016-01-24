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
  
  $sql_siswa = "SELECT * FROM siswa JOIN kelas USING (id_kelas) WHERE nis='$nis'";
  $result_siswa = mysql_query($sql_siswa);
  $data_siswa = mysql_fetch_object($result_siswa);
  
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
       <center><img src="../../foto_profil/<?php echo $data_siswa -> dispict; ?>"></center>
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
<table>
<tr><td><b>NOMOR INDUK SISWA</b><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td> <td><?php echo $data_siswa -> nis; ?></td></tr>
<tr><td><b>NAMA PENGGUNA</b> <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td> <td><?php echo $data_siswa -> nama_siswa; ?></td></tr>
<tr><td><b>KELAS</b> <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td> <td><?php echo $nama_kelas; ?></td></tr>
<tr><td><b>STATUS</b> <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td> <td>Siswa</td></tr>
<tr><td><b>JENIS KELAMIN</b> <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td> <td><?php echo $data_siswa -> jklamin_siswa; ?></td></tr>
<tr><td><b>EMAIL</b> <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td> <td><?php echo $data_siswa -> email; ?></td></tr>
</table>
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