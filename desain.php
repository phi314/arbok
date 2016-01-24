<?php
function cess()
{
 ?>
 <meta content="width=device-width, initial-scale=1.0" name="viewport" />
 <meta content="" name="description" />
 <meta content="" name="author" />
 <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

 <link href="assets/css/metro.css" rel="stylesheet" />
 <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
 <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
 <link href="assets/css/style.css" rel="stylesheet" />
 <link href="assets/css/style_responsive.css" rel="stylesheet" />
 <link href="assets/css/style_default.css" rel="stylesheet" id="style_color" />
 <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
 <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
 <?php
}

function jas()
{
 ?>
 <script src="assets/js/jquery-1.8.3.min.js"></script>
 <script src="assets/breakpoints/breakpoints.js"></script>
 <script src="assets/bootstrap/js/bootstrap.min.js"></script>

 <script src="assets/js/jquery.blockui.js"></script>
 <script src="assets/js/jquery.cookie.js"></script>
	
 <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
 <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
 <script type="text/javascript" src="assets/js/jquery.pulsate.min.js"></script>
 <script src="assets/js/app.js"></script>		
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
 ?>
 <li class="dropdown user">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
   <img alt="" src="assets/img/avatar1_small.jpg" />
   <span class="username">Bob Nilson</span>
   <i class="icon-angle-down"></i>
  </a>
  <ul class="dropdown-menu">
   <li><a href="extra_profile.html"><i class="icon-user"></i> Profil</a></li>
   <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
  </ul>
</li>
 <?php
}

function menu_utama()
{
 ?>
 <div class="page-sidebar nav-collapse collapse">
  <ul>
   <li><div class="sidebar-toggler hidden-phone"></div></li>
   <li class="start "><a href="index.html"><i class="icon-home"></i> <span class="title">Dashboard</span></a></li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-bookmark-empty"></i><span class="title">UI Features</span><span class="arrow"></span></a>
    <ul class="sub">
     <li><a href="ui_general.html">General</a></li>
     <li><a href="ui_buttons.html">Buttons</a></li>
     <li><a href="ui_tabs_accordions.html">Tabs & Accordions</a></li>
     <li><a href="ui_sliders.html">Sliders</a></li>
     <li><a href="ui_tiles.html">Tiles</a></li>
     <li><a href="ui_typography.html">Typography</a></li>
     <li><a href="ui_tree.html">Tree View</a></li>
     <li><a href="ui_nestable.html">Nestable List</a></li>
    </ul>
   </li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-table"></i><span class="title">Form Stuff</span><span class="arrow "></span></a>
    <ul class="sub">
     <li><a href="form_layout.html">Form Layouts</a></li>
     <li><a href="form_samples.html">Advance Form Samples</a></li>
     <li><a href="form_component.html">Form Components</a></li>
     <li><a href="form_wizard.html">Form Wizard</a></li>
     <li><a href="form_validation.html">Form Validation</a></li>
     <li><a href="form_fileupload.html">Multiple File Upload</a></li>
     <li><a href="form_dropzone.html">Dropzone File Upload</a></li>
    </ul>
   </li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-th-list"></i><span class="title">Data Tables</span><span class="arrow "></span></a>
    <ul class="sub">
     <li ><a href="table_basic.html">Basic Tables</a></li>
     <li ><a href="table_managed.html">Managed Tables</a></li>
     <li ><a href="table_editable.html">Editable Tables</a></li>
    </ul>
   </li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-th-list"></i><span class="title">Portlets</span><span class="arrow "></span></a>
    <ul class="sub">
     <li><a href="portlet_general.html">General Portlets</a></li>
     <li><a href="portlet_draggable.html">Draggable Portlets</a></li>
    </ul>
   </li>
   <li class="has-sub "><a href="javascript:;"><i class="icon-map-marker"></i><span class="title">Maps</span><span class="arrow "></span></a>
    <ul class="sub">
     <li><a href="maps_google.html">Google Maps</a></li>
     <li><a href="maps_vector.html">Vector Maps</a></li>
    </ul>
   </li>
   <li class=""><a href="charts.html"><i class="icon-bar-chart"></i><span class="title">Visual Charts</span></a></li>
   <li class=""><a href="calendar.html"><i class="icon-calendar"></i><span class="title">Calendar</span></a></li>
   <li class=""><a href="gallery.html"><i class="icon-camera"></i><span class="title">Gallery</span></a></li>
   <li class=""><a href="gallery.html"><i class="icon-briefcase"></i><span class="title">Extra</span></a></li>
   <li class=""><a href="login.html"><i class="icon-user"></i><span class="title">Login Page</span></a></li>
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