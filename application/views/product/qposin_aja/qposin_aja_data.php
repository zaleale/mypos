<section class="content-header">
    <h1>
        Product Knowledge
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Qposin Aja</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Qposin Aja</h3>
            <div class="pull-right">
                <a href="<?= site_url('qposin_aja/add') ?>" class="btn btn-primary btn-flat">
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
                        <th>Answer</th>
                        <th></th>
                        <!-- <th>Deskripsi</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?>.</td>
                            <td style="width:15%;"><?= $data->question ?></td>
                            <td style="width:50%"><?= $data->answer ?></td>
                            <td>
                                <?php if ($data->image != null) { ?>
                                    <a href="<?= base_url('uploads/product/' . $data->image)  ?>"><img src="<?= base_url('uploads/product/' . $data->image)  ?>" style="width:105%"></a>
                                <?php } ?>
                                </small></td>
                            <!-- <td><?= $data->deskripsi ?></td> -->
                            <td class="text=center" width:10%>
                                <a href="<?= site_url('qposin_aja/edit/' . $data->qposin_aja_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>Update
                                </a>
                                <a href="<?= site_url('qposin_aja/del/' . $data->qposin_aja_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
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