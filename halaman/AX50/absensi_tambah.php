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
<?php
 if(@$_POST['Tambah'] == "Tambah")
 {
  $tanggal = $_POST['tanggal'];
  $keterangan = $_POST['keterangan'];

     $q_cek = mysql_query("SELECT id FROM absensi WHERE tanggal='$tanggal'");
     if(mysql_num_rows($q_cek) == 0)
     {
         $query = "INSERT INTO absensi(tanggal, keterangan) VALUES ('$tanggal','$keterangan')";
         $result = mysql_query($query);

         if ($query)
         {
             ?>
             <script language="JavaScript">
                 alert('Absensi Berhasil Ditambahkan');
                 document.location='absensi.php';
             </script>
         <?php
         }
     }
     else
     {
         ?>
         <script language="JavaScript">
             alert('Absensi Tanggal <?php echo $tanggal; ?> sudah ada sebelumnya');
             document.location='absensi.php';
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
<h3 class="page-title">HALAMAN ADMINISTRATOR</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> PENAMBAHAN ABSENSI</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="absensi_tambah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><label class="control-label">Tanggal</label>
 <div class="controls"><input type="text" placeholder="Tanggal Absensi" name="tanggal" class="m-wrap large datepicker" /></div></div>
<div class="control-group"><label class="control-label">Keterangan</label>
 <div class="controls"><input type="text" placeholder="Keterangan" name="keterangan" class="m-wrap large" /></div></div>
<input type="hidden" name="password" class="m-wrap large" />
<input type="hidden" name="email" class="m-wrap large" />
<input type="hidden" name="dispict" value="unknown.png" class="m-wrap large" />
<input type="hidden" name="status" value="siswa" class="m-wrap large" />
<div class="form-actions">
 <button type="submit" class="btn blue" name="Tambah" value="Tambah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="absensi.php"><button type="button" class="btn green">Kembali</button></a>
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
<!--AWAL FOOTER--><?php foot() ?><!--AKHIR FOOTER-->
<?php jas() ?>
<!--UNTUK TABEL-->
<script>
jQuery(document).ready(function() {			
// initiate layout and plugins
App.setPage("table_editable");
App.init();

    $('.datepicker').datepicker({
        format: "yyyy-mm-dd"
    });

});
</script>
</body>
</html>
<?php
}
?>