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
  
  $sql_absensi = "SELECT * FROM absensi ORDER BY tanggal ASC";
  $result_absensi = mysql_query($sql_absensi);
  $jmldata_absensi = mysql_num_rows($result_absensi);
  $i = 0;
  
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
    <h4><i class="icon-edit"></i> LISTING ABSENSI</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
     <div class="btn-group">
      <a href="absensi_tambah.php"><button class="btn green">Tambah Absensi&nbsp;&nbsp;&nbsp;<i class="icon-plus"></i></button></a>
     </div>
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>TANGGAL</th>
	   <th>KETERANGAN</th>
	   <th>DETAIL</th>
	   <th>UBAH</th>
	   <th>HAPUS</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
if($jmldata_absensi > 0)
{
 while($data_absensi = mysql_fetch_object($result_absensi))
 {
  $i++;
  ?>
  <tr class="">
   <td><center><?php echo $data_absensi -> tanggal; ?></center></td>
   <td><center><?php echo empty($data_absensi -> keterangan) ? "-tidak ada keterangan-" : $data_absensi->keterangan; ?></center></td>
   <td><center><a href="absensi_detail.php?id=<?php echo $data_absensi -> id?>">Detail</a></center></td>
   <td><center><a href="absensi_ubah.php?id=<?php echo $data_absensi -> id?>">Ubah</a></center></td>
   <td><center><a href="absensi_hapus.php?id=<?php echo $data_absensi -> id?>" onClick="javascript:return confirm('Menghapus <?php echo $data_absensi -> nama_absensi ?>?');">Hapus</a></center></td>
  </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=6><center><b>Belum Terdapat Absensi</b></center></td></tr><?php
}
?>
     </tbody>
    </table>
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