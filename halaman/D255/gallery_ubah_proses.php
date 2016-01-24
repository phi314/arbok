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
  $nip = $_SESSION['nip'];
  $sesi = $_SESSION['nama_guru'];
  $jklamin_guru = @$_SESSION['jklamin_guru'];
  $password = $_SESSION['password'];
  $email = @$_SESSION['email'];
  $status = @$_SESSION['status'];
  $id_mp = $_SESSION['id_mp'];
  $nama_mp = $_SESSION['nama_mp'];
  $id_foto = $_GET['id_foto'];
  $foto = $_GET['foto'];
  $pemilik = $_GET['pemilik'];
   
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
<?php
$nip = @$_POST['nip'];
$nama_guru = @$_POST['nama_guru'];
$jklamin_guru = @$_POST['jklamin_guru'];
$password = @$_POST['password'];
$email = @$_POST['email'];
$dispict = @$_POST['dispict'];
$status = @$_POST['status'];
$id_mp = @$_POST['id_mp'];
if(empty($dispict))
{
 ?>
 <script language="JavaScript">
 alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
 window.history.back();
 </script>
 <?php
}
else
$sql = "UPDATE guru SET 
        dispict='$dispict'
        WHERE nip='$nip'";
$result = mysql_query($sql);
if($sql)
{
 ?>
 <script language="JavaScript">
 alert('Foto Profil Berhasil Dirubah');
 document.location='gallery.php'</script>
 <?php
}
?>
<?php
}
?>