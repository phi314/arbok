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
  
  
  $sql_soal = "SELECT * FROM analisis JOIN soal USING (id_soal) WHERE analisis.id_soal=soal.id_soal AND soal.id_mp='$id_mp' GROUP BY analisis.id_soal";
  $result_soal = mysql_query($sql_soal);
  $jmldata_soal = mysql_num_rows($result_soal);
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
    <h4><i class="icon-edit"></i> ANALISIS DAYA PEMBEDA SOAL</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">
    <div class="clearfix">
    </div>
    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
     <thead>
      <tr>
       <th>NO</th>
       <th>SOAL</th>
	   <th>JUMLAH PESERTA</th>
	   <th>JAWABAN BENAR</th>
	   <th>JAWABAN SALAH</th>
	   <th>DAYA PEMBEDA</th>
	   <th>ANALISIS SOAL</th>
	  </tr>
	 </thead>
	 <tbody>
<?php
$query_total = mysql_query("select ROUND(0.27*count(nis)) as total from skor_analisis_tingkat_kesukaran group by id_ujian") or die("gagal mengambil total data!!!");
if( mysql_num_rows( $query_total ) )
{
  
  while( $total = mysql_fetch_array( $query_total ) ):
  
      $query_tampil = mysql_query("
        SELECT
         z.id_soal,
         (SELECT COUNT(k.nis) FROM skor_analisis_tingkat_kesukaran k WHERE k.id_ujian=z.id_ujian) AS jumlah_peserta,
         soal.isi_soal,
         z.id_ujian,
         z.benar_wh+xx.benar_wl AS benar,
         z.wh+xx.wl as salah,
         xx.wl,
         z.wh,
         (xx.wl-z.wh) AS wlwh,
         ROUND((xx.wl-z.wh)/".$total['total'].", 2) AS dp,
         (CASE
           WHEN ROUND((xx.wl-z.wh)/".$total['total'].", 2) >= 0.4 THEN 'baik'
           WHEN ROUND((xx.wl-z.wh)/".$total['total'].", 2) >= 0.3 AND ROUND((xx.wl-z.wh)/".$total['total'].", 2) <= 0.39 THEN 'cukup baik'
           WHEN ROUND((xx.wl-z.wh)/".$total['total'].", 2) >= 0.2 AND ROUND((xx.wl-z.wh)/".$total['total'].", 2) <= 0.29 THEN 'cukup'
           ELSE 'harus diganti'
         END) AS kata_dp
        FROM
        (
        SELECT 
          a.id_soal,
          a.id_ujian,
          SUM(a.benar) AS benar_wh,
          SUM(a.salah) AS wh
        FROM analisis_tingkat_kesukaran a
        JOIN (SELECT * FROM skor_analisis_tingkat_kesukaran GROUP BY id_ujian,nis ORDER BY skor DESC LIMIT 0,".$total['total'].") b ON a.nis=b.nis AND a.id_ujian=b.id_ujian
        GROUP BY a.id_ujian,a.id_soal
        ) z
        LEFT JOIN
        (
        SELECT 
          a.id_soal,
          a.id_ujian,
          SUM(a.benar) AS benar_wl,
          SUM(salah) AS wl
        FROM analisis_tingkat_kesukaran a
        JOIN (SELECT * FROM skor_analisis_tingkat_kesukaran GROUP BY id_ujian,nis ORDER BY skor ASC LIMIT 0,".$total['total'].") b ON a.nis=b.nis AND a.id_ujian=b.id_ujian
        GROUP BY a.id_ujian,a.id_soal
        ) xx ON z.id_soal=xx.id_soal
        LEFT JOIN soal ON z.id_soal=soal.id_soal
      ") or die("gagal menampilkan data pembeda!!!");
     if( mysql_num_rows( $query_tampil ) ): 
         while($data_soal = mysql_fetch_object($query_tampil))
         {
          $i++;
          ?>
          <tr class="">
           <td><center><?php echo $i; ?></center></td>
           <td><center><?php echo $data_soal -> isi_soal; ?></center></td>
           <td><center><?php echo $data_soal->jumlah_peserta; ?> Peserta</center></td>
           <td><center><?php echo $data_soal->benar; ?></center></td>
           <td><center><?php echo $data_soal->salah; ?></center></td>
           <td><center><?php echo $data_soal->dp; ?></center></td>
           <td><center><?php 
            if( $data_soal->kata_dp == 'baik' ):
                echo '<font color="green"><b>Baik</b></font>';
            elseif( $data_soal->kata_dp == 'cukup baik' ):
                echo '<font color="green"><b>Cukup Baik</b></font>';
            elseif( $data_soal->kata_dp == 'cukup' ):
                echo '<font color="green"><b>Cukup Baik</b></font>';
            else:
                echo '<font color="red"><b>Harus Diganti</b></font>';
            endif;
           ?></center></td>
          </tr>
          <?php
         }
      else:
       echo '<tr><td align="center" colspan=11><center><b>Belum Teranalisis</b></center></td></tr>';
      endif;
    endwhile;
}
else
{
 ?><tr><td align="center" colspan=11><center><b>Belum Teranalisis</b></center></td></tr><?php
}
?>
     </tbody>
    </table>
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