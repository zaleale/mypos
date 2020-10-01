<!-- KIRIMAN_DOMESTIK -->
<section class="content-header">
    <h1>
        Prodcuct Knowledge
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Kiriman Domestik</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Kiriman Domestik</h3>
            <div class="pull-right">
                <a href="<?= site_url('category') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('category/process') ?>" method="post">
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $row->category_id ?>">
                                <label>Nama Layanan</label>
                                <input type="text" name="category_name" value="<?= $row->name ?>" class="form-control" required>
                            </div>
                            <!-- <div class="form-group">
                                <label>Standar Waktu Penyerahan</label>
                                <input type="text" name="standar_waktu_penyerahan" value="<?= $row->standar_waktu_penyerahan ?>" class="form-control" required>
                            </div> -->
                            <div class="form-group">
                                <label>Standar Waktu Penyerahan</label>
                                <textarea name="standar_waktu_penyerahan" class="form-control" placeholder="Gunakan tambahan kata <br> untuk membuat paragraf baru"><?= $row->standar_waktu_penyerahan ?></textarea>
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
                                <label>Posting</label>
                                <input type="text" name="posting" value="<?= $row->posting ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Pick-up</label>
                                <input type="text" name="pickup" value="<?= $row->pickup ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>COD</label>
                                <input type="text" name="cod" value="<?= $row->cod ?>" class="form-control" required>
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