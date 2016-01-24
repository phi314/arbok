<?php
  session_start();
  if(!isset($_SESSION['stat']))
  {
    ?>
	  <script type="text/javascript">
      alert("Maaf Harus Login Terlebih Dahulu");
      document.location='../index.php';</script>
    <?php
  }
  include_once "../lib_function.php";
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
    document.location='../index.php';</script>
    <?php
  }
  else
  {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$sql_info = "SELECT * FROM ortu JOIN siswa USING (nis) JOIN kelas USING (id_kelas) JOIN tahun_ajaran USING (id_tahun_ajaran) WHERE ortu.id_ortu='$id_ortu'";
$result_info = mysql_query($sql_info);
$data_info = mysql_fetch_object($result_info);
?>
<meta charset="utf-8" />
<title>LMS SMA NEGERI 7 BANDUNG</title>
<?php cess() ?>
<link rel="shortcut icon" href="../gambar/icon.ico" />
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
    <h4><i class="icon-reorder"></i>HALAMAN UTAMA ORANG TUA SISWA</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
	<div class="tools">
	 <a href="javascript:;" class="collapse" title="Sembunyikan Konten"></a>
	 <a href="javascript:;" class="remove" title="Tutup Konten"></a>
	</div>
	AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="tabbable portlet-tabs">
     <div class="tab-content">
      <div class="tab-pane active">
<p>Selamat datang pada <i>Learning Management System</i> (LMS) SMA Negeri 7 Bandung.</br>
Anda login sebagai <?php echo $_SESSION['nama_ortu']; ?>.</br></br>
Status sebagai Orang Tua Siswa dari :</br>
NIS : <?php echo $nis; ?></br>
Nama Siswa : <?php echo $data_info -> nama_siswa ?></br>
Kelas : <?php echo $data_info -> nama_kelas ?></br>
Tahun Ajaran : <?php echo $data_info -> nama_tahun_ajaran ?></br></br>
Silahkan menelusuri beberapa halaman yang telah disediakan sesuai dengan status anda sebagai Orang Tua Siswa.</br>
Beberapa data yang dapat anda olah dapat dilihat pada menu sebelah kiri.</br></br>
Harap digunakan sebaik mungkin.</br></br>
Terimakasih</br></p>
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
</body>
</html>
<?php
}
?>