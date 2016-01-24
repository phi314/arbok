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
$sql_mp = "SELECT * FROM mp JOIN nilai USING (id_mp) JOIN kelas USING (id_kelas) JOIN siswa USING (nis) WHERE siswa.id_kelas=kelas.id_kelas GROUP BY nilai.id_mp ORDER BY nilai.id_nilai DESC";
$result_mp = mysql_query($sql_mp);
$jmldata_mp = mysql_num_rows($result_mp);
$i = 0;
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
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> PILIH NILAI DARI MATA PELAJARAN</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NO</th>
	   <th>MATA PELAJARAN</th>
	   <th>PILIH</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
if($jmldata_mp > 0)
{
 while($data_mp = mysql_fetch_object($result_mp))
 {
  $i++;
  ?>
  <tr class="">
   <td><center><?php echo $i; ?></center></td>
   <td><center><?php echo $data_mp -> nama_mp; ?></center></td>
   <td><center><a href="nilai_siswa.php?nis=<?php echo $nis ?>&id_mp=<?php echo $data_mp -> id_mp; ?>&id_kelas=<?php echo $data_mp -> id_kelas; ?>">Pilih Mata Pelajaran</center></td>
   <!--td><center><a href="nilai_lihat.php?nis=<?php //echo $nis ?>&id_mp=<?php //echo $data_mp -> id_mp; ?>&id_kelas=<?php //echo $data_mp -> id_kelas; ?>">Pilih Mata Pelajaran</center></td-->
  </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=4><center><b>TIDAK TERDAPAT mp</b></center></td></tr><?php
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