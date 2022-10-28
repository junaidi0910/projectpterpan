<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    $id = $_GET['id_kendaraan'];

    if (isset($id)) {
        $site_title = 'EDIT DATA';
        $site_id = $id;
        $site_error = '';
        $data = db_kendaraan_get_row_by_id($id);

        $update = $_POST['update'];

        if (isset($update)) {
            $id_kendaraan = $_POST['id_kendaraan'];
        $nama_kendaraan = $_POST['nama_kendaraan'];
        $no_pol = $_POST['no_pol'];
        $no_mesin = $_POST['no_mesin'];
        $no_rangka = $_POST['no_rangka'];
        $merk = $_POST['merk'];
        $warna = $_POST['warna'];

            // if ($pemegang_id == '') {
            //     $pemegang_id = 'NULL';
            // } else {
            //     $pemegang_id = "'" . $pemegang_id . "'";
            // }

            $db_update = db_kendaraan_update_by_id($id_kendaraan, $nama_kendaraan, $no_pol, $no_mesin,$no_rangka, $merk, $warna);

            if ($db_update === TRUE) {
                redirect($site_url, 'kendaraan.php');
            } else {
                $site_error = '<div class="alert alert-danger">Pemegang sudah memiliki kendaraan lain !</div>';
            }
        }


        include './view/header.php';
        include './view/kendaraan_edit.php';
        include './view/footer.php';
    } else {
        redirect($site_url, 'kendaraan.php');
    }
} else {
    redirect($site_url, 'login.php');
}
?>