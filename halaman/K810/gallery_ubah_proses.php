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
  $nis = $_SESSION['nis'];
  $sesi = $_SESSION['nama_siswa'];
  $jklamin_siswa = @$_SESSION['jklamin_siswa'];
  $password = @$_SESSION['password'];
  $email = @$_SESSION['email'];
  $status = @$_SESSION['status'];
  $id_kelas = $_SESSION['id_kelas'];
  $id_foto = @$_GET['id_foto'];
  $file_foto = @$_GET['file_foto'];
  $pemilik = @$_GET['pemilik'];
   
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
<?php
$nis = @$_POST['nis'];
$nama_siswa = @$_POST['nama_siswa'];
$jklamin_siswa = @$_POST['jklamin_siswa'];
$password = @$_POST['password'];
$email = @$_POST['email'];
$dispict = @$_POST['dispict'];
$status = @$_POST['status'];
$id_kelas = @$_POST['id_kelas'];
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
$sql = "UPDATE siswa SET 
        dispict='$dispict'
        WHERE nis='$nis'";
$result = mysql_query($sql);
if($sql)
{
 ?>
 <script language="JavaScript">
 alert('Foto Profil Berhasil Dirubah');
 document.location='gallery.php?nis=<?php echo $nis; ?>'</script>
 <?php
}
?>
<?php
}
?>