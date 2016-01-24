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
  
  $sql_to = "SELECT * FROM ujian JOIN mp USING (id_mp) WHERE penyusun='$sesi' AND id_ujian > 6";
  $result_to = mysql_query($sql_to);
  $jmldata_to = mysql_num_rows($result_to);
  $i = 0;
  
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
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> LISTING TRY OUT</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
     <div class="btn-group">
      <a href="to_tambah.php"><button class="btn green">Tambah Try Out&nbsp;&nbsp;&nbsp;<i class="icon-plus"></i></button></a>
     </div>
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NO</th>
       <th>NAMA TRY OUT</th>
	   <th>DURASI PER SOAL</th>
	   <th>STATUS</th>
	   <th>UBAH</th>
	   <th>HAPUS</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
if($jmldata_to > 0)
{
 while($data_to = mysql_fetch_object($result_to))
 {
  $i++;
  ?>
  <tr class="">
   <td><center><?php echo $i; ?></center></td>
   <td><center><?php echo $data_to -> nama_ujian; ?></center></td>
   <td><center><?php echo $data_to -> durasi; ?></center></td>
   <td><center><a href="to_ubah_status.php?id_ujian=<?php echo $data_to -> id_ujian?>" title="Ubah Status Try Out">
    <?php
	if($data_to -> aktif == 'ya')
	{
	 echo "Aktif";
	}
	else
	{
	 echo "Tidak Aktif";
	}
	?>
   </a></center></td>
   <td><center><a href="to_ubah.php?id_ujian=<?php echo $data_to -> id_ujian?>">Ubah</a></center></td>
   <td><center><a href="to_hapus.php?id_ujian=<?php echo $data_to -> id_ujian?>" onClick="javascript:return confirm('Menghapus Try Out <?php echo $data_to -> nama_ujian; ?>?');">Hapus</a></center></td>
  </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=6><center><b>Belum Terdapat Try Out</b></center></td></tr><?php
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