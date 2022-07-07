 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Customer
         <small>Pelanggan</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="<?= site_url('user') ?>"><i class="fa fa-users"></i></a></li>
         <li class="active">Suplliers</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">

     <div class="box">
         <div class="box-header">
             <h3 class="box-title"><?= ucfirst($page); ?> Customer </h3>
             <div class="pull-right">
                 <a href="<?= site_url('customer') ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"></i>Back
                 </a>
             </div>
         </div>

         <div class="box-body ">
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <form action="<?= site_url('customer/process') ?>" method="post">
                         <input type="hidden" name="customer_id" value="<?= $custom->customer_id;  ?>">
                         <div class="form-group"><label for="name">customer Name *</label>
                             <input type="text" class="form-control" name="customer_name" value="<?= $custom->name;  ?>" id="name" required>
                         </div>
                         <div class="form-group"><label for="description">Gender *</label>
                             <select name="gender" id="gender" class="form-control" required>
                                 <option value="">-- Pilih --</option>
                                 <option value="L" <?= $custom->gender == 'L' ? "selected" : "" ?>>Laki-laki</option>
                                 <option value="P" <?= $custom->gender == 'P' ? "selected" : "" ?>>Perempuan</option>
                             </select>
                         </div>
                         <div class="form-group"><label for="phone">phone *</label>
                             <input type="number" class="form-control" name="phone" value="<?= $custom->phone;  ?>" id="phone" required>
                         </div>
                         <div class="form-group"><label for="address">Address</label>
                             <textarea type="text" class="form-control" name="address" id="address" aria-required=""><?= $custom->address;  ?></textarea>
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