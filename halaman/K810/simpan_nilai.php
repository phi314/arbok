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
  $id_kelas = @$_SESSION['id_kelas'];
  $nis = @$_SESSION['nis'];
  $id_ujian = @$_GET['id_ujian'];
  $id_mp = @$_GET['id_mp'];

  $sql_siswa = "SELECT * FROM siswa WHERE id_kelas='$id_kelas'";
  $result_siswa = mysql_query($sql_siswa);
  $jmldata_siswa = mysql_num_rows($result_siswa);
  $data_siswa = mysql_fetch_object($result_siswa);
  
  $sql_kelas = "SELECT * FROM kelas JOIN tahun_ajaran USING (id_tahun_ajaran) WHERE id_kelas='$id_kelas'";
  $result_kelas = mysql_query($sql_kelas);
  $jmldata_kelas = mysql_num_rows($result_kelas);
  $data_kelas = mysql_fetch_object($result_kelas);
  
  $sql_ujian = "SELECT * FROM ujian WHERE id_ujian='$id_ujian'";
  $result_ujian = mysql_query($sql_ujian);
  $jmldata_ujian = mysql_num_rows($result_ujian);
  $data_ujian = mysql_fetch_object($result_ujian);
  
  $sql_benar = "SELECT * FROM soal JOIN analisis USING (id_soal) WHERE soal.id_soal=analisis.id_soal AND analisis.id_ujian='$id_ujian' and analisis.nis='$nis'";
  $result_benar = mysql_query($sql_benar);
  $jmldata_benar = mysql_num_rows($result_benar);
  $benar = 0;
  while($data_benar = mysql_fetch_object($result_benar))
  {
   if($data_benar -> jawaban == $data_benar -> kunci)
   {
    $benar = $benar + 1;
   }
  }
  
  $sql_jum = "SELECT COUNT(*) FROM soal JOIN mp USING (id_mp) JOIN ujian USING (id_mp) WHERE id_ujian='$id_ujian' AND id_mp='$id_mp' AND soal.tampil='ya'";
  $qry_jum = mysql_query($sql_jum);
  $data_jum= mysql_fetch_row($qry_jum);
  $jumlah= $data_jum[0];
  $salah = $jumlah - $benar;
  $persen_benar = round(($benar/$jumlah)*100,2);
  $persen_salah = round(($salah/$jumlah)*100,2);
  
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
  <form method="post" action="simpan_nilai_proses.php?id_mp=<?php echo $id_mp ?>&info_nilai=<?php echo $persen_benar; ?>&nis=<?php echo $nis ?>&id_kelas=<?php echo $id_kelas ?>&id_ujian=<?php echo $id_ujian ?>" name="MyForm">
  <input type="hidden" name="info_nilai" value="<?php echo $persen_benar; ?>">
  <input type="hidden" name="id_mp" value="<?php echo $id_mp; ?>">
  <input type="hidden" name="nis" value="<?php echo $nis; ?>">
  <input type="hidden" name="id_ujian" value="<?php echo $id_ujian; ?>">
  <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
  <input type="hidden" name="j_nilai" value="5">
  <input type="submit" name="Simpan" value="Simpan">
  </form>
  <script language="javascript" type="text/javascript">
  document.MyForm.submit();
  </script>
  <noscript><input type="submit" value="verify submit"></noscript>
<?php
}
?>