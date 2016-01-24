<?php
include_once "../../lib_function.php";
koneksi_db();
  
$id_mp = @$_GET['id_mp'];
$nis = @$_SESSION['nis'];
$id_kelas = @$_SESSION['id_kelas'];
$id_ujian = @$_GET['id_ujian'];
$info_nilai = @$_GET['info_nilai'];

?>
<?php
   $id_nilai = @$_POST['id_nilai'];
   $j_nilai = @$_POST['j_nilai'];
   $info_nilai = $_POST['info_nilai'];
   $id_mp = $_POST['id_mp'];
   $nis = $_POST['nis'];
   $id_kelas = $_POST['id_kelas'];
   $id_ujian = $_POST['id_ujian'];
   if(empty($info_nilai))
   {
    ?>
    <script language="JavaScript">
    alert('Siswa Tidak Memiliki Nilai');
    window.history.back();
    </script>
    <?php
   }
   else
   {
   $query = "INSERT INTO nilai 
             VALUES ('','$j_nilai','$info_nilai','$id_mp','$nis','$id_ujian','$id_kelas')";
   $result = mysql_query($query);
   if ($query)
   {
    ?>
    <script language="JavaScript">
    alert('Nilai Berhasil Disimpan');
    document.location='../../logout.php';
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