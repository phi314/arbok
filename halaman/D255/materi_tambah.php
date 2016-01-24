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
  
  $sql_modul = "SELECT * FROM modul JOIN mp USING (id_mp) WHERE penyusun='$sesi'";
  $result_modul = mysql_query($sql_modul);
  $jmldata_modul = mysql_num_rows($result_modul);
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
<?php
 if(@$_POST['Tambah'] == "Tambah")
 {
  if($_FILES['file_modul']['error'] == 0)
  {
   $id_modul = @$_POST['id_modul'];
   $nama_modul = $_POST['nama_modul'];
   $penyusun = $_POST['penyusun'];
   $file_modul = $_FILES['file_modul']['name'];
   $direc = "../../kumpulan_materi/".$file_modul;
   $id_mp = $_POST['id_mp'];
   if(move_uploaded_file($_FILES['file_modul']['tmp_name'], $direc) == TRUE)
   {
    $query = "INSERT INTO modul VALUES ('','$nama_modul','$file_modul','$penyusun','$id_mp')";
    $result = mysql_query($query);
	if ($query)
    {
     ?>
     <script language="JavaScript">
     alert('Materi Baru Berhasil Ditambahkan');
     document.location='materi.php?nip=<?php echo $nip; ?>';
     </script>
     <?php
    }
   }
   else
   {
    ?>
    <script language="JavaScript">
    alert('Materi Gagal Ditambahkan');
    window.history.back();
    </script>
    <?php
   }
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
    <h4><i class="icon-reorder"></i><span class="hidden-480">TAMBAH MATERI</span>&nbsp;</h4>
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="materi_tambah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">Nama Materi</label>
<div class="controls"><input type="text" placeholder="Nama Materi Baru" name="nama_modul" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Unggah File Materi</label>
<div class="controls"><input type="file" placeholder="Nama Materi Baru" name="file_modul" />
<input type="hidden" name="penyusun" value="<?php echo $sesi; ?>" />
<input type="hidden" name="id_mp" value="<?php echo $id_mp; ?>" /></div></div>
<div class="form-actions">
 <button type="submit" class="btn blue" name="Tambah" value="Tambah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="materi.php"><button type="button" class="btn green">Kembali</button></a>
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