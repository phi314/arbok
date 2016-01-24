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
  $id_mp = @$_GET['id_mp'];
  $id_ujian = @$_GET['id_ujian'];
  
  // START PAGING I
  $tablename = "soal";
  $baselink=$_SERVER['PHP_SELF'];
 
  $sql = "SELECT *
          FROM soal JOIN mp USING (id_mp)
					JOIN ujian USING (id_mp)
		  WHERE id_ujian='$id_ujian' AND
		        soal.tampil='ya'
          ";
  // END PAGING I 
  
  $result = mysql_query($sql);
  $jmldata = mysql_num_rows($result);
   
  
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

 <div class="span2"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-reorder"></i> DURASI</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
      <center><?php timer(); ?></center>
     </div>
    </div>
   </div>
  </div>
 </div>

 <div class="span10"><!--PANJANG TABEL-->
  <div class="portlet box blue tabbable"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> PENGERJAAN TRY OUT</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body form"><div class="tabbable portlet-tabs">
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<!--<center><div class="letak_waktu"><?php timer(); ?></div></center>-->
<form method="post" action="cek_simpan_jawaban_tryout.php" id="form_pemantapan">
<?php evaluasi(); ?>
<?php  
if($jmldata > 0)
{
 $i=0;
 while($data = mysql_fetch_array($result))
 {
  $i++; 
  $search_word  = array('<p>', '</p>');
  ?>
  <?php echo "<label>".$i."). ".str_replace( $search_word,'',$data['isi_soal'])."</label>"; ?>
  <div class="control-group"><div class="controls">
   <label class="radio"><?php echo "<input type='radio' value='A' name='RbJawaban[$data[id_soal]]'>" ?>
    <?php echo $data['opsi_a']; ?></label><br>
   <label class="radio"><?php echo "<input type='radio' value='B' name='RbJawaban[$data[id_soal]]'>" ?>
    <?php echo $data['opsi_b']; ?></label><br>
   <label class="radio"><?php echo "<input type='radio' value='C' name='RbJawaban[$data[id_soal]]'>" ?>
    <?php echo $data['opsi_c']; ?></label><br>
   <label class="radio"><?php echo "<input type='radio' value='D' name='RbJawaban[$data[id_soal]]'>" ?>
    <?php echo $data['opsi_d']; ?></label><br>
   <label class="radio"><?php echo "<input type='radio' value='E' name='RbJawaban[$data[id_soal]]'>" ?>
    <?php echo $data['opsi_e']; ?></label><br>
  &nbsp;</div></div>
  <input type="hidden" name="pilihan_kosong[]" value="<?php echo $data['id_soal']; ?>">
  <?php
 }
 ?>
 <b>
     <center>
        <input type="hidden" name="id_ujian" value="<?php echo $_GET['id_ujian']; ?>">
        <input type="hidden" name="id_mp" value="<?php echo $_GET['id_mp']; ?>">
        <button type="submit" value="Simpan">Simpan</button>
     </center>
 </b>
 <?php
}
?>
</form>
     </div>
    </div>
   </div></div>
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