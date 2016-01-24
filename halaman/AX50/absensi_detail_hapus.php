<?php
include_once "../../lib_function.php";
koneksi_db();

$id = $_GET['id'];
$id_absensi = $_GET['id_absensi'];
$delete = "DELETE FROM absensi_detail WHERE id='$id'";
mysql_query($delete)
or die ("Detail Absensi Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Detail Absensi Berhasil Dihapus");
document.location='absensi_detail.php?id=<?php echo $id_absensi; ?>';</script>