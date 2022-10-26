<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    // web view
    $site_title = 'DATA KENDARAAN';
    $site_error = '';
    $data_kendaraan = db_kendaraan_get_all();
    // $data_kendaraan_kosong=db_kendaraan_get_kosong();
    
    $create = $_POST['create'];

    if (isset($create)) {

        $id_kendaraan = $_POST['id_kendaraan'];
        $nama_kendaraan = $_POST['nama_kendaraan'];
        $no_pol = $_POST['no_pol'];
        $no_mesin = $_POST['no_mesin'];
        $no_rangka = $_POST['no_rangka'];
        $merk = $_POST['merk'];
        $warna = $_POST['warna'];
        
        // if ($pemegang_id == ''){
        //     $pemegang_id = 'NULL';
        // }
        // else{
        //     $pemegang_id = "'".$pemegang_id."'";            
        // }
        
        $db_insert = db_kendaraan_insert_new($id_kendaraan, $nama_kendaraan, $no_pol, $no_mesin,$no_rangka, $merk, $warna);

        if ($db_insert === TRUE) {
            $site_error = '<div class="alert alert-success">Data berhasil ditambahkan !</div>';            
            // refresh query
            $data_kendaraan = db_kendaraan_get_all();
            header('location:kendaraan.php');
        } else {
            $site_error = '<div class="alert alert-danger">Pemegang sudah memiliki kendaraan lain !</div>';
        }
    }

    include './view/header.php';
    include './view/kendaraan.php';
    include './view/footer.php';
} else {
    redirect($site_url, 'login.php');
}
?>