<?php
require "koneksi.php";

if (isset($_POST['tambah_kereta']))
    mysqli_query($con, "insert into kereta values('{$_POST['kode']}','{$_POST['asal']}','{$_POST['tujuan']}','{$_POST['kelas']}','{$_POST['harga']}',
    '{$_POST['tanggal']}','{$_POST['waktu']}')");

else if (isset($_GET['hapus_kereta']))
    $con->query("delete from kereta where no='{$_GET['hapus_kereta']}'");

else if (isset($_POST['transaksi_kereta']))
    mysqli_query($con, "insert into transaksi values('{$no}','{$_POST['asal']}','{$_POST['tujuan']}','{$_POST['kelas']}',
    '{$_POST['harga']}','{$_POST['jml_pesan']}','{$_POST['tot_bayar']}',
    '{$_POST['diskon']}','{$_POST['tot_setdiskon']}','{$_POST['bayar']}',
    '{$_POST['kembalian']}')");

header("location:index.php");
?>
<?php
require "koneksi.php";

if (isset($_POST['tambah_pesan']))
    mysqli_query($con, "insert into pemesanan values('{$_POST['id_pesan']}','{$_POST['nama']}','{$_POST['atas_nama']}','{$_POST['usia']}',
    '{$_POST['no_kk']}','{$_POST['no_hp']}','{$_POST['tgl_pesan']}','{$_POST['jml_penumpang']}')");

else if (isset($_GET['hapus_pemesanan']))
    $con->query("delete from pemesanan where id_pesan='{$_GET['hapus_pemesanan']}'");

else if (isset($_POST['transaksi_pemesanan']))
    mysqli_query($con, "insert into transaksi values('{$no}','{$_POST['asal']}','{$_POST['tujuan']}','{$_POST['kelas']}',
    '{$_POST['harga']}','{$_POST['jml_pesan']}','{$_POST['tot_bayar']}',
    '{$_POST['diskon']}','{$_POST['tot_setdiskon']}','{$_POST['bayar']}',
    '{$_POST['kembalian']}')");

header("location:index_pemesanan.php");
?>