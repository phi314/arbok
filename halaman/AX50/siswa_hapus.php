<?php
include_once "../../lib_function.php";
koneksi_db();

$nis = $_GET['nis'];
$delete = "DELETE FROM siswa WHERE nis='$nis'";
mysql_query($delete)
or die ("Siswa Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Siswa Berhasil Dihapus");
document.location='siswa.php';</script>