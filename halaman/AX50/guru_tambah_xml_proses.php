<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
// menggunakan class phpExcelReader
include_once "excel_reader2.php";

// koneksi ke mysql
include_once "../../lib_function.php";
koneksi_db();

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data nip (kolom ke-1)
  $nip = $data->val($i, 1);
  // membaca data nama (kolom ke-2)
  $nama_guru = $data->val($i, 2);
  // membaca data jenis kelamin (kolom ke-3)
  $jklamin_guru = $data->val($i, 3);
  // membaca data password (kolom ke-4)
  $password = md5($data->val($i, 4));
  // membaca data email (kolom ke-5)
  $email = $data->val($i, 5)."@domain.com";
  // membaca data dispict (kolom ke-6)
  $dispict = $data->val($i, 6);
  // membaca data status (kolom ke-7)
  $status = $data->val($i, 7);
  // membaca data id kelas (kolom ke-8)
  $id_mp = $data->val($i, 8);

  // setelah data dibaca, sisipkan ke dalam tabel guru
  $query = "INSERT INTO guru VALUES ('$nip','$nama_guru','$jklamin_guru','$password','$email','$dispict','$status','$id_mp')";
  $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";

?>
<br />
<a href="guru.php">kembali</a>
</body>
</html>