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

  if(isset($_GET['id']))
  {
      $id_absensi = $_GET['id'];
  }
  else
  {
      ?>
      <script type="text/javascript">
      document.location='absensi.php';</script>
    <?php
  }

  $sql_absensi = "SELECT * FROM absensi WHERE id='$id_absensi' LIMIT 1";
  $result_absensi = mysql_query($sql_absensi);
  $data_absensi = mysql_fetch_object($result_absensi);
  
  $sql_detail_absensi = "SELECT absensi_detail.*, siswa.nama_siswa, kelas.nama_kelas FROM absensi_detail JOIN siswa ON absensi_detail.nis_siswa=siswa.nis JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE absensi_detail.id_absensi='$id_absensi' ORDER BY siswa.nis ASC ";
  $result_detail_absensi = mysql_query($sql_detail_absensi);
  $jmldata_detail_absensi = mysql_num_rows($result_detail_absensi);

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
    <h4><i class="icon-edit"></i> LISTING DETAIL ABSENSI TANGGAL: <?php echo $data_absensi->tanggal; ?></h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
     <div class="btn-group">
      <a href="absensi_detail_generate.php?id_absensi=<?php echo $id_absensi; ?>"><button class="btn yellow">Generate Detail Absensi&nbsp;&nbsp;&nbsp;<i class="icon-refresh"></i></button></a>
     </div>
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NIS</th>
	   <th>NAMA</th>
	   <th>KELAS</th>
	   <th>ABSEN</th>
	   <th>UBAH</th>
	   <th>HAPUS</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
if($jmldata_detail_absensi > 0)
{
 while($data_detail_absensi = mysql_fetch_object($result_detail_absensi))
 {
  $i++;
  ?>
  <tr class="">
   <td><center><?php echo $data_detail_absensi -> nis_siswa; ?></center></td>
   <td><center><?php echo $data_detail_absensi -> nama_siswa; ?></center></td>
   <td><center><?php echo $data_detail_absensi -> nama_kelas; ?></center></td>
   <td><center><?php echo $data_detail_absensi -> absen; ?></center></td>
   <td><center><a href="absensi_detail_ubah.php?id=<?php echo $data_detail_absensi -> id?>">Ubah</a></center></td>
   <td><center><a href="absensi_detail_hapus.php?id=<?php echo $data_detail_absensi -> id?>&id_absensi=<?php echo $id_absensi; ?>" onClick="javascript:return confirm('Menghapus <?php echo $data_detail_absensi -> nama_detail_absensi ?>?');">Hapus</a></center></td>
  </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=6><center><b>Belum Terdapat Detail Absensi</b></center></td></tr><?php
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
    $('#sample_editable_1').dataTable({
        "iDisplayLength": 100
    });

App.setPage("table_editable");
App.init();
});
</script>
</body>
</html>
<?php
}
?>