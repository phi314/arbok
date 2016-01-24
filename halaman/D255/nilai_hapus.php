<?php
include_once "../../lib_function.php";
koneksi_db();

$id_nilai = $_GET['id_nilai'];
$nis = $_GET['nis'];
$id_kelas = $_GET['id_kelas'];
$delete = "DELETE FROM nilai WHERE id_nilai='$id_nilai'";
mysql_query($delete)
or die ("Nilai Tidak Dapat Dihapus");

?>
<script type="text/javascript">
alert("Nilai Berhasil Dihapus");
document.location='nilai_siswa.php?nis=<?php echo $nis; ?>&id_kelas=<?php echo $id_kelas; ?>';</script>