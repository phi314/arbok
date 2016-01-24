<?php
include_once "../../lib_function.php";
koneksi_db();

$id_foto = $_GET['id_foto'];
$id_ortu = @$_SESSION['id_ortu'];
$delete = "DELETE FROM foto WHERE id_foto='$id_foto'";
mysql_query($delete)
or die ("Foto Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Foto Berhasil Dihapus");
document.location='gallery.php';</script>