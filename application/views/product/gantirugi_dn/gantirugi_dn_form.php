<section class="content-header">
    <h1>
        Product Knowledge
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Ganti Rugi Kiriman Dalam Negeri</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Ganti Rugi Kiriman Dalam Negeri </h3>
            <div class="pull-right">
                <a href="<?= site_url('gantirugi_dn') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('gantirugi_dn/process') ?>" method="post">
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $row->gantirugi_dn_id ?>">
                                <label>Jenis</label>
                                <input type="text" name="jenis" value="<?= $row->jenis ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Pengajuan Pengaduan (Dengan Asuransi)</label>
                                <input type="text" name="pengajuan_pengaduan_da" value="<?= $row->pengajuan_pengaduan_da ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Besar TGR (Dengan Asuransi)</label>
                                <textarea name="besar_tgr_da" class="form-control" placeholder="Gunakan kata <br> untuk membuat paragraf baru"><?= $row->besar_tgr_da ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pengajuan Pengaduan (Tanpa Asuransi)</label>
                                <input type="text" name="pengajuan_pengaduan_ta" value="<?= $row->pengajuan_pengaduan_ta ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Besar TGR (Tanpa Asuransi)</label>
                                <textarea name="besar_tgr_ta" class="form-control" placeholder="Gunakan kata <br> untuk membuat paragraf baru"><?= $row->besar_tgr_ta ?></textarea>
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