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
  $nis = @$_GET['nis'];
  $id_kelas = @$_GET['id_kelas'];
  $i = 0;
  
  $sql_nilai = "SELECT * FROM siswa JOIN kelas USING (id_kelas) WHERE nis='$nis' and id_kelas='$id_kelas'";
  $result_nilai = mysql_query($sql_nilai);
  $jmldata_nilai = mysql_num_rows($result_nilai);
  $data_nilai = mysql_fetch_object($result_nilai);
  
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
  

$query_jenis_ujian = mysql_query("
    SELECT 
      * 
    FROM 
      ujian
    WHERE id_ujian NOT IN (SELECT id_ujian FROM nilai WHERE nis='".$nis."' AND id_mp='".$id_mp."' AND id_kelas='".$id_kelas."') 
    AND id_ujian < 7
    ORDER BY 
      id_ujian 
    ASC 
") or die("gagal mengambil data!!!");

if( !mysql_num_rows( $query_jenis_ujian ) ):
    echo '<script type="text/javascript">
        alert("Nilai siswa '.$nis.' sudah lengkap!!");
        document.location="nilai_siswa.php?nis='.$nis.'&id_kelas='.$id_kelas.'";
    </script>';
    die;
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
 if(@$_POST['Tambah'] == "Tambah")
 {
  $id_nilai = @$_POST['id_nilai'];
  $j_nilai = $_POST['j_nilai'];
  $info_nilai = $_POST['info_nilai'];
  $id_ujian = $_POST['j_nilai'];
  $id_mp = $_POST['id_mp'];
  $nis = $_POST['nis'];
  $id_kelas = $_POST['id_kelas'];
   
  $query = "INSERT INTO nilai VALUES ('','$j_nilai','$info_nilai','$id_mp','$nis','$id_ujian','$id_kelas')";
  $result = mysql_query($query);
  if ($query)
  {
   ?>
   <script language="JavaScript">
   alert('Nilai Baru Berhasil Ditambahkan');
   document.location='nilai.php?nip=<?php echo $nip; ?>';
   </script>
   <?php
  }
  else
  {
   ?>
   <script language="JavaScript">
   alert('Nilai Gagal Ditambahkan');
   window.history.back();
   </script>
   <?php
  }
 }
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
<h3 class="page-title">HALAMAN GURU</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue tabbable">
   <div class="portlet-title">
    <h4><i class="icon-reorder"></i><span class="hidden-480">TAMBAH NILAI</span>&nbsp;</h4>
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="nilai_tambah_siswa.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">NIS</label>
<div class="controls"><input type="text" value="<?php echo @$nis; ?>" class="m-wrap large" disabled /></div></div>
<div class="control-group"><label class="control-label">Nama Siswa</label>
<div class="controls"><input type="text" value="<?php echo @$data_nilai -> nama_siswa; ?>" class="m-wrap large" disabled /></div></div>
<div class="control-group"><label class="control-label">Kelas</label>
<div class="controls"><input type="text" value="<?php echo @$data_nilai -> nama_kelas; ?>" class="m-wrap large" disabled /></div></div>
<div class="control-group"><label class="control-label">Jenis Ujian</label>

<div class="controls">
 <select name="j_nilai">
 <?php
    if( mysql_num_rows( $query_jenis_ujian ) ):
        while( $data = mysql_fetch_array( $query_jenis_ujian ) ):
            echo '<option value="'.$data['id_ujian'].'">'.$data['nama_ujian'].'</option>';
        endwhile;
    endif;
 ?>
 </select>
</div></div>
<div class="control-group"><label class="control-label">Perolehan Nilai</label>
<div class="controls"><input type="text" name="info_nilai" placeholder="Hasil Ujian" class="m-wrap large" />
<input type="hidden" name="id_mp" value="<?php echo $id_mp; ?>" />
<input type="hidden" name="nis" value="<?php echo $nis; ?>" />
<input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" />
<input type="hidden" name="id_ujian" /></div></div>
<div class="form-actions">
 <button type="submit" class="btn blue" name="Tambah" value="Tambah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="nilai.php"><button type="button" class="btn green">Kembali</button></a>
</div>
</form>
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
<script>
<!--UNTUK SLIDE NON TABEL-->
jQuery(document).ready(function() {			
// initiate layout and plugins
App.init();
});
</script>
</body>
</html>
<?php
}
?>