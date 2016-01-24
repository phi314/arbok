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
  $id_foto = @$_GET['id_foto'];
  $file_foto = @$_GET['file_foto'];
  $pemilik = @$_GET['pemilik'];
   
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
$sql = "SELECT * FROM guru JOIN foto ON guru.nip=foto.pemilik WHERE guru.nip='$nip'";
$hasil = mysql_query($sql);
if($hasil)
{
 while($data = mysql_fetch_array($hasil))
 {
  $nip = $data['nip'];
  $nama_guru = $data['nama_guru'];
  $jklamin_guru = $data['jklamin_guru'];
  $password = $data['password'];
  $email = $data['email'];
  $dispict = $data['file_foto'];
  $status = $data['status'];
  $id_mp = $data['id_mp'];
 }
}
?>
<form method="post" action="gallery_ubah_proses.php?nip=<?php echo @$nip ?>&foto=<?php echo @$foto ?>&pemilik=<?php echo @$nip ?>&id_foto=<?php echo @$id_foto ?>" name="MyForm">
<input type="hidden" name="nip" value="<?php echo @$nip ?>">
<input type="hidden" name="nama_guru" value="<?php echo @$nama_guru ?>">
<input type="hidden" name="jklamin_guru" value="<?php echo @$jklamin_guru ?>">
<input type="hidden" name="password" value="<?php echo @$password ?>">
<input type="hidden" name="email" value="<?php echo @$email ?>">
<input type="hidden" name="dispict" value="<?php echo @$_GET['file_foto']; ?>">
<input type="hidden" name="status" value="<?php echo @$status ?>">
<input type="hidden" name="id_mp" value="<?php echo @$id_mp ?>">
</form>
<script language="javascript" type="text/javascript">
document.MyForm.submit();
</script>
<noscript><input type="submit" value="verify submit"></noscript>
<?php
}
?>