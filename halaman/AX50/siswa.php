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
  
  $sql_siswa = "SELECT * FROM siswa JOIN kelas USING (id_kelas) ORDER BY siswa.nis ASC";
  $result_siswa = mysql_query($sql_siswa);
  $jmldata_siswa = mysql_num_rows($result_siswa);
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
    <h4><i class="icon-edit"></i> LISTING SISWA</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
     <div class="btn-group">
      <a href="siswa_tambah.php"><button class="btn green">Tambah Siswa&nbsp;&nbsp;&nbsp;<i class="icon-plus"></i></button></a>
     </div>
     <div class="btn-group">
      <a href="siswa_tambah_xml.php"><button class="btn green">Tambah Siswa Dari Ms.Excel&nbsp;&nbsp;&nbsp;<i class="icon-plus"></i></button></a>
     </div>
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NIS</th>
	   <th>NAMA SISWA</th>
	   <th>JENIS KELAMIN</th>
	   <th>KELAS</th>
	   <th>UBAH</th>
	   <th>HAPUS</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
if($jmldata_siswa > 0)
{
 while($data_siswa = mysql_fetch_object($result_siswa))
 {
  $i++;
  ?>
  <tr class="">
   <td><center><?php echo $data_siswa -> nis; ?></center></td>
   <td><center><?php echo $data_siswa -> nama_siswa; ?></center></td>
   <td><center><?php echo $data_siswa -> jklamin_siswa; ?></center></td>
   <td><center><?php echo $data_siswa -> nama_kelas; ?></center></td>
   <td><center><a href="siswa_ubah.php?nis=<?php echo $data_siswa -> nis?>">Ubah</a></center></td>
   <td><center><a href="siswa_hapus.php?nis=<?php echo $data_siswa -> nis?>" onClick="javascript:return confirm('Menghapus <?php echo $data_siswa -> nama_siswa ?>?');">Hapus</a></center></td>
  </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=6><center><b>Belum Terdapat Siswa</b></center></td></tr><?php
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