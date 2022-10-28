<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    $id_kendaraan = $_GET['id_kendaraan'];

    if (isset($id_kendaraan)) {
        $db_delete = db_kendaraan_delete($id_kendaraan);
        redirect($site_url, 'kendaraan.php');
    } else {
        redirect($site_url, 'kendaraan.php');
    }
} else {
    redirect($site_url, 'login.php');
}
?>