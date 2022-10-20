<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    // web view
    $site_title = 'DATA PEMEGANG';
    $site_error = '';
    $data_pemegang = db_pemegang_get_all();

    $create = $_POST['create'];

    if (isset($create)) {

        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $divisi = $_POST['divisi'];
        $password = md5($_POST['password']);
        $db_insert = db_pemegang_insert_new($username, $nama, $password, $telepon, $alamat, $divisi);

        if ($db_insert === TRUE) {
            $site_error = '<div class="alert alert-success">Data berhasil ditambahkan !</div>';            
            // refresh query
            $data_pemegang = db_pemegang_get_all();
        } else {
            $site_error = '<div class="alert alert-danger">'+mysql_error()+'</div>';
            mysql_error();
        }
        // echo $username;
    }

    include './view/header.php';
    include './view/pemegang.php';
    include './view/footer.php';
} else {
    redirect($site_url, 'login.php');
}
?>