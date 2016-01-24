<?php
  session_start();
  if(!isset($_SESSION['stat']))
  {
    ?>
	  <script type="text/javascript">
      alert("Maaf Harus Login Terlebih Dahulu");
      document.location='../../index.php';</script>
    <?php
  }
  include_once "../../lib_function.php";
  koneksi_db();
  include_once "desain_guru.php";
  $nip = $_SESSION['nip'];
  $sesi = $_SESSION['nama_guru'];
  $id_mp = $_SESSION['id_mp'];
  $nama_mp = $_SESSION['nama_mp'];
  $id_kelas = @$_GET['id_kelas'];
  $nis = @$_GET['nis'];
  
  $sql_kelas = "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
  $result_kelas = mysql_query($sql_kelas);
  $jmldata_kelas = mysql_num_rows($result_kelas);
  $data_kelas = mysql_fetch_object($result_kelas);
  
  $sql_siswa = "SELECT * FROM siswa JOIN kelas USING (id_kelas) WHERE id_kelas='$id_kelas' AND nis='$nis'";
  $result_siswa = mysql_query($sql_siswa);
  $jmldata_siswa = mysql_num_rows($result_siswa);
  $data_siswa = mysql_fetch_object($result_siswa);
  
  $sql_nilai = "SELECT * FROM tahun_ajaran JOIN kelas USING (id_tahun_ajaran) JOIN nilai ON kelas.id_kelas=nilai.id_kelas 
									JOIN ujian ON nilai.id_ujian=ujian.id_ujian 
				WHERE nilai.id_kelas='$id_kelas' AND nilai.nis='$nis' AND nilai.id_mp='$id_mp'";
  $result_nilai = mysql_query($sql_nilai);
  $jmldata_nilai = mysql_num_rows($result_nilai);
  $i = 0;
  
  if($_SESSION["stats"] != "guru")
  {
    ?>
	<script type="text/javascript">
    alert("Maaf Halaman Ini Hanya Untuk Guru");
    document.location='../../index.php';</script>
    <?php
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
<link rel="shortcut icon" href="../../gambar/icon.ico" />
</head>
<body class="fixed-top">
<div class="header navbar navbar-inverse navbar-fixed-top">

<!--AWAL HEADER-->
<div class="navbar-inner">
<div class="container-fluid">
<!--AWAL LOGO--><a class="brand" href="#">LMS SMA NEGERI 7 BANDUNG</a><!--AKHIR LOGO-->			
<ul class="nav pull-right">
<!--AWAL INFO USER LOGIN--><?php pengguna() ?><!--AKHIR INFO USER LOGIN-->
</ul>
</div>
</div>
</div>
<div class="page-container row-fluid">
<!--AWAL MENU UTAMA--><?php menu_utama() ?><!--AKHIR MENU UTAMA-->
<!--MULAI HALAMAN-->
<div class="page-content">
<!--AWAL KONFIGURASI FORM--><?php konfig_form() ?><!--AKHIR KONFIGURASI FORM-->
<div class="container-fluid">
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
<div class="span12">
<!--AWAL MENU TEMA <?php tema() ?> AKHIR MENU TEMA-->	
<h3 class="page-title">HALAMAN GURU</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> DAFTAR NILAI <?php echo $data_siswa -> nama_siswa; ?></h4>
	<!-- AWAL KONFIGURASI TAMBAHAN KONTEN -->
	<div class="tools"><a href="javascript:;" class="collapse" title="Sembunyikan Konten"></a></div>
    <!-- AKHIR KONFIGURASI TAMBAHAN KONTEN -->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
    </div>
    <a href="nilai_semester_ganjil.php?nis=<?php echo $nis; ?>&id_kelas=<?php echo $id_kelas; ?>" class="btn btn-success">Nilai Semester Ganjil</a>
    <a href="nilai_semester_genap.php?nis=<?php echo $nis; ?>&id_kelas=<?php echo $id_kelas; ?>" class="btn btn-success">Nilai Semester Genap</a>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NO</th>
	   <th>NAMA UJIAN</th>
	   <th>NILAI</th>
	   <th>TAHUN AJARAN</th>
	   <th>HAPUS NILAI</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
if($jmldata_nilai > 0)
{
 while($data_nilai = mysql_fetch_object($result_nilai))
 {
  $i++;
  ?>
  <tr class="">
   <td><center><?php echo $i; ?></center></td>
   <td><center><?php echo $data_nilai -> nama_ujian; ?></center></td>
   <td><center><?php echo $data_nilai -> info_nilai; ?></center></td>
   <td><center><?php echo $data_nilai -> nama_tahun_ajaran; ?></center></td>
   <td><center><a href="nilai_hapus.php?id_nilai=<?php echo $data_nilai -> id_nilai ?>&nis=<?php echo $nis; ?>&id_kelas=<?php echo $id_kelas; ?>">HAPUS</a></center></td>
  </tr>
  <?php
 }
}
else
{
 ?><tr><td align="center" colspan=4><center><b>TIDAK TERDAPAT NILAI</b></center></td></tr><?php
}
?>
     </tbody>
    </table>
   </div>
  </div>
 </div>
 
<div class="portlet-body">
<div class="tabbable portlet-tabs">
<div class="tab-content">
<div class="tab-pane active">
<p>
<table align="center" border=1 width=700>
<tr><td colspan=2 align="center"><b><center><big>LAPORAN NILAI SISWA</big></center></b></td></tr>
<tr><td align="center" width=120><img src="../../gambar/SMAN7bdg.jpg" width=100></td>
    <td align="center"><b>LAPORAN HASIL KEGIATAN UJIAN SEKOLAH DAN TRYOUT<br>
						  SEKOLAH MENENGAH ATAS NEGERI 7 BANDUNG</b><br><br>
						  Jalan Lengkong Kecil No. 53, Kec. Lengkong, Kel. Paledang, Bandung,<br>
						  Jawa Barat 40261, Indonesia</td></tr></table><br>
						  
<table align="center" width=700>
<?php
$sql_rapot = "SELECT * FROM siswa JOIN kelas USING (id_kelas) JOIN nilai USING (id_kelas) JOIN ujian USING (id_ujian) WHERE nilai.id_kelas='$id_kelas' AND nilai.nis='$nis' AND nilai.id_mp='$id_mp'";
$result_rapot = mysql_query($sql_rapot);
$jmldata_rapot = mysql_num_rows($result_rapot);
$data_rapot = mysql_fetch_object($result_rapot);
?>
<tr><td colspan=7></td></tr>
<tr><td align="left" width=130><b>Nomor Induk Siswa</b></td><td align="center">:</td><td><?php echo @$data_rapot -> nis; ?></td>
    <td width=220></td>
    <td align="left"><b>Nama Siswa</b></td><td align="center">:</td><td align="left"> <?php echo @$data_rapot -> nama_siswa; ?></td></tr>
<tr><td align="left"><b>Kelas</b></td><td align="center">:</td><td><?php echo @$data_rapot -> nama_kelas; ?></td>
    <td width=220></td>
    <td align="left"><b>Mata Pelajaran</b></td><td align="center">:</td><td align="left"> <?php echo $nama_mp; ?></td></tr>
</table><br>


<?php
$nilai_show = mysql_query("SELECT * FROM nilai
            LEFT JOIN siswa ON siswa.nis=nilai.nis
            LEFT JOIN mp ON mp.id_mp=nilai.id_mp
            LEFT JOIN ujian ON ujian.id_ujian=nilai.id_ujian
            LEFT JOIN kelas ON kelas.id_kelas=nilai.id_kelas
            WHERE siswa.nis     ='".$nis."'
            AND kelas.id_kelas  ='".$id_kelas."'
            AND nilai.id_mp     = '".$id_mp."'
            ") or die("gagal menampilkan nilai");
$data_nilai = array();
$uhs_ganjil = 0;
$uts_ganjil = 0;
$uas_ganjil = 0;

$uas_genap = 0;
$uts_genap = 0;
$uhs_genap = 0;
if( mysql_num_rows( $nilai_show ) ):
    $i=0;
    while( $data = mysql_fetch_array( $nilai_show ) ):
        $data_nilai[$data['id_ujian']] = $data['info_nilai'];        
        if( $i==0 )      $uhs_ganjil = $data['info_nilai'];
        else if( $i==1 ) $uts_ganjil = $data['info_nilai'];
        else if( $i==2 ) $uas_ganjil = $data['info_nilai'];
        else if( $i==3 ) $uhs_genap = $data['info_nilai'];
        else if( $i==4 ) $uts_genap = $data['info_nilai'];
        else if( $i==5 ) $uas_genap = $data['info_nilai'];
        $i++;
    endwhile;
endif;

//PERHITUNGAN NILAI
$kalkulasi_niai_ganjil = ( (2 * $uhs_ganjil) + $uts_ganjil + $uas_ganjil ) / 4;
if( $kalkulasi_niai_ganjil >= 90 && $kalkulasi_niai_ganjil<=100 ):
    $skala_nilai_ganjil = 4;
elseif( $kalkulasi_niai_ganjil >= 80 && $kalkulasi_niai_ganjil<=89 ):
    $skala_nilai_ganjil = 3.67;
elseif( $kalkulasi_niai_ganjil >= 70 && $kalkulasi_niai_ganjil<=79 ):
    $skala_nilai_ganjil = 3.33;
elseif( $kalkulasi_niai_ganjil >= 60 && $kalkulasi_niai_ganjil<=69 ):
    $skala_nilai_ganjil = 3;
elseif( $kalkulasi_niai_ganjil >= 50 && $kalkulasi_niai_ganjil<=59 ):
    $skala_nilai_ganjil = 2.67;
elseif( $kalkulasi_niai_ganjil >= 40 && $kalkulasi_niai_ganjil<=49 ):
    $skala_nilai_ganjil = 2.33;
elseif( $kalkulasi_niai_ganjil >= 30 && $kalkulasi_niai_ganjil<=39 ):
    $skala_nilai_ganjil = 2;
elseif( $kalkulasi_niai_ganjil >= 20 && $kalkulasi_niai_ganjil<=29 ):
    $skala_nilai_ganjil = 1.67;
else:
    $skala_nilai_ganjil = 1.33;
endif;

if( $skala_nilai_ganjil >= 3.67 && $skala_nilai_ganjil<=4 ):
    $index_nilai_ganjil = 'A';
elseif( $skala_nilai_ganjil >= 3.33 && $skala_nilai_ganjil<=3.67 ):
    $index_nilai_ganjil = 'A-';
elseif( $skala_nilai_ganjil >= 3 && $skala_nilai_ganjil<=3.33 ):
    $index_nilai_ganjil = 'B+';
elseif( $skala_nilai_ganjil >= 2.67 && $skala_nilai_ganjil<=3 ):
    $index_nilai_ganjil = 'B';
elseif( $skala_nilai_ganjil >= 2.33 && $skala_nilai_ganjil<=2.67 ):
    $index_nilai_ganjil = 'B-';
elseif( $skala_nilai_ganjil >= 2 && $skala_nilai_ganjil<=2.33 ):
    $index_nilai_ganjil = 'C+';
elseif( $skala_nilai_ganjil >= 1.67 && $skala_nilai_ganjil<=2 ):
    $index_nilai_ganjil = 'C';
else:
    $index_nilai_ganjil = 'C-';
endif;

$kalkulasi_niai_genap  = ( (2 * $uhs_genap) + $uts_genap + $uas_genap ) / 4;
if( $kalkulasi_niai_genap >= 90 && $kalkulasi_niai_genap<=100 ):
    $skala_nilai_genap = 4;
elseif( $kalkulasi_niai_genap >= 80 && $kalkulasi_niai_genap<=89 ):
    $skala_nilai_genap = 3.67;
elseif( $kalkulasi_niai_genap >= 70 && $kalkulasi_niai_genap<=79 ):
    $skala_nilai_genap = 3.33;
elseif( $kalkulasi_niai_genap >= 60 && $kalkulasi_niai_genap<=69 ):
    $skala_nilai_genap = 3;
elseif( $kalkulasi_niai_genap >= 50 && $kalkulasi_niai_genap<=59 ):
    $skala_nilai_genap = 2.67;
elseif( $kalkulasi_niai_genap >= 40 && $kalkulasi_niai_genap<=49 ):
    $skala_nilai_genap = 2.33;
elseif( $kalkulasi_niai_genap >= 30 && $kalkulasi_niai_genap<=39 ):
    $skala_nilai_genap = 2;
elseif( $kalkulasi_niai_genap >= 20 && $kalkulasi_niai_genap<=29 ):
    $skala_nilai_genap = 1.67;
else:
    $skala_nilai_genap = 1.33;
endif;

if( $skala_nilai_genap >= 3.67 && $skala_nilai_genap<=4 ):
    $index_nilai_genap = 'A';
elseif( $skala_nilai_genap >= 3.33 && $skala_nilai_genap<=3.67 ):
    $index_nilai_genap = 'A-';
elseif( $skala_nilai_genap >= 3 && $skala_nilai_genap<=3.33 ):
    $index_nilai_genap = 'B+';
elseif( $skala_nilai_genap >= 2.67 && $skala_nilai_genap<=3 ):
    $index_nilai_genap = 'B';
elseif( $skala_nilai_genap >= 2.33 && $skala_nilai_genap<=2.67 ):
    $index_nilai_genap = 'B-';
elseif( $skala_nilai_genap >= 2 && $skala_nilai_genap<=2.33 ):
    $index_nilai_genap = 'C+';
elseif( $skala_nilai_genap >= 1.67 && $skala_nilai_genap<=2 ):
    $index_nilai_genap = 'C';
else:
    $index_nilai_genap = 'C-';
endif;


$ujian_jenis = mysql_query("SELECT * FROM ujian WHERE ujian.id_ujian < 7") or die("gagal!");
if( mysql_num_rows( $ujian_jenis ) ):
    
    echo '<table align="center" width=700><tr><td>';
    $i=1;
    
    while( $data = mysql_fetch_array( $ujian_jenis ) ):
        if($i<=3):
            if( $i==1 ):
                echo '<div class="span4"><ul style="list-style-type:none;" class="pull-right">';
            endif;
            
            if( array_key_exists( $data['id_ujian'], $data_nilai ) ):
                echo '<li style="text-align:right;" ><b>'.$data['nama_ujian'].'</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$data_nilai[$data['id_ujian']].'</li>';
            else:
                echo '<li style="text-align:right;" ><b>'.$data['nama_ujian'].'</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;0</li>';
            endif;
            
            if( $i==3 ):
                echo '</ul></div>';
            endif;
        else:
            if( $i==4 ):
                echo '<div class="span8"><ul style="list-style-type:none;" class="pull-right">';
            endif;
            
            if( array_key_exists( $data['id_ujian'], $data_nilai ) ):
                echo '<li style="text-align:right;"><b>'.$data['nama_ujian'].'</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$data_nilai[$data['id_ujian']].'</li>';
            else:
                echo '<li style="text-align:right;" ><b>'.$data['nama_ujian'].'</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;0</li>';
            endif;
            
            if($i==6):
                echo '</ul></div>';
            endif;
        endif;
        $i++;
    endwhile;
    echo '</td></tr>
        <tr>
            <td>
                <div class="span4">
                    <ul style="list-style-type:none;" class="pull-right">
                        <li style="text-align:right;" ><b>Kalkulasi Nilai</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$kalkulasi_niai_ganjil.'</li>
                        <li style="text-align:right;" ><b>Skala</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$skala_nilai_ganjil.'</li>
                        <li style="text-align:right;" ><b>Index</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$index_nilai_ganjil.'</li>
                    </ul>
                </div>
                <div class="span8">
                    <ul style="list-style-type:none;" class="pull-right">
                        <li style="text-align:right;" ><b>Kalkulasi Nilai</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$kalkulasi_niai_genap.'</li>
                        <li style="text-align:right;" ><b>Skala</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$skala_nilai_genap.'</li>
                        <li style="text-align:right;" ><b>Index</b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$index_nilai_genap.'</li>
                    </u>
                </div>
            </td>
        </tr>
    </table>';
    
endif;
?>
</p><br>
</div>
</div>
</div>
</div>
   
</div>
</div>
</div>
<!--AWAL FOOTER--><?php foot() ?><!--AKHIR FOOTER-->
<?php jas() ?>
<!--UNTUK TABEL-->
<script>
jQuery(document).ready(function() {			
// initiate layout and plugins
App.setPage("table_editable");
App.init();
});
</script>
</body>
</html>
<?php
}
?>