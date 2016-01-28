<!--
<div class="portlet box grey">
<div class="portlet box red">
<div class="portlet box yellow">
<div class="portlet box purple">
<div class="portlet box green">
<div class="portlet box blue">

	<div class="tools">
	 <a href="javascript:;" class="collapse" title="Sembunyikan Konten"></a>
	 <a href="javascript:;" class="reload" title="Muat Ulang Konten"></a>
	 <a href="javascript:;" class="remove" title="Tutup Konten"></a>
	</div>
-->
<?php
function cess()
{
 ?>
 <meta content="width=device-width, initial-scale=1.0" name="viewport" />
 <meta content="" name="description" />
 <meta content="" name="author" />
 <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
 <link href="../assets/css/metro.css" rel="stylesheet" />
 <link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
 <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
 <link href="../assets/css/style.css" rel="stylesheet" />
 <link href="../assets/css/style_responsive.css" rel="stylesheet" />
 <link href="../assets/css/style_default.css" rel="stylesheet" id="style_color" />
 <link rel="stylesheet" type="text/css" href="../assets/gritter/css/jquery.gritter.css" />
 <link rel="stylesheet" type="text/css" href="../assets/uniform/css/uniform.default.css" />
 <?php
}

function jas()
{
 ?>
 <script src="../assets/js/jquery-1.8.3.min.js"></script>
 <script src="../assets/breakpoints/breakpoints.js"></script>
 <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
 <script src="../assets/js/jquery.blockui.js"></script>
 <script src="../assets/js/jquery.cookie.js"></script>
	
 <script type="text/javascript" src="../assets/uniform/jquery.uniform.min.js"></script>
 <script type="text/javascript" src="../assets/gritter/js/jquery.gritter.js"></script>
 <script type="text/javascript" src="../assets/js/jquery.pulsate.min.js"></script>
 <script src="../assets/js/app.js"></script>		
 <script>
  jQuery(document).ready(function() {			
  // initiate layout and plugins
  App.init();
  });
 </script>
 <?php
}

function pengguna()
{
 $id_ortu = $_SESSION['id_ortu'];
 $sesi = $_SESSION['nama_ortu'];
 $nama_ortu = $_SESSION['nama_ortu'];
 $nis = $_SESSION['nis'];
 
 $sql_dp = "SELECT * FROM ortu WHERE id_ortu='$id_ortu'";
 $result_dp = mysql_query($sql_dp);
 $data_dp = mysql_fetch_object($result_dp);
 ?>
 <li class="dropdown user">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
   <img alt="" src="../foto_profil/<?php echo $data_dp -> dispict; ?>" width="28" />
   <span class="username"><?php echo $_SESSION['nama_ortu']; ?></span>
   <i class="icon-angle-down"></i>
  </a>
  <ul class="dropdown-menu">
   <li><a href="O121/profil.php?id_ortu=<?php echo $id_ortu; ?>"><i class="icon-user"></i> Profil</a></li>
   <li><a href="../logout.php"><i class="icon-key"></i> Log Out</a></li>
  </ul>
</li>
 <?php
}

function menu_utama()
{
 $id_ortu = $_SESSION['id_ortu'];
 $sesi = $_SESSION['nama_ortu'];
 $nama_ortu = $_SESSION['nama_ortu'];
 $nis = $_SESSION['nis'];
 ?>
 <div class="page-sidebar nav-collapse collapse">
  <ul>
   <li><div class="sidebar-toggler hidden-phone"></div></li>
   <li class="start "><a href="halaman_ortu.php"><i class="icon-home"></i><span class="title">Halaman Utama</span></a></li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-user"></i><span class="title">Profil</span><span class="arrow"></span></a>
    <ul class="sub">
     <li><a href="O121/profil.php?id_ortu=<?php echo $id_ortu; ?>">Lihat Profil</a></li>
     <li><a href="O121/profil_ubah.php?id_ortu=<?php echo $id_ortu; ?>">Ubah Profil</a></li>
     <li><a href="O121/profil_ubah_password.php?id_ortu=<?php echo $id_ortu; ?>">Ubah Password</a></li>
    </ul>
   <li class="start "><a href="O121/nilai.php"><i class="icon-bar-chart"></i><span class="title">Lihat Nilai</span></a></li>
  <li class=""><a href="O121/monitoring_absensi_siswa.php"><i class="icon-table"></i><span class="title">Monitoring Absensi</span></a></li>
   <li class=""><a href="O121/gallery.php?id_ortu=<?php echo $id_ortu; ?>"><i class="icon-camera"></i><span class="title">Gallery</span></a></li>
  </ul>
 </div>
 <?php
}

function tema()
{
 ?>
 <div class="color-panel hidden-phone">
  <div class="color-mode-icons icon-color"></div>
  <div class="color-mode-icons icon-color-close"></div>
  <div class="color-mode"><p>WARNA LATAR</p>
   <ul class="inline">
    <li class="color-black current color-default" data-style="default"></li>
    <li class="color-blue" data-style="blue"></li>
    <li class="color-brown" data-style="brown"></li>
    <li class="color-purple" data-style="purple"></li>
    <li class="color-white color-light" data-style="light"></li>
   </ul>
   <label class="hidden-phone">
    <input type="checkbox" class="header" checked value="" />
    <span class="color-mode-label">Header Tetap</span>
   </label>							
  </div>
 </div>
 <?php
}

function konfig_form()
{
 ?>
 <div id="portlet-config" class="modal hide">
  <div class="modal-header">
   <button data-dismiss="modal" class="close" type="button"></button>
   <h3>portlet Settings</h3>
  </div>
  <div class="modal-body"><p>Here will be a configuration form</p></div>
 </div>
 <?php
}

function foot()
{
 ?>
 <div class="footer">
  <center>2015 &copy; Learning Management System SMA Negeri 7 Bandung</center>
  <div class="span pull-right"><span class="go-top"><i class="icon-angle-up"></i></span></div>
 </div>
 <?php
}
?>