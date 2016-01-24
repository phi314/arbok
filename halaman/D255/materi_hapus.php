<?php
include_once "../../lib_function.php";
koneksi_db();

$id_modul = $_GET['id_modul'];
$nip = @$_SESSION['nip'];
$delete = "DELETE FROM modul WHERE id_modul='$id_modul'";
mysql_query($delete)
or die ("Materi Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Materi Berhasil Dihapus");
document.location='materi.php?nip=<?php echo $nip; ?>';</script>