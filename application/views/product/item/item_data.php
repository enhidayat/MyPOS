 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Items
         <small>Data Barang</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="<?= site_url('item') ?>"><i class="fa fa-users"></i></a></li>
         <li class="active">Items</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">
     <?php $this->view('message'); ?>



     <div class="box">
         <div class="box-header">
             <h3 class="box-title">Data Product Item </h3>
             <div class="pull-right">
                 <a href="<?= site_url('item/add') ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-plus"></i>Create Product Item
                 </a>
             </div>
         </div>
         <div class="box-body table-responsive">
             <table class="table table-bordered table-striped" id="table1">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Barcode</th>
                         <th>Name</th>
                         <th>Category</th>
                         <th>Unit</th>
                         <th>Price</th>
                         <th>Stock</th>
                         <th>Image</th>
                         <th>Actions</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1;
                        foreach ($itm->result() as $key => $data) {  ?>
                         <tr>
                             <td style="width: 3%;"><?= $no++; ?></td>
                             <td>
                                 <?= $data->barcode; ?><br>
                                 <a href="<?= site_url('item/barcode_qrcode/' . $data->item_id) ?>" class="btn btn-default btn-xs">
                                     Generate <i class="fa fa-barcode"></i>
                                 </a>
                             </td>
                             <td><?= $data->name; ?></td>
                             <td><?= $data->category_name; ?></td>
                             <td><?= $data->unit_name; ?></td>
                             <td><?= $data->price; ?></td>
                             <td><?= $data->stock; ?></td>
                             <td>
                                 <?php if ($data->image != null) { ?>
                                     <img src="<?= base_url('uploads/product/' . $data->image)  ?>" alt="" width="100px">
                                 <?php } ?>
                             </td>

                             <td class="text-center" width="160px">

                                 <a href="<?= site_url('item/update/' . $data->item_id) ?>" class="btn btn-success btn-xs">
                                     <i class="fa fa-pencil"></i>Update
                                 </a>
                                 <a href="<?= site_url('item/delete/' . $data->item_id) ?>" onclick="return confirm('Hapus data?');" class="btn btn-danger btn-xs">
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