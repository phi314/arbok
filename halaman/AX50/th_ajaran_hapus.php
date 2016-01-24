<?php
include_once "../../lib_function.php";
koneksi_db();

$id_tahun_ajaran = $_GET['id_tahun_ajaran'];
$delete = "DELETE FROM tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'";
mysql_query($delete)
or die ("Tahun Ajaran Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Tahun Ajaran Berhasil Dihapus");
document.location='th_ajaran.php';</script>