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
                        <?php include '/view/sidebar.php'; ?>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <ol class="breadcrumb small bold">
                            <li><a href="<?php echo $site_url; ?>/home.php"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><?php echo $site_title; ?></li>                            
                        </ol>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <button class="btn btn-default btn-sm space-5" data-toggle="collapse" data-target="#create" id="btn-create"><i class="glyphicon glyphicon-minus" id="lbl-create"></i></button>
                                <b>TAMBAH DATA</b>
                            </div>
                            <div class="panel-body collapse in" id="create">
                                <form action="./drivers.php" method="POST" id="formPemegang">
                                    <table class="table table-bordered table-responsive table-hover small">
                                        <tr>
                                            <td>
                                                <input id="cnip" type="text" name="username" placeholder="Masukan Username" class="form-control" maxlength="18"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnama" type="text" name="nama" placeholder="Masukan Nama Driver" class="form-control" maxlength="50"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea id="calamat" name="alamat" class="form-control" placeholder="Alamat Lengkap" maxlength="100" required></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="ctelepon" type="tel" name="telepon" placeholder="Masukan No. Telepon" class="form-control" maxlength="12" required/>
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
                                <b>LIST DATA DRIVERS</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <table id="tbl-data" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr class="active">
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telpon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        while ($data = mysql_fetch_array($data_drivers)) {
                                            ++$no;
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td><?php echo $data['telepon']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="drivers_edit.php?username=<?php echo $data['username']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="drivers_delete.php?username=<?php echo $data['username']; ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Hapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td class="active">
                    <small class="bold pull-left"><span id="footer-time"></span></small>
                    <small class="bold pull-right"><span id="footer-date"></span> | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a>
                    </small>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $().ready(function () {
        $('#formPemegang').validate();

        // $('#cnip').rules("add", {
        //     required: true,
        //     minlength: 18,
        //     maxlength: 18,
        //     digits: true
        // }
        // );
        // $('#cnama').rules("add", {
        //     required: true,
        //     minlength: 3,
        //     maxlength: 50
        // }
        // );
        // $('#calamat').rules("add", {
        //     required: true,
        //     minlength: 5,
        //     maxlength: 100
        // }
        // );
        // $('#ctelepon').rules("add", {
        //     required: true,
        //     minlength: 9,
        //     maxlength: 12,
        //     digits: true
        // });
    });
</script>