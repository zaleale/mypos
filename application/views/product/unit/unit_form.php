<section class="content-header">
    <h1>
        Units
        <small>Satuan Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Units</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Data Units </h3>
            <div class="pull-right">
                <a href="<?= site_url('unit') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('unit/process') ?>" method="post">
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $row->unit_id ?>">
                                <label>Nama Layanan</label>
                                <input type="text" name="unit_name" value="<?= $row->name ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Standard Waktu Penyerahan</label>
                                <input type="text" name="standar_waktu_penyerahan" value="<?= $row->standar_waktu_penyerahan ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Berat</label>
                                <input type="text" name="berat" value="<?= $row->berat ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label>
                                <input type="text" name="ukuran" value="<?= $row->ukuran ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tracking</label>
                                <input type="text" name="tracking" value="<?= $row->tracking ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ganti Rugi</label>
                                <input type="text" name="ganti_rugi" value="<?= $row->ganti_rugi ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane">Save</i></button>
                                <button type="reset" class="btn  btn-flat">Reset</button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>