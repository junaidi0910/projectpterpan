<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    // web view
    $site_title = 'ADMIN HOME';

    $site_error = '';
    $data_home = db_home_get_all();

    $create = $_POST['create'];

    if (isset($create)) {

        $no_transaksi = $_POST['no_transaksi'];
        $id_admin = $_POST['id_admin'];
        $id_kendaraan = $_POST['id_kendaraan'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];
        $jam_awal = $_POST['jam_awal'];
        $jam_akhir = $_POST['jam_akhir'];
        $id_kota_tujuan = $_POST['id_kota_tujuan'];
        $odometer_awal = $_POST['odometer_awal'];
        $odometer_akhir = $_POST['odometer_akhir'];
        
        $db_insert = db_home_insert_new($no_transaksi, $id_admin, $id_kendaraan, $tgl_pinjam, $tgl_kembali, $jam_awal, $jam_akhir, $id_kota_tujuan, $odometer_awal, $odometer_akhir);

        if ($db_insert === TRUE) {
            $site_error = '<div class="alert alert-success">Data berhasil ditambahkan !</div>';            
            // refresh query
            $data_drivers = db_home_get_all();
            header('location:home.php');
        } else {
            $site_error = '<div class="alert alert-danger">Data sudah digunakan!</div>';
        }
    }

    include './view/header.php';
    include './view/home.php';
    include './view/footer.php';
} else {
    redirect($site_url, 'login.php');
}
?>