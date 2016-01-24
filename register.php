<?php
include_once "lib_function.php";
koneksi_db();
include_once "desain.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
 if(@$_POST['Register'] == "Register")
 {
  $id_ortu = @$_POST['id_ortu'];
  $nama_ortu = strtoupper($_POST['nama_ortu']);
  $password = md5($_POST['password']);
  $status = $_POST['status'];
  $dispict = $_POST['dispict'];
  $nis = $_POST['nis'];
  $query = "INSERT INTO ortu VALUES ('$id_ortu','$nama_ortu','$password','$status','$dispict','$nis')";
  
  $result = mysql_query($query);
  if ($query)
  {
   ?>
   <script language="JavaScript">
   alert('Data Anda Berhasil Ditambahkan, Silahkan Login');
   document.location='logout.php';
   </script>
   <?php
  }
  else
  {
   ?>
   <script language="JavaScript">
   alert('Data Anda Telah Terdaftar, Silahkan Hubungi Admin Sekolah');
   window.history.back();
   </script>
   <?php
  }
 }
?>
<meta charset="utf-8" />
<title>LMS SMA NEGERI 7 BANDUNG</title>
<?php cess() ?>
<link rel="shortcut icon" href="gambar/icon.ico" />
</head>
<body class="login">
<div class="logo"></div>
<div class="content">
 <form method="post" action="register.php" class="form-vertical login-form">
  <h4 class="form-title"><center>FORM REGISTER ORANG TUA <br> LMS SMAN 7 BANDUNG</center></h4>
  <div class="alert alert-error hide">
   <button class="close" data-dismiss="alert"></button><span>Data Isian Tidak Valid</span>
  </div>
  <!--USERNAME-->
  <div class="control-group">
   <label class="control-label visible-ie8 visible-ie9">Username</label>
   <div class="controls">
    <div class="input-icon left"><i class="icon-user"></i>
     <input type="text" name="id_ortu" id='id_user' class="m-wrap placeholder-no-fix" placeholder="Username / ID Pengenal"/>
    </div>
   </div>
  </div>
  <!--USERNAME-->
  <div class="control-group">
   <label class="control-label visible-ie8 visible-ie9">Nama Pengguna</label>
   <div class="controls">
    <div class="input-icon left"><i class="icon-user"></i>
     <input type="text" name="nama_ortu" id='id_user' class="m-wrap placeholder-no-fix" style="text-transform:uppercase" placeholder="Nama Lengkap"/>
    </div>
   </div>
  </div>
  <!--PASSWORD-->
  <div class="control-group">
   <label class="control-label visible-ie8 visible-ie9">Password</label>
   <div class="controls">
    <div class="input-icon left"><i class="icon-lock"></i>
     <input name="password" type="password" class="m-wrap placeholder-no-fix" placeholder="Password"/>
    </div>
   </div>
  </div>
  <!--STATUS-->
  <div class="control-group">
   <div class="controls"><center>
	 Orang Tua Dari Siswa
     <select name="nis">
	  <?php
	  $sql_ls = "SELECT * FROM siswa ORDER BY nama_siswa ASC";
	  $result_ls = mysql_query($sql_ls);
	  $jmldata_ls = mysql_num_rows($result_ls);
	  
	  while($data_ls = mysql_fetch_object($result_ls))
	  {
	  ?>
	  <option value="<?php echo $data_ls -> nis; ?>"><?php echo $data_ls -> nama_siswa; ?></option>
	  <?php } ?>
	 </select><center>
	 <input type="hidden" name="status" value="ortu">
	 <input type="hidden" name="dispict" value="unknown.png">
   </div>
  </div>
  <!--TOMBOL LOGIN-->
  <div class="form-actions">
   <a href="index.php">
   <button type="button" id="back-btn" class="btn"><i class="m-icon-swapleft"></i> Kembali</button></a>
   <button type="submit" class="btn blue pull-right" name="Register" value="Register">Register &nbsp;&nbsp;<i class="m-icon-swapright m-icon-white"></i></button>
  </div>
 </form>
</div>
<div class="copyright">
 <center>2015 &copy; LMS SMA Negeri 7 Bandung</center>
<!--AWAL JAVASCRIPTS-->
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>  
<script src="assets/uniform/jquery.uniform.min.js"></script> 
<script src="assets/js/jquery.blockui.js"></script>
<script type="text/javascript" src="assets/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>