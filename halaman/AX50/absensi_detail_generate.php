<?php
  session_start();
  if(!isset($_SESSION['stat']))
  {
    ?>
	  <script type="text/javascript">
      alert("Maaf Harus Login Terlebih Dahulu");
      document.location='../../index.php';</script>
    <?php
      exit;
  }
  include_once "../../lib_function.php";
  koneksi_db();
  include_once "desain_admin.php";

if(isset($_GET['id_absensi']))
{
    $id_absensi = $_GET['id_absensi'];
}
else
{
    ?>
    <script type="text/javascript">
        document.location='absensi.php';
    </script>
<?php
}

$sql_absensi = "SELECT * FROM absensi WHERE id='$id_absensi' LIMIT 1";
$result_absensi = mysql_query($sql_absensi);
$data_absensi = mysql_fetch_object($result_absensi);

// select all siswa
$q_siswa = mysql_query("SELECT nis FROM siswa");
while($d_siswa = mysql_fetch_object($q_siswa))
{
    $nis = $d_siswa->nis;
    $absen = "hadir";
    $keterangan = "";
    $q_cek_double = mysql_query("SELECT nis_siswa FROM absensi_detail WHERE nis_siswa='$nis' AND id_absensi='$id_absensi'");
    if(mysql_num_rows($q_cek_double) == 0)
    {
        $query = "INSERT INTO absensi_detail(id_absensi, nis_siswa, absen, keterangan) VALUES ('$id_absensi', '$nis', '$absen','$keterangan')";
        $result = mysql_query($query);
    }
}

?>

<script language="JavaScript">
    alert('Berhasil Generate detail Absensi');
    document.location='absensi_detail.php?id=<?php echo $id_absensi; ?>';
</script>
