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
  $id_mp = $_SESSION['id_mp'];
  $nama_mp = $_SESSION['nama_mp'];
  $id_ujian = @$_GET['id_ujian'];
  
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
 $id_ujian = @$_GET['id_ujian'];
 $sql = "SELECT * FROM ujian JOIN mp USING(id_mp) WHERE ujian.id_ujian=$id_ujian";
 $hasil = mysql_query($sql);
 
 if($hasil)
 {
  while($data = mysql_fetch_array($hasil))
  {
   $id_ujian = $data['id_ujian'];
   $nama_ujian = $data['nama_ujian'];
   $durasi = $data['durasi'];
   $aktif = $data['aktif'];
   $penyusun = $data['penyusun'];
   $id_mp = $data['id_mp'];
  }
 }
?>
<?php
if($aktif == 'ya')
{
 $sql = "UPDATE ujian SET 
		aktif='tidak' 
	    WHERE id_ujian='$id_ujian'";
 $result = mysql_query($sql);
 if($sql)
 {
  ?>
  <script language="JavaScript">
  alert('Status Try Out Berhasil Dirubah');
  window.history.back()</script>
  <?php
 }
}
else if($aktif == 'tidak')
{
 $sql = "UPDATE ujian SET 
		aktif='ya' 
	    WHERE id_ujian='$id_ujian'";
 $result = mysql_query($sql);
 if($sql)
 {
  ?>
  <script language="JavaScript">
  alert('Status Try Out Berhasil Dirubah');
  window.history.back()</script>
  <?php
 }
}
}
?>