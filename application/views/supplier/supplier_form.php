<section class="content-header">
    <h1>
        Suppliers
        <small>Pemasok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Suppliers</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Suppliers</h3>
            <div class="pull-right">
                <a href="<?= site_url('supplier') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('supplier/process') ?>" method="post">
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $row->supplier_id ?>">
                                <label>Supplier Name *</label>
                                <input type="text" name="supplier_name" value="<?= $row->name ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone *</label>
                                <input type="number" name="phone" value="<?= $row->phone ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address *</label>
                                <textarea name="addr" class="form-control" required><?= $row->address ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control"><?= $row->description ?></textarea>
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