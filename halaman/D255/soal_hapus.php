<?php
include_once "../../lib_function.php";
koneksi_db();

$id_soal = $_GET['id_soal'];
$nip = @$_SESSION['nip'];
$delete = "DELETE FROM soal WHERE id_soal='$id_soal'";
mysql_query($delete)
or die ("Soal Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Soal Berhasil Dihapus");
document.location='soal.php';</script>