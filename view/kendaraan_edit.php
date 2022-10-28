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

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <b>EDIT DATA</b>
                            </div>
                            <div class="panel-body collapse in" id="create">
                                <form action="./kendaraan_edit.php?id_kendaraan=<?php echo $site_id;?>" method="POST" id="formKendaraan">
                                    <table class="table table-bordered table-responsive table-hover small">
                                        <tr>
                                            <td>
                                                <input id="cid" type="text" name="id_kendaraan" placeholder="Masukan ID Kendaraan" class="form-control" value="<?= $data['id_kendaraan'] ?>" maxlength="50"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnama" type="text" name="nama_kendaraan" placeholder="Masukan Nama Kendaraan" class="form-control" maxlength="50" value="<?= $data['nama_kendaraan'] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnopol" type="text" name="no_pol" placeholder="No. Polisi" class="form-control" maxlength="50" value="<?= $data['no_pol'] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cmesin" type="text" name="no_mesin" placeholder="No. Mesin" class="form-control" value="<?= $data['no_mesin'] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="crangka" type="text" name="no_rangka" placeholder="No. Rangka" class="form-control" maxlength="50" value="<?= $data['no_rangka'] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cmerk" type="text" name="merk" placeholder="Masukan Merk" class="form-control" maxlength="50" value="<?= $data['merk'] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cwarna" type="text" name="warna" placeholder="Masukan Warna" class="form-control" maxlength="50" value="<?= $data['warna'] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="active">
                                                <div class="btn-group-sm">
                                                    <button class="btn btn-success" type="submit" name="update"><i class="glyphicon glyphicon-pencil space-5"></i><b>Update</b></button>
                                                    <button class="btn btn-danger"><i class="glyphicon glyphicon-circle-arrow-right space-5"></i><b>RESET</b></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php echo $site_error; ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="active">
                    <small class="bold pull-left"><span id="footer-time"></span></small>
                    <small class="bold pull-right"><span id="footer-date"></span></small>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $().ready(function () {
        $('#formKendaraan').validate();

        $('#cnama').rules("add", {
            required: true,
            minlength: 3,
            maxlength: 50
        }
        );
        $('#cnopol').rules("add", {
            required: true,
            minlength: 5,
            maxlength: 10
        }
        );
        $('#canggaran').rules("add", {
            required: true,
            minlength: 3,
            maxlength: 11,
            digits: true
        });

    });

    function autoNama() {
        $('#cpemegang_id').val('');
        var min_length = 0;
        var keyword = $('#cpemegang_nama').val();
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

    function set_id(id, nama) {
        // change input value
        $('#cpemegang_nama').val(nama);
        $('#cpemegang_id').val(id);
        // hide proposition list
        $('#pemegang_nama_list').hide();
    }
</script>
