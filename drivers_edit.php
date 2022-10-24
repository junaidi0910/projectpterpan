<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    $username = $_GET['username'];

    if (isset($username)) {
        $site_title = 'EDIT DATA';
        $site_id = $username;
        $site_error = '';
        $data = db_drivers_get_row_by_id($username);

        $update = $_POST['update'];

        if (isset($update)) {
            $username = $_POST['username'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];
            // $divisi = $_POST['divisi'];

            $db_update = db_drivers_update_by_id($username, $nama, $telepon, $alamat);

            if ($db_update === TRUE) {
                redirect($site_url, 'drivers.php');
            } else {
                $site_error = '<div class="alert alert-danger">Kesalahan dalam database !</div>';
            }
        }


        include './view/header.php';
        include './view/drivers_edit.php';
        include './view/footer.php';
    } else {
        redirect($site_url, 'drivers.php');
    }
} else {
    redirect($site_url, 'login.php');
}
?>