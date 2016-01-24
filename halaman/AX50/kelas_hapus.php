<?php
include_once "../../lib_function.php";
koneksi_db();

$id_kelas = $_GET['id_kelas'];
$delete = "DELETE FROM kelas WHERE id_kelas='$id_kelas'";
mysql_query($delete)
or die ("Kelas Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Kelas Berhasil Dihapus");
document.location='kelas.php';</script>