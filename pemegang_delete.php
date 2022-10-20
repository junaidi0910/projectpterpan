<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    $username = $_GET['username'];

    if (isset($username)) {
        $db_delete = db_pemegang_delete($username);
        redirect($site_url, 'pemegang.php');
    } else {
        redirect($site_url, 'pemegang.php');
    }
} else {
    redirect($site_url, 'login.php');
}
?>