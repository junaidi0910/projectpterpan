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

        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $db_insert = db_pemegang_insert_new($nip, $nama, $alamat, $telepon);

        if ($db_insert === TRUE) {
            $site_error = '<div class="alert alert-success">Data berhasil ditambahkan !</div>';            
            // refresh query
            $data_pemegang = db_pemegang_get_all();
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