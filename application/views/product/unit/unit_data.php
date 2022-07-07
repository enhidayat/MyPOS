<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Units
        <small>Satuan Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('unit') ?>"><i class="fa fa-users"></i></a></li>
        <li class="active">Units</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message'); ?>



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Units </h3>
            <div class="pull-right">
                <a href="<?= site_url('unit/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($uni->result() as $key => $data) {  ?>
                        <tr>
                            <td style="width: 3%;"><?= $no++; ?></td>
                            <td><?= $data->name; ?></td>

                            <td class="text-center" width="160px">

                                <a href="<?= site_url('unit/update/' . $data->unit_id) ?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-pencil"></i>Update
                                </a>
                                <a href="<?= site_url('unit/delete/' . $data->unit_id) ?>" onclick="return confirm('Hapus data?');" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>Delete
                                </a>

                            </td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



</section>
<!-- /.content -->