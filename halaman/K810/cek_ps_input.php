<?php
include_once "../../lib_function.php";
koneksi_db();
  
$id_soal = @$_GET['id_soal'];
$id_ujian = @$_GET['id_ujian'];
$id_mp = @$_GET['id_mp'];
$offsets = @$_GET['offsets'];
$offsetss = $offsets + 1;
?>
<?php
   $id_analisis = @$_POST['id_analisis'];
   $jawaban = $_POST['jawaban'];
   $nis = $_POST['nis'];
   $id_soal = $_POST['id_soal'];
   $id_ujian = $_POST['id_ujian'];
   if(empty($jawaban) || empty($id_soal))
   {
    ?>
    <script language="JavaScript">
    alert('Data Isian Tidak Lengkap, Silahkan Ulangi');
    window.history.back();
    </script>
    <?php
   }
   else
   {
   $query = "INSERT INTO analisis 
             VALUES ('','$jawaban','$nis','$id_soal','$id_ujian')";
   $result = mysql_query($query);
   if ($query)
   {
    ?>
    <script type="text/javascript">
    document.location='to_mulai.php?id_ujian=<?php echo $id_ujian; ?>&id_mp=<?php echo $id_mp; ?>&page=<?php echo $offsetss; ?>';
    </script>
    <?php
   }
   else
   {
	?>
    <script language="JavaScript">
	alert('Gagal');
	window.history.back();
	</script>
    <?php
   }
   }
?>