<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Units
        <small>Units Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('unit') ?>"><i class="fa fa-users"></i></a></li>
        <li class="active">Units</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Unit </h3>
            <div class="pull-right">
                <a href="<?= site_url('unit') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Back
                </a>
            </div>
        </div>

        <div class="box-body ">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('unit/process') ?>" method="post">
                        <input type="hidden" name="unit_id" value="<?= $uni->unit_id;  ?>">
                        <div class="form-group"><label for="name">Unit Name *</label>
                            <input type="text" class="form-control" name="unit_name" value="<?= $uni->name;  ?>" id="name" required autofocus>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="<?= $page; ?>" class="btn btn-success " btn-flat><i class="fa fa-paper-plane"></i>Save</button>
                            <button type="reset" class="btn " btn-flat>Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</section>
<!-- /.content -->