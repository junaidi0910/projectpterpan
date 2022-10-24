<?php

// config
include './config/config.php';

if ($ses_login === TRUE) {
    $username = $_GET['username'];

    if (isset($username)) {
        $db_delete = db_drivers_delete($username);
        redirect($site_url, 'drivers.php');
    } else {
        redirect($site_url, 'drivers.php');
    }
} else {
    redirect($site_url, 'login.php');
}
?>