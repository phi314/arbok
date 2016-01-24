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
$sql = "SELECT * FROM siswa JOIN foto ON siswa.nis=foto.pemilik WHERE siswa.nis='$nis'";
$hasil = mysql_query($sql);
if($hasil)
{
 while($data = mysql_fetch_array($hasil))
 {
  $nis = $data['nis'];
  $nama_siswa = $data['nama_siswa'];
  $jklamin_siswa = $data['jklamin_siswa'];
  $password = $data['password'];
  $email = $data['email'];
  $dispict = $data['file_foto'];
  $status = $data['status'];
  $id_kelas = $data['id_kelas'];
 }
}
?>
<form method="post" action="gallery_ubah_proses.php?nis=<?php echo @$nis ?>&foto=<?php echo @$foto ?>&pemilik=<?php echo @$nis ?>&id_foto=<?php echo @$id_foto ?>" name="MyForm">
<input type="hidden" name="nis" value="<?php echo @$nis ?>">
<input type="hidden" name="nama_siswa" value="<?php echo @$nama_siswa ?>">
<input type="hidden" name="jklamin_siswa" value="<?php echo @$jklamin_siswa ?>">
<input type="hidden" name="password" value="<?php echo @$password ?>">
<input type="hidden" name="email" value="<?php echo @$email ?>">
<input type="hidden" name="dispict" value="<?php echo @$_GET['file_foto']; ?>">
<input type="hidden" name="status" value="<?php echo @$status ?>">
<input type="hidden" name="id_kelas" value="<?php echo @$id_kelas ?>">
</form>
<script language="javascript" type="text/javascript">
document.MyForm.submit();
</script>
<noscript><input type="submit" value="verify submit"></noscript>
<?php
}
?>