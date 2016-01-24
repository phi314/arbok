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
  
  $nis = @$_SESSION['nis'];
  $id_soal = @$_GET['id_soal'];
  $id_ujian = @$_GET['id_ujian'];
  $id_mp = @$_GET['id_mp'];
  $offsets = @$_GET['offsets'];
?>

<?php
  $sql_cek = "SELECT * 
              FROM soal JOIN mp USING (id_mp) JOIN ujian USING (id_mp)
			  WHERE ujian.id_ujian='$id_ujian' AND mp.id_mp='$id_mp'";
  $result_cek = mysql_query($sql_cek);
  $jmldata_cek = mysql_num_rows($result_cek);
  $data_cek = mysql_fetch_array($result_cek);
  
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
$id_ujian = @$_GET['id_ujian'];
$RbJawaban = @$_REQUEST['RbJawaban'];
if (! count($RbJawaban) >=1) 
{
 while($data_cek = mysql_fetch_object($result_cek))
 {
  ?>
  <script language="JavaScript">
  alert('Jawaban Belum Ada Yang Terisi');
  <a href="to_mulai.php?id_ujian=<?php echo $data_cek -> id_ujian ?>&id_mp=<?php echo $data_cek -> id_mp; ?>">
  </script>
  <?php
 }
}

//HITUNG TOTAL SOAL
$sql_ts = "SELECT * FROM ujian JOIN mp USING (id_mp) JOIN soal USING (id_mp) 
		   WHERE soal.id_mp=mp.id_mp AND mp.id_mp=ujian.id_mp AND soal.tampil='ya'";
$result_ts = mysql_query($sql_ts);
$jmldata_ts = mysql_num_rows($result_ts);
$data_ts = mysql_fetch_array($result_ts);
//END HITUNG TOTAL SOAL
?>

<?php
foreach($RbJawaban as $indeks=>$nilai)
{
 $sql2 = "SELECT * FROM soal JOIN mp USING (id_mp) JOIN ujian USING (id_mp)
    	  WHERE id_soal='$indeks' AND id_ujian='$id_ujian' AND id_mp='$id_mp' AND soal.tampil='ya'";
 $qry2 = mysql_query($sql2);
 while($data2=mysql_fetch_array($qry2))
 {
  $jawaban = $nilai;
 }
}
 ?>
 <form method="post" action="cek_ps_input.php?id_ujian=<?php echo $id_ujian; ?>&id_mp=<?php echo $id_mp; ?>&offsets=<?php echo $offsets; ?>&id_soal=<?php echo $id_soal; ?>" name="MyForm">
 <tr><td><input type="hidden" name="jawaban" value="<?php echo @$jawaban; ?>"></td>
     <td><input type="hidden" name="nis" value="<?php echo $nis; ?>"></td>
	 <td><input type="hidden" name="id_soal" value="<?php echo $id_soal; ?>"></td>
	 <td><input type="hidden" name="id_ujian" value="<?php echo $id_ujian; ?>"></td></tr>
 </form>
<script language="javascript" type="text/javascript">
    document.MyForm.submit();
     </script>
     <noscript><input type="submit" value="verify submit"></noscript>
<?php
}
?>