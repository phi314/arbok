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
  $id_ortu = $_SESSION['id_ortu'];
  $sesi = $_SESSION['nama_ortu'];
  @$password = $_SESSION['password'];
  $status = @$_SESSION['status'];
  $nis = $_SESSION['nis'];
  $id_foto = $_GET['id_foto'];
  $foto = $_GET['foto'];
  $pemilik = $_GET['pemilik'];
   
  if($_SESSION["stats"] != "ortu")
  {
    ?>
	<script type="text/javascript">
    alert("Maaf Halaman Ini Hanya Untuk ortu");
    document.location='../../index.php';</script>
    <?php
  }
  else
  {
?>
<?php
$id_ortu = @$_POST['id_ortu'];
$nama_ortu = @$_POST['nama_ortu'];
$password = @$_POST['password'];
$dispict = @$_POST['dispict'];
$status = @$_POST['status'];
$nis = @$_POST['nis'];
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
$sql = "UPDATE ortu SET 
        dispict='$dispict'
        WHERE id_ortu='$id_ortu'";
$result = mysql_query($sql);
if($sql)
{
 ?>
 <script language="JavaScript">
 alert('Foto Profil Berhasil Dirubah');
 document.location='profil.php'</script>
 <?php
}
?>
<?php
}
?>