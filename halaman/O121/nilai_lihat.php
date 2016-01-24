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
  $nis = @$_GET['nis'];
  @$id_kelas = $_GET['id_kelas'];
  @$id_mp = $_GET['id_mp'];
  
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
    <h4><i class="icon-edit"></i> LAPORAN NILAI</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
<div class="portlet-body">
<div class="tabbable portlet-tabs">
<div class="tab-content">
<div class="tab-pane active">
<p>
<table align="center" border=1 width=700>
<tr><td colspan=2 align="center"><b><center><big>LAPORAN NILAI SISWA</big></center></b></td></tr>
<tr><td align="center" width=120><img src="../../gambar/SMAN7bdg.jpg" width=100></td>
    <td align="center"><b>LAPORAN HASIL KEGIATAN UJIAN SEKOLAH DAN TRYOUT<br>
						  SEKOLAH MENENGAH ATAS NEGERI 7 BANDUNG</b><br><br>
						  Jalan Lengkong Kecil No. 53, Kec. Lengkong, Kel. Paledang, Bandung,<br>
						  Jawa Barat 40261, Indonesia</td></tr></table><br>
						  
<table align="center" width=700>
<?php
$nis = @$_GET['nis'];
$id_kelas = @$_GET['id_kelas'];
$id_mp = @$_GET['id_mp'];
$sql_rapot = "SELECT * FROM mp JOIN nilai USING (id_mp) JOIN kelas USING (id_kelas) JOIN siswa USING (nis) WHERE nilai.id_mp='$id_mp' AND nilai.id_kelas='$id_kelas'";
$result_rapot = mysql_query($sql_rapot);
$jmldata_rapot = mysql_num_rows($result_rapot);
$data_rapot = mysql_fetch_object($result_rapot);
?>
<tr><td colspan=7></td></tr>
<tr><td align="left" width=130><b>Nomor Induk Siswa</b></td><td align="center">:</td><td><?php echo $nis; ?></td>
    <td width=220></td>
    <td align="left"><b>Nama Siswa</b></td><td align="center">:</td><td align="left"> <?php echo $data_rapot -> nama_siswa; ?></td></tr>
<tr><td align="left"><b>Kelas</b></td><td align="center">:</td><td><?php echo $data_rapot -> nama_kelas; ?></td>
    <td width=220></td>
    <td align="left"><b>Mata Pelajaran</b></td><td align="center">:</td><td align="left"> <?php echo $data_rapot -> nama_mp; ?></td></tr>
</table><br>

<!-- UTS GANJIL -->
<table align="center" width=700>
<?php
$nis = @$_GET['nis'];
$id_kelas = @$_GET['id_kelas'];
$id_mp = @$_GET['id_mp'];
$sql_uts_ga = "SELECT * FROM siswa JOIN kelas USING (id_kelas) JOIN nilai USING (id_kelas) JOIN ujian USING (id_ujian) WHERE nilai.id_kelas='$id_kelas' AND nilai.nis='$nis' AND nilai.id_mp='$id_mp' AND ujian.id_ujian=1";
$result_uts_ga = mysql_query($sql_uts_ga);
$jmldata_uts_ga = mysql_num_rows($result_uts_ga);
$data_uts_ga = mysql_fetch_object($result_uts_ga);
@$n1 = $data_uts_ga -> info_nilai;
if($jmldata_uts_ga > 0)
{
 ?><tr><td align="center"><b>Ujian Tengah Semester (Ganjil)</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $n1 ?></td><?php
}
else
{
 ?><tr><td align="center"><b>Ujian Tengah Semester (Ganjil)</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;0</td><?php
}
?>
<!-- UAS GANJIL -->
<?php
$nis = @$_GET['nis'];
$id_kelas = @$_GET['id_kelas'];
$id_mp = @$_GET['id_mp'];
$sql_uas_ga = "SELECT * FROM siswa JOIN kelas USING (id_kelas) JOIN nilai USING (id_kelas) JOIN ujian USING (id_ujian) WHERE nilai.id_kelas='$id_kelas' AND nilai.nis='$nis' AND nilai.id_mp='$id_mp' AND ujian.id_ujian=2";
$result_uas_ga = mysql_query($sql_uas_ga);
$jmldata_uas_ga = mysql_num_rows($result_uas_ga);
$data_uas_ga = mysql_fetch_object($result_uas_ga);
@$n2 = $data_uas_ga -> info_nilai;
if($jmldata_uas_ga > 0)
{
 ?><td align="center"><b>Ujian Akhir Semester (Ganjil)</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $n2; ?></td></tr><?php
}
else
{
 ?><td align="center"><b>Ujian Akhir Semester (Ganjil)</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;0</td></tr><?php
}
?></table>
<!-- UTS GENAP -->
<table align="center" width=700><?php
$nis = @$_GET['nis'];
$id_kelas = @$_GET['id_kelas'];
$id_mp = @$_GET['id_mp'];
$sql_uts_ge = "SELECT * FROM siswa JOIN kelas USING (id_kelas) JOIN nilai USING (id_kelas) WHERE nilai.id_kelas='$id_kelas' AND nilai.nis='$nis' AND nilai.id_mp='$id_mp' AND nilai.id_ujian=3";
$result_uts_ge = mysql_query($sql_uts_ge);
$jmldata_uts_ge = mysql_num_rows($result_uts_ge);
$data_uts_ge = mysql_fetch_object($result_uts_ge);
@$n3 = $data_uts_ge -> info_nilai;
if($jmldata_uts_ge > 0)
{
 ?><tr><td align="center"><b>Ujian Tengah Semester (Genap)</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $n3 ?></td><?php
}
else
{
 ?><tr><td align="center"><b>Ujian Tengah Semester (Genap)</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;0</td><?php
}
?>
<!-- UAS GENAP -->
<?php
$nis = @$_GET['nis'];
$id_kelas = @$_GET['id_kelas'];
$id_mp = @$_GET['id_mp'];
$sql_uas_ge = "SELECT * FROM siswa JOIN kelas USING (id_kelas) JOIN nilai USING (id_kelas) WHERE nilai.id_kelas='$id_kelas' AND nilai.nis='$nis' AND nilai.id_mp='$id_mp' AND nilai.id_ujian=4";
$result_uas_ge = mysql_query($sql_uas_ge);
$jmldata_uas_ge = mysql_num_rows($result_uas_ge);
$data_uas_ge = mysql_fetch_object($result_uas_ge);
@$n4 = $data_uas_ge -> info_nilai;
if($jmldata_uas_ge > 0)
{
 ?><td align="center"><b>Ujian Akhir Semester (Genap)</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $n4; ?></td></tr><?php
}
else
{
 ?><td align="center"><b>Ujian Akhir Semester (Genap)</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;0</td></tr><?php
}
?>
</table><br>

<!-- NILAI TO -->
<table align="center" width=700><?php
$nis = @$_GET['nis'];
$id_kelas = @$_GET['id_kelas'];
$id_mp = @$_GET['id_mp'];
$sql_to = "SELECT * FROM siswa JOIN kelas USING (id_kelas) JOIN nilai USING (id_kelas) JOIN ujian USING (id_ujian) WHERE nilai.id_kelas='$id_kelas' AND nilai.nis='$nis' AND nilai.id_mp='$id_mp' AND ujian.id_ujian!=1 AND ujian.id_ujian!=2 AND ujian.id_ujian!=3 AND ujian.id_ujian!=4 GROUP BY ujian.id_ujian";
$result_to = mysql_query($sql_to);
$jmldata_to = mysql_num_rows($result_to);
if($jmldata_to > 0)
{
 while($data_to = mysql_fetch_object($result_to))
 {
  ?><tr><td align="center"><b><?php echo $data_to -> nama_ujian; ?></b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $data_to -> info_nilai; ?></td></tr><?php
 }
}
?>
</table><br>

<!-- RATA TO -->
<?php
$nis = @$_GET['nis'];
$id_kelas = @$_GET['id_kelas'];
$id_mp = @$_GET['id_mp'];
$sql_tor = "SELECT AVG(info_nilai) AS nilai_rata FROM nilai JOIN ujian USING (id_ujian) WHERE nilai.id_kelas='$id_kelas' AND nilai.nis='$nis' AND nilai.id_mp='$id_mp' AND ujian.id_ujian!=1 AND ujian.id_ujian!=2 AND ujian.id_ujian!=3 AND ujian.id_ujian!=4";
$result_tor = mysql_query($sql_tor);
$data_tor = mysql_fetch_array($result_tor);
$rata_to = $data_tor['nilai_rata'];
?>

<!-- KALKULASI NILAI -->
<table align="center" width=700>
<?php
$kal_utas = ($n1 + $n2 + $n3 + $n4)/4;
$kal_all = ($kal_utas + $rata_to)/2;
?>
<tr><td align="center"><b>Kalkulasi Nilai UAS + UTS</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $kal_utas; ?></td>
<td align="center"><b>Kalkulasi Nilai TO</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $rata_to; ?></td></tr>
<tr><td align="center" colspan=2><b>Kalkulasi Nilai Keseluruhan</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $kal_all; ?></td></tr>
</table>
</p><br>
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