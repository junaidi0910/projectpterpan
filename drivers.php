<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    // web view
    $site_title = 'DATA DRIVERS';
    $site_error = '';
    $data_drivers = db_drivers_get_all();

    $create = $_POST['create'];

    if (isset($create)) {

        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        // $divisi = $_POST['divisi'];
        $password = md5($_POST['password']);
        $db_insert = db_drivers_insert_new($username, $nama, $password, $telepon, $alamat);

        if ($db_insert === TRUE) {
            $site_error = '<div class="alert alert-success">Data berhasil ditambahkan !</div>';            
            // refresh query
            $data_pemegang = db_drivers_get_all();
        } else {
            $site_error = '<div class="alert alert-danger">NIP sudah di gunakan !</div>';
        }
    }

    include './view/header.php';
    include './view/drivers.php';
    include './view/footer.php';
} else {
    redirect($site_url, 'login.php');
}
?>