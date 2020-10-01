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
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Ganti Rugi Kiriman Dalam Negeri</h3>
            <div class="pull-right">
                <a href="<?= site_url('gantirugi_dn/add') ?>" class="btn btn-primary btn-flat">
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
                        <th style="width:5%">Jenis</th>
                        <th style="width:25%">Pengajuan Pengaduan (Dengan Asuransi)</th>
                        <th style="width:15%">Besar TGR (Dengan Asuransi)</th>
                        <th style="width:25%">Pengajuan Pengaduan (Tanpa Asuransi)</th>
                        <th>Besar TGR (Tanpa Asuransi)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style=" width:5%;"><?= $no++ ?>.</td>
                            <td style="width: 100px;"><?= $data->jenis ?></td>
                            <td style="width: 200px;"><?= $data->pengajuan_pengaduan_da ?></td>
                            <td style="width: 200px;"><?= $data->besar_tgr_da ?></td>
                            <td style="width: 200px;"><?= $data->pengajuan_pengaduan_ta ?></td>
                            <td style="width: 200px;"><?= $data->besar_tgr_ta ?></td>
                            <td class="text=center" width="100px">
                                <a href="<?= site_url('gantirugi_dn/edit/' . $data->gantirugi_dn_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>Update
                                </a>
                                <a href="<?= site_url('gantirugi_dn/del/' . $data->gantirugi_dn_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
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