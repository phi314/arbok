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
  
  $sql_absensi = "SELECT * FROM absensi ORDER BY tanggal ASC";
  $result_absensi = mysql_query($sql_absensi);
  $jmldata_absensi = mysql_num_rows($result_absensi);
  $i = 0;
  
  if($_SESSION["stats"] != "guru")
  {
    ?>
	<script type="text/javascript">
    alert("Maaf Halaman Ini Hanya Untuk Administrator");
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
<h3 class="page-title">HALAMAN ADMINISTRATOR</h3>
</div>
</div>
<!--AKHIR HEADER-->

<!--AWAL KONTEN-->
<div class="row-fluid ">
 <div class="span12"><!--PANJANG TABEL-->
  <div class="portlet box blue"> <!--WARNA TABEL-->
   <div class="portlet-title">
    <h4><i class="icon-edit"></i> MONITORING ABSENSI</h4>
	<!--AWAL KONFIGURASI TAMBAHAN KONTEN
    AKHIR KONFIGURASI TAMBAHAN KONTEN-->
   </div>
   <div class="portlet-body">

       <div class="row-fluid">
           <div class="span3">
               <form action="">
                   <div class="form-group">
                       <label>Tingkat</label>
                       <select name="tingkat" class="form-control">
                           <option>X</option>
                           <option>XI</option>
                           <option>XII</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label>Nama Kelas</label>
                       <select name="kelas" class="form-control">
                           <option value="empty">-Pilih Kelas--</option>
                       <?php
                            $q_kelas = mysql_query("SELECT * FROM kelas ORDER BY nama_kelas ASC");
                            while($data_kelas = mysql_fetch_object($q_kelas)):
                        ?>
                            <option value="<?php echo $data_kelas->id_kelas; ?>"><?php echo $data_kelas->nama_kelas; ?></option>
                       <?php
                            endwhile;
                       ?>


                       </select>
                   </div>
                   <div class="form-group">
                       <label>Bulan</label>
                       <select name="bulan" class="form-control">
                           <option value="01">Januari</option>
                           <option value="02">Februari</option>
                           <option value="03">Maret</option>
                           <option value="04">April</option>
                           <option value="05">Mei</option>
                           <option value="06">Juni</option>
                           <option value="07">Juli</option>
                           <option value="08">Agustus</option>
                           <option value="09">September</option>
                           <option value="10">Oktober</option>
                           <option value="11">November</option>
                           <option value="12">Desember</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label>Tahun</label>
                       <select name="tahun" class="form-control">
                           <option>2016</option>
                           <option>2015</option>
                       </select>
                   </div>
                   <button class="btn btn-primary">Kirim</button>
               </form>
           </div>
           <?php
                if(!empty($_GET['bulan']) AND !empty($_GET['kelas']) AND !empty($_GET['tahun']))
                {
                    $bulan = $_GET['bulan'];
                    $tingkat = $_GET['tingkat'];
                    $kelas = $_GET['kelas'];
                    $tahun = $_GET['tahun'];

           ?>
               <div class="span9">
                   <?php
                        $jumlah_hadir = 0;
                        $jumlah_sakit = 0;
                        $jumlah_izin = 0;
                        $nama_kelas = "";

                        if($kelas == 'empty')
                        {
                            $q_jumlah_absensi = mysql_query("SELECT absensi_detail.id,  absensi_detail.absen
                                                    FROM absensi
                                                    JOIN absensi_detail ON absensi_detail.id_absensi=absensi.id
                                                    JOIN siswa ON siswa.nis=absensi_detail.nis_siswa
                                                    JOIN kelas ON kelas.id_kelas=siswa.id_kelas
                                                    WHERE MONTH(absensi.tanggal) = '$bulan'
                                                    AND YEAR(absensi.tanggal) = '$tahun'
                                                    AND kelas.tingkat = '$tingkat'");
                        }
                        else
                        {
                            $q_jumlah_absensi = mysql_query("SELECT absensi_detail.id,  absensi_detail.absen
                                                    FROM absensi
                                                    JOIN absensi_detail ON absensi_detail.id_absensi=absensi.id
                                                    JOIN siswa ON siswa.nis=absensi_detail.nis_siswa
                                                    JOIN kelas ON kelas.id_kelas=siswa.id_kelas
                                                    WHERE MONTH(absensi.tanggal) = '$bulan'
                                                    AND YEAR(absensi.tanggal) = '$tahun'
                                                    AND kelas.id_kelas = '$kelas'");

                            $q_detail_kelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$kelas' LIMIT 1");
                            $d_detail_kelas = mysql_fetch_object($q_detail_kelas);
                            $nama_kelas = $d_detail_kelas->nama_kelas;
                        }



                        while($data = mysql_fetch_object($q_jumlah_absensi))
                        {
                            if($data->absen == 'hadir')
                            {
                                $jumlah_hadir++;
                            }
                            elseif($data->absen == 'sakit')
                            {
                                $jumlah_sakit++;
                            }
                            elseif($data->absen == 'izin')
                            {
                                $jumlah_izin++;
                            }
                        }

                   ?>
                   <h3><?php echo $kelas == 'empty' ? "Tingkat: ".$tingkat : "Kelas: ".$nama_kelas; ?><?php echo "<br>Bulan: ".getBulan($bulan)."<br>Tahun: ".$tahun; ?></h3>

                    <table class="table table-striped table-hover table-bordered" id="sample_editable_2">
                        <thead>
                        <tr>
                            <th>Jumlah Sakit</th>
                            <th>Jumlah Izin</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $jumlah_sakit; ?></td>
                            <td><?php echo $jumlah_izin; ?></td>
                        </tr>
                        </tbody>
                    </table>
               </div>



                    <div class="row-fluid">
                        <div class="span12">
                            <?php
                            if($kelas == 'empty')
                            {
                                $q_siswa = mysql_query("SELECT nis, nama_siswa, nama_kelas FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE kelas.tingkat='$tingkat'");
                            }
                            else
                            {
                                $q_siswa = mysql_query("SELECT nis, nama_siswa, nama_kelas FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE kelas.id_kelas='$kelas'");
                            }

                            ?>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <?php
                                    $array_absensi = [];
                                    $q_absensi = mysql_query("SELECT id, tanggal FROM absensi WHERE MONTH(absensi.tanggal) = '$bulan' AND YEAR(absensi.tanggal) = '$tahun'");
                                    while($data_col_absensi = mysql_fetch_object($q_absensi)):
                                        $array_absensi[] = $data_col_absensi->id;
                                        ?>
                                        <th><?php echo $data_col_absensi->tanggal; ?></th>
                                    <?php
                                    endwhile;
                                    ?>
                                    <th>H</th>
                                    <th>S</th>
                                    <th>I</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while($data_siswa = mysql_fetch_object($q_siswa)): ?>
                                    <tr>
                                        <td><?php echo $data_siswa->nis; ?></td>
                                        <td><?php echo $data_siswa->nama_siswa; ?></td>
                                        <?php
                                        $h = 0;
                                        $s = 0;
                                        $i = 0;
                                        foreach($array_absensi as $absensi):
                                            $q_detail_absensi_siswa = mysql_query("SELECT absen FROM absensi_detail WHERE nis_siswa='$data_siswa->nis' AND id_absensi='$absensi' LIMIT 1");
                                            if(mysql_num_rows($q_detail_absensi_siswa) > 0):
                                                $data_detail_absensi_siswa = mysql_fetch_object($q_detail_absensi_siswa);
                                                if($data_detail_absensi_siswa->absen == 'hadir')
                                                {
                                                    $h++;
                                                }
                                                elseif($data_detail_absensi_siswa->absen == 'sakit')
                                                {
                                                    $s++;
                                                }
                                                elseif($data_detail_absensi_siswa->absen == 'izin')
                                                {
                                                    $i++;
                                                }
                                                ?>
                                                <td><?php echo $data_detail_absensi_siswa->absen == 'hadir' ? "" : $data_detail_absensi_siswa->absen; ?></td>
                                            <?php else: ?>
                                                <td></td>
                                            <?php endif; ?>
                                        <?php
                                        endforeach;
                                        ?>
                                        <td><?php echo $h; ?></td>
                                        <td><?php echo $s; ?></td>
                                        <td><?php echo $i; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
           <?php }; ?>



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

    $('#sample_editable_1').dataTable({
        "iDisplayLength": 150
    });

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