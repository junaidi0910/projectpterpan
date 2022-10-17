<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-logout">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">LOGOUT</h4>
            </div>
            <div class="modal-body">
                <p>Keluar dari aplikasi ?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo $site_url;?>/logout.php" class="btn btn-primary">Iya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

<div class="list-group small bold">
    <a class="list-group-item list-group-item-action px-3 border-0 rounded-3 mb-2 list-group-item-info"><i class="glyphicon glyphicon-book space-5"></i>  ALL DATA</a>
    <a href="./pemegang.php" class="list-group-item"><i class="glyphicon glyphicon-user space-5"></i> DATA KARYAWAN</a>
    <a href="./kendaraan.php" class="list-group-item"><i class="glyphicon glyphicon-road space-5"></i> DATA KENDARAAN</a>
    <a href="./biaya.php" class="list-group-item"><i class="glyphicon glyphicon-list-alt space-5"></i> DATA PENGAJUAN</a>
</div>

<div class="list-group small bold">
    <a class="list-group-item list-group-item-action px-3 border-0 rounded-3 mb-2 list-group-item-info"><i class="glyphicon glyphicon-shopping-cart space-5"></i>  DATA PENGAJUAN</a>
    <a href="./home.php" class="list-group-item"><i class="glyphicon glyphicon-random space-5"></i> KELOLA DATA PENGAJUAN</a>
</div>

<div class="list-group small bold">
    <a class="list-group-item list-group-item-action px-3 border-0 rounded-3 mb-2 list-group-item-info"><i class="glyphicon glyphicon-lock space-5"></i>  ADMIN PANEL</a>
    <a href="./cetak.php" class="list-group-item"><i class="glyphicon glyphicon-print space-5"></i> CETAK LAPORAN</a>
    <a href="./admin_profil.php" class="list-group-item"><i class="glyphicon glyphicon-pencil space-5"></i> EDIT PROFIL</a>
    <button class="list-group-item list-group-item-action px-3 border-0 rounded-3 mb-2 list-group-item-danger" data-toggle="modal" data-target="#modal-logout"><i class="glyphicon glyphicon-arrow-left space-5"></i> LOGOUT</button>
</div>