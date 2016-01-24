<?php
  session_start();
  include_once "lib_function.php";
  koneksi_db();
  //PENGECEKAN ID dan PASSWORD APAKAH SUDAH TERDAFTAR
  cek_status_login();
  function ambil_data($username)
  {
	$sql = "SELECT * FROM ".$_SESSION['stats']." WHERE nip='".$username."'";
	$sql_exe = mysql_query($sql);
	$data = mysql_fetch_assoc($sql_exe);
	return $data;
  }
  $id_user = isset($_POST['id_user']) ? $_POST['id_user']:"";
  $nip = isset($_POST['nip']) ? $_POST['nip']:"";
  $nis = isset($_POST['nip']) ? $_POST['nis']:"";
  $id_ortu = isset($_POST['id_ortu']) ? $_POST['id_ortu']:"";
  $pass = isset($_POST['password']) ? $_POST['password']:"";
  $status = isset($_POST['status']) ? $_POST['status']:"";
  if(cek_login($id_user,$pass,$status))
  {
	$data = ambil_data($id_user);
	// buat session berdasarkan data
	$_SESSION['nip_kj'] = $data_siswa['nip'];
	$_SESSION['nama_kj'] = $data_siswa['nama'];
	$_SESSION['stat'] = true;
	header("location:halaman/halaman_".$_SESSION['stats'].".php");
  }	
  else
  {
	?>
	<script type="text/javascript">
    alert("Username atau Password atau Status Salah");
    document.location='index.php';</script>
    <?php
  }	
?>