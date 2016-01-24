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
  
  $sql_soal = "SELECT * FROM soal WHERE penyusun='$sesi'";
  $result_soal = mysql_query($sql_soal);
  $jmldata_soal = mysql_num_rows($result_soal);
  $i = 0;
  
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
 $id_soal = @$_GET['id_soal'];
 $sql = "SELECT * FROM soal WHERE id_soal=$id_soal";
 $hasil = mysql_query($sql);
 
 if($hasil)
 {
  while($data = mysql_fetch_array($hasil))
  {
   $id_soal = $data['id_soal'];
   $isi_soal = $data['isi_soal'];
   $opsi_a = $data['opsi_a'];
   $opsi_b = $data['opsi_b'];
   $opsi_c = $data['opsi_c'];
   $opsi_d = $data['opsi_d'];
   $opsi_e = $data['opsi_e'];
   $kunci = $data['kunci'];
   @$tampil = $data['tampil'];
   $penyusun = $data['penyusun'];
  }
 }
?>
<?php
if($tampil == 'ya')
{
 $sql = "UPDATE soal SET 
		tampil='tidak' 
	    WHERE id_soal='$id_soal'";
 $result = mysql_query($sql);
 if($sql)
 {
  ?>
  <script language="JavaScript">
  alert('Status Soal Berhasil Dirubah');
  window.history.back()</script>
  <?php
 }
}
else if($tampil == 'tidak')
{
 $sql = "UPDATE soal SET 
		tampil='ya' 
	    WHERE id_soal='$id_soal'";
 $result = mysql_query($sql);
 if($sql)
 {
  ?>
  <script language="JavaScript">
  alert('Status Soal Berhasil Dirubah');
  window.history.back()</script>
  <?php
 }
}
}
?>