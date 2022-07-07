 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Suplliers
         <small>Pemasok Barang</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="<?= site_url('supplier') ?>"><i class="fa fa-truck"></i></a></li>
         <li class="active">Suplliers</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">

     <div class="box">
         <div class="box-header">
             <h3 class="box-title"><?= ucfirst($page); ?> Supplier </h3>
             <div class="pull-right">
                 <a href="<?= site_url('supplier') ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"></i>Back
                 </a>
             </div>
         </div>

         <div class="box-body ">
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <form action="<?= site_url('supplier/process') ?>" method="post">
                         <input type="hidden" name="supplier_id" value="<?= $suply->supplier_id;  ?>">
                         <div class="form-group"><label for="name">Supplier Name *</label>
                             <input type="text" class="form-control" name="supplier_name" value="<?= $suply->name;  ?>" id="name" required>
                         </div>
                         <div class="form-group"><label for="phone">phone *</label>
                             <input type="number" class="form-control" name="phone" value="<?= $suply->phone;  ?>" id="phone" required>
                         </div>
                         <div class="form-group"><label for="address">Address</label>
                             <textarea type="text" class="form-control" name="address" id="address" aria-required=""><?= $suply->address;  ?></textarea>
                         </div>
                         <div class="form-group"><label for="description">Description *</label>
                             <textarea type="text" class="form-control" name="description" id="description" aria-required=""><?= $suply->description;  ?></textarea>
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