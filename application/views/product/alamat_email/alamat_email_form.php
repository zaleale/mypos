<section class="content-header">
    <h1>
        Product Knowledge
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Alamat Email Kiriman Impor</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Alamat Email Kiriman Impor </h3>
            <div class="pull-right">
                <a href="<?= site_url('alamat_email') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('alamat_email/process') ?>" method="post">
                        <form>
                            <div class="form-group">
                                <label>Nama Kantor Pos</label>
                                <input type="text" name="nama" value="<?= $row->nama ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $row->alamat_email_id ?>">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $row->email ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" name="no_telepon" value="<?= $row->no_telepon ?>" class="form-control" placeholder="Ketikan angka nya saja">
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