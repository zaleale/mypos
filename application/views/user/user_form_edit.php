<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit User</h3>
            <div class="pull-right">
                <a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-user-undo"></i>Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <!-- <?php echo validation_errors(); ?> -->
                    <form action="" method="post">
                        <form>
                            <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                                <label>Name *</label>
                                <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                                <input type="text" name="fullname" value="<?= $this->input->post('fullname') ?? $row->name ?>" class="form-control">
                                <?= form_error('fullname') ?>
                            </div>
                            <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control">
                                <?= form_error('username') ?>
                            </div>
                            <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                                <label>Password</label><small> (Biarkan kosong jika tidak di ganti)</small>
                                <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control">
                                <?= form_error('password') ?>
                            </div>
                            <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                                <label>Password Confirmation</label>
                                <input type="password" name="passconf" value="<?= $this->input->post('passconf')  ?>" class="form-control">
                                <?= form_error('passconf') ?>
                            </div>
                            <div class="form-group <?= form_error('address') ? 'has-error' : null ?>">
                                <label>Address </label>
                                <textarea name="address" class="form-control"><?= $this->input->post('address') ?? $row->address ?></textarea>
                                <!-- <?= form_error('address') ?> -->
                            </div>
                            <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                                <label>Level</label>
                                <select name="level" class="form-control">
                                    <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                    <option value="">- Pilih -</option>
                                    <option value="1" <?= $level == 1 ? 'selected' : null  ?>>Admin</option>
                                    <option value="2" <?= $level == 2 ? 'selected' : null  ?>>Kasir</option>
                                </select>
                                <?= form_error('level') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane">Save</i></button>
                                <button type="reset" class="btn  btn-flat">Reset</button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>