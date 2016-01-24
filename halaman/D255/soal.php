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
  
  $sql_soal = "SELECT * FROM soal JOIN mp USING (id_mp) WHERE penyusun='$sesi'";
  $result_soal = mysql_query($sql_soal);
  $jmldata_soal = mysql_num_rows($result_soal);
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
    <h4><i class="icon-edit"></i> LISTING SOAL ''<?php echo $sesi; ?>''</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
     <div class="btn-group">
      <a href="soal_tambah.php"><button class="btn green">Tambah Soal&nbsp;&nbsp;&nbsp;<i class="icon-plus"></i></button></a>
     </div>
     <div class="btn-group">
      <a href="soal_lihat.php?id_mp=<?php echo $id_mp; ?>"><button class="btn black">Lihat Keseluruhan Soal <?php echo $nama_mp; ?></button></a>
     </div>
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NO</th>
       <th>SOAL</th>
	   <th>A</th>
	   <th>B</th>
	   <th>C</th>
	   <th>D</th>
	   <th>E</th>
	   <th>KUNCI</th>
	   <th>STATUS</th>
	   <th>UBAH</th>
	   <th>HAPUS</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
if($jmldata_soal > 0)
{
 while($data_soal = mysql_fetch_object($result_soal))
 {
  $i++;
  ?>
  <tr class="">
   <td><center><?php echo $i; ?></center></td>
   <td><center><?php echo $data_soal -> isi_soal; ?></center></td>
   <td><center><?php echo $data_soal -> opsi_a; ?></center></td>
   <td><center><?php echo $data_soal -> opsi_b; ?></center></td>
   <td><center><?php echo $data_soal -> opsi_c; ?></center></td>
   <td><center><?php echo $data_soal -> opsi_d; ?></center></td>
   <td><center><?php echo $data_soal -> opsi_e; ?></center></td>
   <td><center><?php echo $data_soal -> kunci; ?></center></td>
   <td><center><!--<a href="soal_ubah_status.php?id_soal=<?php echo $data_soal -> id_soal?>" title="Ubah Status Soal">-->
    <?php
	if($data_soal -> tampil == 'ya')
	{
	 echo "Aktif";
	}
	else
	{
	 echo "Tidak Aktif";
	}
	?>
   <!--</a>--></center></td>
   <td><center><a href="soal_ubah.php?id_soal=<?php echo $data_soal -> id_soal?>">Ubah</a></center></td>
   <td><center><a href="soal_hapus.php?id_soal=<?php echo $data_soal -> id_soal?>" onClick="javascript:return confirm('Menghapus Soal Nomor <?php echo $i; ?>?');">Hapus</a></center></td>
  </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=11><center><b>Belum Terdapat Soal</b></center></td></tr><?php
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