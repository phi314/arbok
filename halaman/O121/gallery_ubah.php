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
  $id_foto = @$_GET['id_foto'];
  $file_foto = @$_GET['file_foto'];
  $pemilik = @$_GET['pemilik'];
   
  if($_SESSION["stats"] != "ortu")
  {
    ?>
	<script type="text/javascript">
    alert("Maaf Halaman Ini Hanya Untuk Orang Tua Siswa");
    document.location='../../index.php';</script>
    <?php
  }
  else
  {
?>
<?php
$sql = "SELECT * FROM ortu JOIN foto ON ortu.id_ortu=foto.pemilik WHERE ortu.id_ortu='$id_ortu'";
$hasil = mysql_query($sql);
if($hasil)
{
 while($data = mysql_fetch_array($hasil))
 {
  $id_ortu = $data['id_ortu'];
  $nama_ortu = $data['nama_ortu'];
  $password = $data['password'];
  $dispict = $data['file_foto'];
  $status = $data['status'];
  $nis = $data['nis'];
 }
}
?>
<form method="post" action="gallery_ubah_proses.php?id_ortu=<?php echo @$id_ortu ?>&foto=<?php echo @$foto ?>&pemilik=<?php echo @$id_ortu ?>&id_foto=<?php echo @$id_foto ?>" name="MyForm">
<input type="hidden" name="id_ortu" value="<?php echo @$id_ortu ?>">
<input type="hidden" name="nama_ortu" value="<?php echo @$nama_ortu ?>">
<input type="hidden" name="password" value="<?php echo @$password ?>">
<input type="hidden" name="dispict" value="<?php echo @$_GET['file_foto']; ?>">
<input type="hidden" name="status" value="<?php echo @$status ?>">
<input type="hidden" name="nis" value="<?php echo @$nis ?>">
</form>
<script language="javascript" type="text/javascript">
document.MyForm.submit();
</script>
<noscript><input type="submit" value="verify submit"></noscript>
<?php
}
?>