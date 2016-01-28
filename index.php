<?php
include_once "lib_function.php";
include_once "desain.php";

if(isset($_SESSION['stat']))
{
 header("location:halaman/halaman_".$_SESSION['stats'].".php");	
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>LMS SMA NEGERI 7 BANDUNG</title>
<?php cess() ?>
<link rel="shortcut icon" href="gambar/icon.ico" />
</head>
<body class="login">
<div class="logo"></div>
<div class="content">
 <form method="post" action="login.php" class="form-vertical login-form">
  <h4 class="form-title"><center>Login LMS SMAN 7 BANDUNG</center></h4>
  <div class="alert alert-error hide">
   <button class="close" data-dismiss="alert"></button><span>Input Username dan Password</span>
  </div>
  <!--USERNAME-->
  <div class="control-group">
   <label class="control-label visible-ie8 visible-ie9">Username</label>
   <div class="controls">
    <div class="input-icon left"><i class="icon-user"></i>
     <input type="text" name="id_user" id='id_user' class="m-wrap placeholder-no-fix" placeholder="Username"/>
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
   <label class="control-label visible-ie8 visible-ie9">Password</label>
   <div class="controls">
     <select name="status"/>
	  <option value="siswa">Siswa</option>
	  <option value="guru">Pengajar</option>
	  <option value="ortu">Orang Tua Siswa</option>
	 </select>
   </div>
  </div>
  <!--TOMBOL LOGIN-->
  <div class="form-actions">
   <a href="register.php">
   <button type="button" id="back-btn" class="btn"><i class="m-icon-swapleft"></i> Register</button></a>
   <button type="submit" class="btn green pull-right">Login &nbsp;&nbsp;<i class="m-icon-swapright m-icon-white"></i></button>
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
<?php
}
?>