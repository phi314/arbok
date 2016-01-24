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

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
else
{
    ?>
    <script type="text/javascript">
        document.location='absensi.php';</script>
<?php
}

$sql_absensi = "SELECT *, siswa.nama_siswa, absensi.tanggal FROM absensi_detail JOIN siswa ON siswa.nis=absensi_detail.nis_siswa JOIN absensi ON absensi.id=absensi_detail.id_absensi WHERE absensi_detail.id='$id' LIMIT 1";
$result_absensi = mysql_query($sql_absensi);
$data_absensi = mysql_fetch_object($result_absensi);
  
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
 if(@$_POST['ubah'] == "ubah")
 {
     $id = $_GET['id'];
     $absen = $_POST['absen'];
     $keterangan = $_POST['keterangan'];

     $query = "UPDATE absensi_detail SET absen='$absen', keterangan='$keterangan' WHERE id='$id'";
     $result = mysql_query($query);
     echo mysql_error();
     if ($query)
     {
     ?>
      <script language="JavaScript">
          alert('Berhasil update Absensi. <?php echo $data_absensi->nis; ?> - <?php echo $data_absensi->nama_siswa; ?>');
          document.location='absensi_detail.php?id=<?php echo $data_absensi->id_absensi; ?>';
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
    <h4><i class="icon-edit"></i> UPDATE ABSENSI TANGGAL: <?php echo $data_absensi->tanggal; ?> UNTUK <?php echo "[".$data_absensi->nis."] ".$data_absensi->nama_siswa; ?></h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body form"><br>
    <div class="tab-content">
     <div class="tab-pane active" id="portlet_tab1">
<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
    <div class="control-group"><label class="control-label">Absen</label>
        <div class="controls">
            <select name="absen" class="m-wrap large">
                <option <?php echo $data_absensi->absen == 'hadir' ? "selected='selected'" : ""; ?>>hadir</option>
                <option <?php echo $data_absensi->absen == 'izin' ? "selected='selected'" : ""; ?>>izin</option>
                <option <?php echo $data_absensi->absen == 'sakit' ? "selected='selected'" : ""; ?>>sakit</option>
            </select>
        </div></div>
<div class="control-group"><label class="control-label">Keterangan</label>
 <div class="controls"><input type="text" placeholder="Keterangan" name="keterangan" class="m-wrap large" /></div></div>
<input type="hidden" name="password" class="m-wrap large" />
<input type="hidden" name="email" class="m-wrap large" />
<input type="hidden" name="dispict" value="unknown.png" class="m-wrap large" />
<input type="hidden" name="status" value="siswa" class="m-wrap large" />
<input type="hidden" name="id" value="<?php echo $id; ?>" class="m-wrap large" />
<div class="form-actions">
 <button type="submit" class="btn blue" name="ubah" value="ubah"><i class="icon-ok"></i> Simpan</button>
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