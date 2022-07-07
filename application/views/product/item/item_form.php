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
             <h3 class="box-title"><?= ucfirst($page); ?> item </h3>
             <div class="pull-right">
                 <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"></i>Back
                 </a>
             </div>
         </div>

         <div class="box-body ">
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <?php echo form_open_multipart('item/process'); ?>
                     <!-- <form action="site_url('item/process') ?>" method="post"> -->
                     <input type="hidden" name="item_id" value="<?= $itm->item_id;  ?>">
                     <div class="form-group"><label for="barcode"> Barcode *</label>
                         <input type="text" class="form-control" name="barcode" value="<?= $itm->barcode;  ?>" id="barcode" required autofocus>
                     </div>
                     <div class="form-group"><label for="barcode">Product Name *</label>
                         <input type="text" class="form-control" name="name" value="<?= $itm->name;  ?>" id="name" required autofocus>
                     </div>

                     <div class="form-group">
                         <label for="category">Category *</label>
                         <select name="category" id="category" class="form-control" required>
                             <option value=""> == Pilih ==</option>
                             <?php foreach ($categ->result() as $key => $data) : ?>
                                 <!-- /ambil NAMA  data dr tbl product_category yg category_id di tbl product_category = category_id di tbl product_item-->
                                 <option value="<?= $data->category_id; ?>" <?= $data->category_id == $itm->category_id ? "selected" : null ?>><?= $data->name; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <?php //print_r($unit) 
                        ?>
                     <div class="form-group">
                         <label for="unit">Unit *</label>
                         <?= form_dropdown('unit', $unit, $selectedUnit, ['class' => 'form-control', 'required' => 'required']); ?>
                     </div>

                     <div class="form-group"><label for="price"> Price *</label>
                         <input type="number" class="form-control" name="price" value="<?= $itm->price;  ?>" id="price" required>
                     </div>
                     <div class="form-group">
                         <label for="image"> Image *</label>
                         <?php if ($page == 'update') {
                                if ($itm->image != null) {  ?>
                                 <div style="margin-bottom: 4px;">
                                     <img src="<?= base_url('uploads/product/' . $itm->image)  ?>" alt="" width="80%">
                                 </div>
                         <?php }
                            } ?>
                         <input type="file" class="form-control" name="image" id="image">
                         <small>(Biarkan kosong jika tidak <?= $page == 'update' ? 'diganti' : 'ada' ?>)</small>
                     </div>

                     <div class="form-group">
                         <button type="submit" name="<?= $page; ?>" class="btn btn-success " btn-flat><i class="fa fa-paper-plane"></i>Save</button>
                         <button type="reset" class="btn " btn-flat>Reset</button>
                     </div>
                     <?= form_close(); ?>
                     <!-- </form> -->
                 </div>
             </div>
         </div>
     </div>



 </section>
 <!-- /.content -->