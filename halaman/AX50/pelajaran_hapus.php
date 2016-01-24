<?php
include_once "../../lib_function.php";
koneksi_db();

$id_mp = $_GET['id_mp'];
$delete = "DELETE FROM mp WHERE id_mp='$id_mp'";
mysql_query($delete)
or die ("Mata Pelajaran Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Mata Pelajaran Berhasil Dihapus");
document.location='pelajaran.php';</script>