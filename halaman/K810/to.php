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
  
  $sql_to = "SELECT * FROM ujian JOIN mp USING (id_mp) WHERE ujian.aktif='ya'";
  $result_to = mysql_query($sql_to);
  $jmldata_to = mysql_num_rows($result_to);
  $i = 0;
  
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
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> LISTING TRY OUT</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NO</th>
       <th>NAMA TRY OUT</th>
	   <th>DURASI TRY OUT</th>
	   <th>MATA PELAJARAN</th>
	   <th>JUMLAH SOAL</th>
	   <th>KERJAKAN</th>
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
   <td><center><?php echo $data_to -> durasi; ?> Menit</center></td>
   <td><center><?php echo $data_to -> nama_mp; ?></center></td>
   <td><center>
   <?php
   $id_mp = $data_to -> id_mp;
   $sql_soal = "SELECT * FROM soal WHERE tampil='ya' AND id_mp='$id_mp'";
   $result_soal = mysql_query($sql_soal);
   $jmldata_soal = mysql_num_rows($result_soal);
   echo $jmldata_soal; echo " Butir";
   ?></center></td>
    <?php
    //CEK APAKAH SISWA SUDAH PERNAH MENJAWAB SOAL ATAU BELUM
   $sql_cek_status_jwaban = mysql_query("
    SELECT * FROM analisis WHERE nis='".$_SESSION['nis']."' AND id_ujian='".$data_to->id_ujian."'
   ");
   if( mysql_num_rows( $sql_cek_status_jwaban ) ):
    echo '
        <td><center><a href="lihat_jawaban.php?id_ujian='.$data_to->id_ujian.'">Lihat Jawaban</a></center></td>
    ';
   else:
    ?>   
       <td><center><a href="to_mulai.php?id_ujian=<?php echo $data_to -> id_ujian?>&id_mp=<?php echo $id_mp; ?>" onClick="javascript:return confirm('Anda Akan Mengerjakan Try Out <?php echo $data_to -> nama_ujian; ?>?');">Mulai Mengerjakan</a></center></td>
    <?php 
    endif; 
    ?>
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