<!--
<div class="portlet box grey">
<div class="portlet box red">
<div class="portlet box yellow">
<div class="portlet box purple">
<div class="portlet box green">
<div class="portlet box blue">

<form action="#" class="form-horizontal">
<div class="control-group"><label class="control-label">INPUT TEXT</label>
<div class="controls"><input type="text" placeholder="Nama Materi Baru" name="nama_materi" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">INPUT FILE</label>
<div class="controls"><input type="file" placeholder="Nama Materi Baru" name="nama_materi" class="m-wrap large" /></div></div>
<div class="control-group"><label class="control-label">SELECT NAME</label>
<div class="controls"><select class="large m-wrap" tabindex="1">
 <option value="Category 1">Category 1</option>
 <option value="Category 2">Category 2</option>
 <option value="Category 3">Category 5</option>
 <option value="Category 4">Category 4</option>
</select></div></div>

<button type="button" class="btn">Default</button>
<button type="button" class="btn red">Primary</button>
<button type="button" class="btn blue">Info</button>				
<button type="button" class="btn green">Success</button>
-->
<?php
function cess()
{
 ?>
 <meta content="width=device-width, initial-scale=1.0" name="viewport" />
 <meta content="" name="description" />
 <meta content="" name="author" />
 <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
 <link href="../../assets/css/metro.css" rel="stylesheet" />
 <link href="../../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
 <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
 <link href="../../assets/css/style.css" rel="stylesheet" />
 <link href="../../assets/css/style_responsive.css" rel="stylesheet" />
 <link href="../../assets/css/style_default.css" rel="stylesheet" id="style_color" />
 <link href="../../assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="../../assets/uniform/css/uniform.default.css" />
 <link rel="stylesheet" type="text/css" href="../../assets/chosen-bootstrap/chosen/chosen.css" />
 <link rel="stylesheet" href="../../assets/data-tables/DT_bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/uniform/css/uniform.default.css" />
 <link rel="stylesheet" type="text/css" href="../../assets/gritter/css/jquery.gritter.css" />
 <?php
}

function jas()
{
 ?>
 <script src="../../assets/js/jquery-1.8.3.min.js"></script>
 <script src="../../assets/breakpoints/breakpoints.js"></script>
 <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
 <script src="../../assets/fancybox/source/jquery.fancybox.pack.js"></script>
 <script src="../../assets/js/jquery.blockui.js"></script>
 <script src="../../assets/js/jquery.cookie.js"></script>
	
 <script type="text/javascript" src="../../assets/uniform/jquery.uniform.min.js"></script>
 <script type="text/javascript" src="../../assets/data-tables/jquery.dataTables.js"></script>
 <script type="text/javascript" src="../../assets/gritter/js/jquery.gritter.js"></script>
 <script type="text/javascript" src="../../assets/js/jquery.pulsate.min.js"></script>
 <script type="text/javascript" src="../../assets/data-tables/DT_bootstrap.js"></script>
 <script type="text/javascript" src="../../assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
 <script src="../../assets/js/app.js"></script>
<!--
<script>
jQuery(document).ready(function() {			
// initiate layout and plugins
App.init();
});
</script>

<script>
jQuery(document).ready(function() {			
// initiate layout and plugins
App.setPage("table_editable");
App.init();
});
</script>
-->
 <?php
}

function pengguna()
{
 $nip = $_SESSION['nip'];
 $sesi = $_SESSION['nama_guru'];
 $id_mp = $_SESSION['id_mp'];
 $nama_mp = $_SESSION['nama_mp'];
 
 $sql_dp = "SELECT * FROM guru WHERE nip='$nip'";
 $result_dp = mysql_query($sql_dp);
 $data_dp = mysql_fetch_object($result_dp);
 ?>
 <li class="dropdown user">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
   <img alt="" src="../../foto_profil/<?php echo $data_dp -> dispict; ?>" width="28" />
   <span class="username"><?php echo $_SESSION['nama_guru']; ?></span>
   <i class="icon-angle-down"></i>
  </a>
  <ul class="dropdown-menu">
   <li><a href="profil.php?nip=<?php echo $nip; ?>"><i class="icon-user"></i> Profil</a></li>
   <li><a href="../../logout.php"><i class="icon-key"></i> Log Out</a></li>
  </ul>
</li>
 <?php
}

function menu_utama()
{
 $nip = $_SESSION['nip'];
 $sesi = $_SESSION['nama_guru'];
 $id_mp = $_SESSION['id_mp'];
 $nama_mp = $_SESSION['nama_mp'];
 ?>
 <div class="page-sidebar nav-collapse collapse">
  <ul>
   <li><div class="sidebar-toggler hidden-phone"></div></li>
   <li class="start "><a href="../halaman_guru.php"><i class="icon-home"></i><span class="title">Halaman Utama</span></a></li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-user"></i><span class="title">Profil</span><span class="arrow"></span></a>
    <ul class="sub">
     <li><a href="profil.php?nip=<?php echo $nip; ?>">Lihat Profil</a></li>
     <li><a href="profil_ubah.php?nip=<?php echo $nip; ?>">Ubah Profil</a></li>
     <li><a href="profil_ubah_password.php?nip=<?php echo $nip; ?>">Ubah Password</a></li>
    </ul>
   </li>
   <li class=""><a href="materi.php"><i class="icon-bookmark-empty"></i><span class="title">Pengolahan Materi</span></a></li>
   <li class=""><a href="soal.php"><i class="icon-table"></i><span class="title">Pengolahan Soal</span></a></li>
   <li class=""><a href="to.php"><i class="icon-briefcase"></i><span class="title">Pengolahan Try Out</span></a></li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-bar-chart"></i><span class="title">Pengolahan Nilai</span><span class="arrow"></span></a>
    <ul class="sub">
     <li><a href="nilai_tambah.php">Tambah Nilai</a></li>
     <li><a href="nilai.php">Lihat Nilai</a></li>
    </ul>
   </li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-th-list"></i><span class="title">Analisis Butir Soal</span><span class="arrow"></span></a>
    <ul class="sub">
     <li><a href="analisis_m1.php">Tingkat Kesukaran Soal</a></li>
     <li><a href="analisis_m2.php">Daya Pembeda Soal</a></li>
     <li><a href="analisis_m3.php">Hasil Analisis Soal</a></li>
    </ul>
   </li>
   <li class=""><a href="gallery.php?nip=<?php echo $nip; ?>"><i class="icon-camera"></i><span class="title">Gallery</span></a></li>
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