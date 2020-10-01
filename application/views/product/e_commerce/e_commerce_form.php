<section class="content-header">
    <h1>
        Product Knowledge
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">E-Commerce</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> E-Commerce </h3>
            <div class="pull-right">
                <a href="<?= site_url('e_commerce') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <!-- <?php echo form_open_multipart('e_commerce/process') ?> -->
                    <form action="<?= site_url('e_commerce/process') ?>" method="post">
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $row->e_commerce_id ?>">
                                <label>Question</label>
                                <input type="text" name="question" value="<?= $row->question ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bukalapak</label>
                                <textarea name="bukalapak" class="form-control" placeholder="Gunakan kata <br> untuk membuat paragraf baru"><?= $row->bukalapak ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Shopee</label>
                                <textarea name="shopee" class="form-control" placeholder="Gunakan kata <br> untuk membuat paragraf baru"><?= $row->shopee ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Zalora</label>
                                <textarea name="zalora" class="form-control" placeholder="Gunakan kata <br> untuk membuat paragraf baru"><?= $row->zalora ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tokopedia</label>
                                <textarea name="tokopedia" class="form-control" placeholder="Gunakan kata <br> untuk membuat paragraf baru"><?= $row->tokopedia ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane">Save</i></button>
                                <button type="reset" class="btn  btn-flat">Reset</button>
                            </div>
                            <!-- <?php echo form_close() ?> -->
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>