<?php

// konfigurasi database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_base = 'bps';

// koneksi database
@mysql_connect($db_host, $db_user, $db_pass) or die('Tidak terhubung ke MySQL : ' . mysql_error());
@mysql_select_db($db_base) or die('Tidak terhubung ke Database : ' . mysql_error());

// fungsi database
function db_login_check($username, $password) {
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $query = mysql_query($sql);
    $query_num_row = mysql_num_rows($query);

    if ($query_num_row > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function db_login_get_nama($username) {
    $sql = "SELECT admin.nama FROM admin WHERE admin.username='$username'";
    $query = mysql_query($sql);
    $query_row = mysql_fetch_array($query);

    return $query_row['nama'];
}

function db_login_get_role($role) {
    $sql = "SELECT admin.role FROM admin WHERE admin.username='$role'";
    $query = mysql_query($sql);
    $query_row = mysql_fetch_array($query);

    return $query_row['role'];
}

function db_admin_get_profil($username) {
    $sql = "SELECT * FROM admin WHERE admin.username = '$username'";
    $query = mysql_query($sql);
    $query_row = mysql_fetch_array($query);

    return $query_row;
}

function db_admin_update_profile($username, $password, $nama, $telepon) {
    if ($_POST['password']=='') {
        $sql = "UPDATE admin SET "
            . "nama = '$nama', "
            . "telepon = '$telepon' "
            . "WHERE username = '$username'";
            $query = mysql_query($sql) or die('Database error : ' . mysql_error());
    }else{
        $sql = "UPDATE admin SET "
            . "password = '$password', "
            . "nama = '$nama', "
            . "telepon = '$telepon' "
            . "WHERE username = '$username'";
            $query = mysql_query($sql) or die('Database error : ' . mysql_error());
    }
    
    

    return $query;
}

function db_pemegang_get_all() {
    $sql = "SELECT * FROM admin where role='karyawan'";
    $query = mysql_query($sql);

    return $query;
}

function db_drivers_get_all() {
    $sql = "SELECT * FROM drivers";
    $query = mysql_query($sql);

    return $query;
}

function db_pemegang_check_nip($data) {
    $sql = "SELECT * FROM admin WHERE username = '$data'";
    $query = mysql_query($sql) or die('Database error : ' . mysql_error());
    $query_num = mysql_num_rows($query);

    return $query_num;
}

function db_pemegang_insert_new($username, $nama, $password, $telepon, $alamat, $divisi) {
    $sql = "INSERT INTO admin(username, password, nama, telepon, role, divisi, alamat) VALUES ('$username','$password','$nama','$telepon', 'karyawan', '$divisi', '$alamat')";
    $query = mysql_query($sql);

    return $query;
}

function db_pemegang_delete($username) {
    $sql = "DELETE FROM admin WHERE username='$username'";
    // $sql2 = "UPDATE kendaraan SET pemegang_id = NULL WHERE pemegang_id = '$id'";

    $query = mysql_query($sql);
    // $query2 = mysql_query($sql2);

    return $query;
}

function db_pemegang_get_row_by_id($username) {
    $sql = "SELECT * FROM admin WHERE username='$username'";
    $query = mysql_query($sql);
    $query_row = mysql_fetch_array($query);

    return $query_row;
}

function db_kendaraan_get_row_by_id($id) {
    $sql = "SELECT * FROM kendaraan WHERE id='$id'";
    $query = mysql_query($sql);
    $query_row = mysql_fetch_array($query);

    return $query_row;
}

function db_kendaraan_get_row_by_pemegang_id($id) {
    $sql = "SELECT * FROM kendaraan WHERE pemegang_id='$id'";
    $query = mysql_query($sql);
    $query_row = mysql_fetch_array($query);

    return $query_row;
}

function db_pemegang_update_by_id($username, $nama, $telepon, $alamat, $divisi) {
    $sql = "UPDATE admin SET "
            // . "username = '$username', "
            . "nama = '$nama', "
            . "alamat = '$alamat', "
            . "telepon = '$telepon', "
            . "divisi = '$divisi'"
            . "WHERE username = '$username'";
    $query = mysql_query($sql);

    return $query;
}

function db_kendaraan_update_by_id($id, $nik, $nama, $nopol, $anggaran, $pemegang_id) {
    $sql = "UPDATE kendaraan SET "
            . "nik = '$nik', "
            . "nama = '$nama', "
            . "nopol = '$nopol', "
            . "anggaran = '$anggaran', "
            . "pemegang_id = $pemegang_id "
            . "WHERE id = '$id'";
    $query = mysql_query($sql);

    return $query;
}

function db_biaya_get_all() {
    $sql = "SELECT * FROM biaya ORDER BY id DESC";
    $query = mysql_query($sql);

    return $query;
}
function db_cek_data($bln,$thn) {
    $sql = "SELECT * FROM view_biaya WHERE MONTH(tanggal) = '$bln' AND YEAR(tanggal) = '$thn'";
    $query = mysql_query($sql);

    return $query;
}
function db_cek_data_pertahun($thn) {
    $sql = "SELECT * FROM view_biaya WHERE YEAR(tanggal) = '$thn'";
    $query = mysql_query($sql);

    return $query;
}
function db_cek_data_pertahun_karyawan($nip,$thn) {
    $sql = "SELECT * FROM view_biaya WHERE nip = '$nip' AND YEAR(tanggal) = '$thn' GROUP BY MONTH(tanggal)";
    $query = mysql_query($sql);

    return $query;
}
function db_cek_data_pegawai($id,$bln,$thn) {
    $sql = "SELECT * FROM view_biaya WHERE nip = '$id' AND MONTH(tanggal) = '$bln' AND YEAR(tanggal) = '$thn'";
    $query = mysql_query($sql);

    return $query;
}
function db_cek_data_pegawai_thn($id,$thn) {
    $sql = "SELECT * FROM view_biaya WHERE nip = '$id' AND YEAR(tanggal) = '$thn'";
    $query = mysql_query($sql);

    return $query;
}
function format_poe($tgl=null){
    $sebulan = array("JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");
    $tgl1 = date('w',strtotime($tgl));
    $hari = $sebulan[$tgl1];
    return $hari;
}
function bulan($bulan){
Switch ($bulan){
    case 1 : $bulan="Januari";
        Break;
    case 2 : $bulan="Februari";
        Break;
    case 3 : $bulan="Maret";
        Break;
    case 4 : $bulan="April";
        Break;
    case 5 : $bulan="Mei";
        Break;
    case 6 : $bulan="Juni";
        Break;
    case 7 : $bulan="Juli";
        Break;
    case 8 : $bulan="Agustus";
        Break;
    case 9 : $bulan="September";
        Break;
    case 10 : $bulan="Oktober";
        Break;
    case 11 : $bulan="November";
        Break;
    case 12 : $bulan="Desember";
        Break;
    }
return $bulan;
}
function db_cek_bbm($thn) {
    $sql = "SELECT * FROM view_biaya WHERE YEAR(tanggal) = '$thn' AND jenis = 'Bahan Bakar'";
    $query = mysql_query($sql);
    return $query;
}

function db_cetak_perbulan_all($month, $year) {
    $sql = "SELECT * FROM view_biaya WHERE MONTH(tanggal) = '$month' AND YEAR(tanggal) = '$year' GROUP BY nip";
    $query = mysql_query($sql);
    return $query;
}
function db_cetak_pertahun_all($year) {
    $sql = "SELECT * FROM view_biaya WHERE YEAR(tanggal) = '$year' GROUP BY nip";
    $query = mysql_query($sql);
    return $query;
}
function db_cetak_biaya($nip,$month, $year) {
    $sql = "SELECT SUM(biaya) as totbiaya FROM view_biaya WHERE nip = '$nip' AND MONTH(tanggal) = '$month' AND YEAR(tanggal) = '$year'";
    $query = mysql_query($sql);
    return $query;
}
function db_cetak_biaya_pertahun($nip,$year) {
    $sql = "SELECT SUM(biaya) as totbiaya FROM view_biaya WHERE nip = '$nip' AND YEAR(tanggal) = '$year'";
    $query = mysql_query($sql);
    return $query;
}
function db_cetak_biaya_pertahun_bln($nip,$year,$bln) {
    $sql = "SELECT SUM(biaya) as totbiaya FROM view_biaya WHERE nip = '$nip' AND YEAR(tanggal) = '$year' AND MONTH(tanggal) ='$bln'";
    $query = mysql_query($sql);
    return $query;
}
function db_cek_kendaraan($nip) {
    $sql = "SELECT * FROM pemegang JOIN kendaraan ON pemegang.id = kendaraan.pemegang_id WHERE pemegang.nip = '$nip'";
    $query = mysql_query($sql);
    return $query;
}
function db_kendaraan_get_kosong(){
    $sql="SELECT * FROM kendaraan WHERE kendaraan.pemegang_id is null";
    $query=mysql_query($sql);
    
    return $query;
}

function db_kendaraan_get_all() {
          $sql = "SELECT * FROM kendaraan WHERE kendaraan.pemegang_id is not null";
    $query = mysql_query($sql);
    return $query;  
}


function db_kendaraan_insert_new($nik, $nama, $nopol, $anggaran, $pemegang_id) {
    $sql = "INSERT INTO kendaraan(nik, nama, nopol, anggaran, pemegang_id) VALUES ('$nik','$nama','$nopol','$anggaran',$pemegang_id)";
    $query = mysql_query($sql);

    return $query;
}

function db_biaya_delete($id) {
    $sql = "DELETE FROM biaya WHERE id='$id'";
    $query = mysql_query($sql);

    return $query;
}

function db_kendaraan_delete($id) {
    $sql = "DELETE FROM kendaraan WHERE id='$id'";
    $query = mysql_query($sql);

    return $query;
}

function db_kendaraan_get_nama_pemegang($id) {
    $sql = "SELECT * FROM pemegang WHERE id='$id'";
    $query = mysql_query($sql);
    $query_row = mysql_fetch_array($query);

    return $query_row;
}

function db_pemegang_check_nama($nama) {
    $sql = "SELECT * FROM pemegang WHERE nama LIKE '$nama' OR nip LIKE '$nama' ORDER BY nama ASC LIMIT 0,4";
    $query = mysql_query($sql);

    return $query;
}

function db_kendaraan_get_by_pemegang($id) {
    $sql = "SELECT * FROM kendaraan WHERE pemegang_id='$id'";
    $query = mysql_query($sql);

    return $query;
}

function db_biaya_add($tanggal,$jenis,$biaya,$jumlah,$keterangan,$pemegang_id,$kendaraan_id) {
    $sql = "INSERT INTO `biaya`"
            . "(`tanggal`, `jenis`, `biaya`, `jumlah`, `keterangan`, `pemegang_id`, `kendaran_id`) "
            . "VALUES ('$tanggal','$jenis','$biaya','$jumlah','$keterangan','$pemegang_id','$kendaraan_id')";
    $query = mysql_query($sql) or die(mysql_error());

    return $query;
}

function db_biaya_get_all_add($id, $bulan, $tahun) {
    $sql = "SELECT
  biaya.*
FROM biaya
WHERE biaya.pemegang_id = $id AND MONTH(biaya.tanggal) = $bulan AND YEAR(biaya.tanggal) = $tahun";
    $query = mysql_query($sql);

    return $query;
}

function db_biaya_get_current_biaya_year($id) {
    $year = date('Y');
    $sql = "SELECT
    SUM(biaya.biaya) AS jumlah
    FROM biaya
    WHERE biaya.pemegang_id = $id AND year(biaya.tanggal) = $year";

    $query = mysql_query($sql);
    $query_row = mysql_fetch_array($query);

    return $query_row['jumlah'];
}

function db_kendaraan_get_id_by_pemegang_id($id) {
    $sql = "SELECT
  kendaraan.id as id_kendaraan,
  pemegang.id
FROM kendaraan
  INNER JOIN pemegang
    ON kendaraan.pemegang_id = pemegang.id
WHERE pemegang.id = '$id'";

    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);

    return $row['id_kendaraan'];
}

function db_kendaraan_get_nama_by_pemegang_id($id) {
    $sql = "SELECT
  kendaraan.nama,
  pemegang.id
FROM kendaraan
  INNER JOIN pemegang
    ON kendaraan.pemegang_id = pemegang.id
WHERE pemegang.id = $id";

    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);

    return $row['nama'];
}

function db_kendaraan_get_nopol_by_pemegang_id($id) {
    $sql = "SELECT
  kendaraan.nopol,
  pemegang.id
FROM kendaraan
  INNER JOIN pemegang
    ON kendaraan.pemegang_id = pemegang.id
WHERE pemegang.id = $id";

    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);

    return $row['nopol'];
}

?>