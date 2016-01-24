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
   $id_soal = @$_POST['id_soal'];
   $isi_soal = $_POST['isi_soal'];
   $opsi_a = $_POST['opsi_a'];
   $opsi_b = $_POST['opsi_b'];
   $opsi_c = $_POST['opsi_c'];
   $opsi_d = $_POST['opsi_d'];
   $opsi_e = $_POST['opsi_e'];
   $kunci = strtoupper($_POST['kunci']);
   @$tampil = $_POST['tampil'];
   $penyusun = $_POST['penyusun'];
   $id_mp = $_POST['id_mp'];
   $kunci_range = array('A','B','C','D','E');
   if(empty($isi_soal) || empty($opsi_a) || empty($opsi_b) || empty($opsi_c) || empty($opsi_d) || empty($opsi_e) || empty($kunci))
   {
        ?>
        <script language="JavaScript">
        alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
        window.history.back();
        </script>
        <?php
   }
   else if( !in_array( $kunci, $kunci_range ) )
   {
        ?>
        <script language="JavaScript">
        alert('Kunci jawaban yang anda input tidak terdaftar!');
        window.history.back();
        </script>
        <?php
   }
   else
   {
   $query = "INSERT INTO soal 
             VALUES ('','$isi_soal','$opsi_a','$opsi_b','$opsi_c','$opsi_d','$opsi_e','$kunci','$tampil','$penyusun','$id_mp')";
   $result = mysql_query($query);
   if ($query)
   {
    ?>
    <script language="JavaScript">
    alert('Soal Baru Berhasil Ditambahkan');
    document.location='soal.php';
    </script>
    <?php
   }
   else
   {
	?>
    <script language="JavaScript">
	alert('Soal Baru Gagal Ditambahkan');
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
<script type="text/javascript" src="../../jss/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
relative_urls : false, 
remove_script_host : false, 
selector: "textarea", 
theme: "modern", 
width: 800, 
height: 300, 
subfolder:"", 
plugins: [ 
"advlist autolink link image lists charmap print preview hr anchor pagebreak", 
"searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking", 
"table contextmenu directionality emoticons paste textcolor filemanager" 
], 
image_advtab: true, 
toolbar: "bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image media" 
}); 
</script>
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
    <h4><i class="icon-reorder"></i><span class="hidden-480">TAMBAH SOAL</span>&nbsp;</h4>
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="soal_tambah.php" enctype="multipart/form-data" class="form-horizontal">
<div class="control-group"><center><textarea name="isi_soal"></textarea></center></div>
<div class="control-group"><label class="control-label">Pilihan A</label>
<div class="controls"><input type="text" placeholder="Pilihan Jawaban A" name="opsi_a" class="m-wrap medium" /></div></div>
<div class="control-group"><label class="control-label">Pilihan B</label>
<div class="controls"><input type="text" placeholder="Pilihan Jawaban B" name="opsi_b" class="m-wrap medium" /></div></div>
<div class="control-group"><label class="control-label">Pilihan C</label>
<div class="controls"><input type="text" placeholder="Pilihan Jawaban C" name="opsi_c" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Pilihan D</label>
<div class="controls"><input type="text" placeholder="Pilihan Jawaban D" name="opsi_d" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Pilihan E</label>
<div class="controls"><input type="text" placeholder="Pilihan Jawaban E" name="opsi_e" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">Kunci Jawaban</label>
<div class="controls"><input type="text" placeholder="A / B / C / D / E" style="text-transform:uppercase" name="kunci" class="m-wrap large" /></div></div>
<input type="hidden" name="penyusun" value="<?php echo $sesi; ?>" />
<input type="hidden" name="id_mp" value="<?php echo $id_mp; ?>" />
<input type="hidden" name="tampil" value="tidak" />
</div></div>
<div class="form-actions">
 <button type="submit" class="btn blue" name="Tambah" value="Tambah"><i class="icon-ok"></i> Simpan</button>
 <button type="reset" class="btn red">Ulang</button>
 <a href="soal.php"><button type="button" class="btn green">Kembali</button></a>
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