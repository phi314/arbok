<?php
function koneksi_db()
{
	$host = "localhost";
	$database = "arbok_lms";
	$user = "root";
	$password = "";
	$link = mysql_connect($host, $user, $password);
	if(!$link)
	{
		die("Koneksi Gagal!" .mysql_error());
	}
	$db = mysql_select_db($database, $link);
	if(!$db)
	{
		die("Error : " . mysql_error());
	}
}
?>

<?php
function cek_status_login()
{
$id_user = isset($_POST['id_user']) ? $_POST['id_user']:"";
$nip = isset($_POST['nip']) ? $_POST['nip']:"";
$nis = isset($_POST['nis']) ? $_POST['nis']:"";
$id_ortu = isset($_POST['id_ortu']) ? $_POST['id_ortu']:"";
$pass = isset($_POST['password']) ? $_POST['password']:"";
$status = isset($_POST['status']) ? $_POST['status']:"";

if ($status == 'admin')
{
  function cek_login($username,$pass,$status)
  {
	$sql = "SELECT * FROM admin WHERE id_user='".$username."' and password='".md5($pass)."' and status='".$status."'";
	$sql_exe = mysql_query($sql);
	if(mysql_num_rows($sql_exe) > 0)
	{
	  // simpan level dari user yang login
	  $data_login = mysql_fetch_assoc($sql_exe);
	  $_SESSION['stats'] = $data_login['status']; 
	  $_SESSION['nama'] = $data_login['nama']; 
	  return true;
	}
	else
	{
	  return false;
	}	
  }
}
if ($status == 'guru')
{
  function cek_login($username,$pass,$status)
  {
	$sql = "SELECT * FROM guru JOIN mp ON guru.id_mp=mp.id_mp WHERE nip='".$username."' and password='".md5($pass)."' and status='".$status."'";
	$sql_exe = mysql_query($sql);
	if(mysql_num_rows($sql_exe) > 0)
	{
	  // simpan data dari user yang login
	  $data_login = mysql_fetch_assoc($sql_exe);
	  $_SESSION['stats'] = $data_login['status']; 
	  $_SESSION['nip'] = $data_login['nip'];
	  $_SESSION['nama_guru'] = $data_login['nama_guru'];
	  $_SESSION['jk_guru'] = $data_login['jk_guru'];
	  $_SESSION['password'] = $data_login['password'];
	  $_SESSION['id_mp'] = $data_login['id_mp'];
	  $_SESSION['nama_mp'] = $data_login['nama_mp'];
	  $_SESSION['stat']=true;
	  return true;
	}
	else
	{
	  return false;
	}	
  }
}
if ($status == 'siswa')
{
  function cek_login($username,$pass,$status)
  {
	$sql = "SELECT * FROM siswa JOIN kelas USING (id_kelas) JOIN tahun_ajaran USING (id_tahun_ajaran) WHERE nis='".$username."' and password='".md5($pass)."' and status='".$status."'";
	$sql_exe = mysql_query($sql);
	if(mysql_num_rows($sql_exe) > 0)
	{
	  // simpan level dari user yang login
	  $data_login = mysql_fetch_assoc($sql_exe);
	  $_SESSION['stats'] = $data_login['status'];
	  $_SESSION['nis'] = $data_login['nis'];
	  $_SESSION['nama_siswa'] = $data_login['nama_siswa'];
	  $_SESSION['id_kelas'] = $data_login['id_kelas'];
	  $_SESSION['nama_kelas'] = $data_login['nama_kelas'];
	  $_SESSION['id_tahun_ajaran'] = $data_login['id_tahun_ajaran'];
	  $_SESSION['nama_tahun_ajaran'] = $data_login['nama_tahun_ajaran'];
	  return true;
	}
	else
	{
	  return false;
	}	
  }
}
if ($status == 'ortu')
{
  function cek_login($username,$pass,$status)
  {
	$sql = "SELECT * FROM siswa JOIN ortu USING (nis) WHERE ortu.id_ortu='".$username."' and ortu.password='".md5($pass)."' and ortu.status='".$status."'";
	$sql_exe = mysql_query($sql);
	if(mysql_num_rows($sql_exe) > 0)
	{
	  // simpan level dari user yang login
	  $data_login = mysql_fetch_assoc($sql_exe);
	  $_SESSION['stats'] = $data_login['status'];
	  $_SESSION['id_ortu'] = $data_login['id_ortu'];
	  $_SESSION['nama_ortu'] = $data_login['nama_ortu'];
	  $_SESSION['nis'] = $data_login['nis'];
	  return true;
	}
	else
	{
	  return false;
	}	
  }
}
}
?>

<?php
function timer()
{
$id_ujian = @$_GET['id_ujian'];
$sql = "SELECT durasi FROM ujian WHERE id_ujian=$id_ujian";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
?>
<html>
<head>
<title>Timer Ujian Online</title>
<script type="text/javascript">
var detik="<?php echo $data['durasi']*60 ?>"
/*var detik="<?php echo $data['durasi']*60; ?>"*/
if (document.images)
{
parselimit=detik
}
function begintimer()
{
if (!document.images)
return
if (parselimit!=0)
{
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if (curmin!=0)
curtime=curmin+":"+cursec+""
else
curtime=cursec+" detik"
document.getElementById("servertime").innerHTML=curtime
setTimeout("begintimer()",1000)
}
}
</script>
</head>
<body onLoad="begintimer()">
<p align="center">
Sisa Waktu <b><DIV id="servertime"></DIV></b></p>
</body>
</html>
<?php
}
?>

<?php
function evaluasi()
{
$id_ujian = @$_GET['id_ujian'];
$sql = "SELECT durasi FROM ujian WHERE id_ujian=$id_ujian";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
?>
<script type="text/ecmascript">
setTimeout(function()
{
 $('#form_pemantapan').submit();
},<?php echo $data['durasi']*1000*60 ?>
);
</script>
<?php
}

/**
 * @param $bln
 * @return string
 */
function  getBulan($bln){
    switch  ($bln){
        case  1:
            $bln = "Januari";
            break;
        case  2:
            $bln = "Februari";
            break;
        case  3:
            $bln = "Maret";
            break;
        case  4:
            $bln = "April";
            break;
        case  5:
            $bln = "Mei";
            break;
        case  6:
            $bln = "Juni";
            break;
        case  7:
            $bln = "Juli";
            break;
        case  8:
            $bln = "Agustus";
            break;
        case  9:
            $bln = "September";
            break;
        case  10:
            $bln = "Oktober";
            break;
        case  11:
            $bln = "November";
            break;
        case  12:
            $bln = "Desember";
            break;
    }

    return $bln;
}