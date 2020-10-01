<!-- KIRIMAN_DOMESTIK -->
<section class="content-header">
    <h1>
        Product Knowledge
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Kiriman Domestik</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Kiriman Domestik</h3>
            <div class="pull-right">
                <a href="<?= site_url('category/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- <?php print_r($row->result()) ?> -->
            <table class="table table-bordered table-striped " id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Layanan</th>
                        <th>Standard Waktu Penyerahan</th>
                        <th>Berat</th>
                        <th>Ukuran</th>
                        <th>Posting</th>
                        <th>Pick-up</th>
                        <th>COD</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?>.</td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->standar_waktu_penyerahan ?></td>
                            <td><?= $data->berat ?></td>
                            <td><?= $data->ukuran ?></td>
                            <td><?= $data->posting ?></td>
                            <td><?= $data->pickup ?></td>
                            <td><?= $data->cod ?></td>
                            <td class="text=center" width="180px">
                                <a href="<?= site_url('category/edit/' . $data->category_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>Update
                                </a>
                                <a href="<?= site_url('category/del/' . $data->category_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
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
    <h5 class="box-title">*COD : saat ini hanya bisa dilakukan untuk kiriman dalam pulau Jawa. Untuk pembukaan layanan COD, arahkan agar mendatangi Kantorpos pusat (KPRK)</h5>
</section>