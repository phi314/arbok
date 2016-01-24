<?php
include_once "../../lib_function.php";
koneksi_db();

$id_ujian = $_GET['id_ujian'];
$nip = @$_SESSION['nip'];
$delete = "DELETE FROM ujian WHERE id_ujian='$id_ujian'";
mysql_query($delete)
or die ("Try Out Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Try Out Berhasil Dihapus");
document.location='to.php';</script>