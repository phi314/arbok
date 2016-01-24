<?php
include_once "../../lib_function.php";
koneksi_db();

$nip = $_GET['nip'];
$delete = "DELETE FROM guru WHERE nip='$nip'";
mysql_query($delete)
or die ("Pengajar Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Pengajar Berhasil Dihapus");
document.location='guru.php';</script>