<section class="content-header">
    <h1>
        Customers
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Customers</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Customers</h3>
            <div class="pull-right">
                <a href="<?= site_url('customer') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('customer/process') ?>" method="post">
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $row->customer_id ?>">
                                <label>Customer Name *</label>
                                <input type="text" name="customer_name" value="<?= $row->name ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <option value="L" <?= $row->gender == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= $row->gender == 'P' ? 'selected' : '' ?>> Perempuan</option>
                                </select>
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