<section class="content-header">
    <h1>
        Product Knowledge
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Batas Pengaduan Kiriman</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Batas Pengaduan Kiriman </h3>
            <div class="pull-right">
                <a href="<?= site_url('batas_pengaduan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('batas_pengaduan/process') ?>" method="post">
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $row->batas_pengaduan_id ?>">
                                <label>Nama Layanan</label>
                                <input type="text" name="nama_layanan" value="<?= $row->nama_layanan ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Batas Pengaduan Kiriman</label>
                                <input type="text" name="batas_pengaduan_kiriman" value="<?= $row->batas_pengaduan_kiriman ?>" class="form-control">
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