<div class="container box">
    <table class="table table-bordered table-responsive">
        <tbody>
            <tr>
                <td class="active">
                <img src="image/LOGO UKDW PNG.png" width="64" height="64"/>
                <strong class="text-title">SISTEM INFORMASI PENJADWALAN KENDARAAN DINAS (Login Sebagai <?php echo $_SESSION['role'] ?>)</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <br/>
                    <div class="col-lg-3 col-md-3">
                        <?php include './view/sidebar.php'; ?>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <ol class="breadcrumb small bold">
                            <li><a href="<?php echo $site_url; ?>/home.php"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><?php echo $site_title; ?></li>                            
                        </ol>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Kelola Data Pengajuan : </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <button class="btn btn-default btn-sm space-5" data-toggle="collapse" data-target="#create" id="btn-create"><i class="glyphicon glyphicon-minus" id="lbl-create"></i></button>
                                <b>TAMBAH DATA KELOLA DATA PENGAJUAN</b>
                            </div>
                            <div class="panel-body collapse in" id="create">
                                <form action="./pemegang.php" method="POST" id="formPemegang">
                                    <table class="table table-bordered table-responsive table-hover small">
                                        <tr>
                                            <td>
                                                <input id="cusername" type="text" name="username" placeholder="Masukan ID Admin" class="form-control" maxlength="18"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnama" type="text" name="nama" placeholder="Masukan ID Kendaraan" class="form-control" maxlength="50"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnama" type="text" name="nama" placeholder="Tanggal Pinjam" class="form-control" maxlength="50"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="ctelepon" type="tel" name="telepon" placeholder="Masukan No. Telepon" class="form-control" maxlength="12" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cdivisi" type="text" name="divisi" placeholder="Masukan Divisi" class="form-control" maxlength="12" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cpassword" type="password" name="password" placeholder="Masukan Password" class="form-control" maxlength="12" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="active">
                                                <div class="btn-group-sm">
                                                    <button class="btn btn-success" type="submit" name="create"><i class="glyphicon glyphicon-pencil space-5"></i><b>TAMBAH</b></button>
                                                    <button class="btn btn-danger"><i class="glyphicon glyphicon-circle-arrow-right space-5"></i><b>RESET</b></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php echo $site_error; ?>
                            </div>
                        </div>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <b>LIST DATA KARYAWAN</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <table id="tbl-data" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr class="active">
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Divisi</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        while ($data = mysql_fetch_array($data_pemegang)) {
                                            ++$no;
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['telepon']; ?></td>
                                                <td><?php echo $data['divisi']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="pemegang_edit.php?username=<?php echo $data['username']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="pemegang_delete.php?username=<?php echo $data['username']; ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Hapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div id="output">

                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="active">
                    <small class="bold pull-left"><span id="footer-time"></span></small>
                    <small class="bold pull-right"><span id="footer-date"></span> | Dibuat Oleh <strong>Yudi & Junaidi</strong>
                    </small>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>

    $(document).ready(function () {
        $('#cbulan-head').hide();
        $('#ctahun-head').hide();
        $('#pemegang_nama_list').hide();
        $('#output').hide();

    });

    function autoNama() {
        $('#cbulan-head').hide();
        $('#ctahun-head').hide();
        $('#pemegang_nama_list').hide();
        $('#output').hide();

        var min_length = 0;
        var keyword = $('#cnip_nama').val();
        if (keyword.length >= min_length) {
            $.ajax({
                url: 'check_pemegang_nama.php',
                type: 'POST',
                data: {nama: keyword},
                success: function (data) {
                    $('#pemegang_nama_list').show();
                    $('#pemegang_nama_list').html(data);
                }
            });
        } else {
            $('#pemegang_nama_list').hide();
        }

    }

    function autoBiaya() {
        var pemegang_id = $('#cpemegang_id').val();
        $.ajax({
            url: 'ajax_biaya.php',
            type: 'POST',
            data: {id: pemegang_id},
            success: function (data) {
                $('#output').show();
                $('#output').html(data);
            }
        });
    }

    function set_id(id, nama) {
        // change input value
        $('#cnip_nama').val(nama);
        $('#cpemegang_id').val(id);
        // hide proposition list
        $('#pemegang_nama_list').hide();
        ajaxGetStatus();
        autoBiaya();
    }

    function ajaxGetStatus() {
        var pemegang_id = $('#cpemegang_id').val();
        $.ajax({
            url: 'ajax_get_status.php',
            type: 'POST',
            data: {id: pemegang_id},
            success: function (data) {
                if (data > 0) {
                    // show data
                    $('#cbulan-head').show();
                    $('#ctahun-head').show();
                    ajaxTableBiaya();
                }
            }
        });
    }

    function ajaxTableBiaya() {
        $('#table-biaya').empty();
        
        var id = 0;
        var bulan = 0;
        var tahun = 0;
        
        id = $('#cpemegang_id').val();
        bulan = $('#cbulan').val();
        tahun = $('#ctahun').val();

        $.ajax({
            url: 'ajax_table_biaya.php',
            type: 'POST',
            cache: false,
            data: {id: id, bulan: bulan, tahun: tahun},
            success: function (data) {
                $('#table-biaya').html(data);
            }
        });
    }

</script>