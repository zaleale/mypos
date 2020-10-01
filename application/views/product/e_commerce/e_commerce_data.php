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
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">E-Commerce</h3>
            <div class="pull-right">
                <a href="<?= site_url('e_commerce/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- <?php print_r($row->result()) ?> -->
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Bukalapak</th>
                        <th>Shopee</th>
                        <th>Zalora</th>
                        <th>Tokopedia</th>
                        <th>Actions</small></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?>.</td>
                            <td><?= $data->question ?></td>
                            <td><?= $data->bukalapak ?></td>
                            <td><?= $data->shopee ?></td>
                            <td><?= $data->zalora ?></td>
                            <td><?= $data->tokopedia ?></td>
                            <td class="text=center" width:20%>
                                <a href="<?= site_url('e_commerce/edit/' . $data->e_commerce_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>Update
                                </a>
                                <a href="<?= site_url('e_commerce/del/' . $data->e_commerce_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <h5>*Ukuran <a href="https://www.posindonesia.co.id/id/content/33">https://www.posindonesia.co.id/id/content/33</a> </h5> -->
</section>