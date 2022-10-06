<?php
// config
include './config/config.php';

if ($ses_login === TRUE) {
    $id = $_POST['pemegang_id'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $data_cetak = db_cetak_self($id, $bulan, $tahun);

    $site_title = "Laporan Perorangan";

    include './view/header_cetak.php';
    ?>

    <div class="row">
        <br/>
        <div class="col-lg-3"></div>
        <div class="col-lg-6" style="text-align: center">
            <b>
                Rekapitulasi Pemeliharan Kendaraan Dinas Bermotor Roda Dua<br/>
                BPS Kota Tasikmalaya Tahun Anggaran <?php echo date("Y"); ?>
            </b>
        </div>
        <div class="col-lg-3"></div>
    </div>

    <div class="row">
        <br/>
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <table class="identitas">
                <tr>
                    <td>Bulan </td>
                    <td> : </td>
                    <td><?php echo $bulan . " / " . $tahun; ?></td>
                </tr>
                <tr>
                    <td>Nama Pemegang </td>
                    <td> : </td>
                    <td><?php
                        $identitas = db_pemegang_get_row_by_id($id);
                        echo $identitas['nama'];
                        ?></td>
                </tr>
                <tr>
                    <td>No. Polisi </td>
                    <td> : </td>
                    <td><?php echo db_kendaraan_get_nopol_by_pemegang_id($id); ?></td>
                </tr>
            </table>
            <br/>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jenis Pembelian</th>
                        <th>Banyaknya (Liter)</th>
                        <th>Total Harga</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $liter = 0;
                    $total = 0;
                    while ($data = mysql_fetch_array($data_cetak)) {
                        ++$no;
                        ?>
                        <tr>
                            <td><?php
                                $liter += $data['jumlah'];
                                $total += $data['biaya'];
                                echo $no;
                                ?></td>
                            <td><?php echo $data['tanggal']; ?></td>
                            <td><?php echo $data['jenis']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['biaya']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                        </tr>
    <?php } ?>
                </tbody>
                <tfoot>
                <td>
                <th>Jumlah</th>
                <th></th>
                <th><?php echo $liter; ?></th>
                <th>Rp. <?php echo number_format($total); ?></th>
                <th></th>
                </td>
                </tfoot>
            </table>
            <br>
            <div class="pull-right" style="text-align: right">
                <p>Tasikmalaya, <span id="footer-date"></span></p>
                <p>Kasubbag Tata Usaha</p>
                <br/>
                <br/>
                <br/>
                <br/>
                <p>Dede Iskandar Nuroni, SE</p>
                <p>NIP. 19650211 198503 1001</p>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <?php
    include './view/footer.php';
} else {
    redirect($site_url, 'login.php');
}
?>