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
             <h3 class="box-title">Barcode Generator </h3>
             <div class="pull-right">
                 <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat btn-sm">
                     <i class="fa fa-undo"></i>Back
                 </a>
             </div>
         </div>

         <div class="box-body ">
             <?php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img style="width:160px" ; src="data:image/png;base64,' . base64_encode($generator->getBarcode($itm->barcode, $generator::TYPE_CODE_128)) . '">';
                ?>
             <br><br>
             <?= $itm->barcode; ?>
             <br><br>
             <a href="<?= site_url('item/barcode_print/' . $itm->item_id) ?>" target="_blank" class="btn btn-default btn-sm">
                 <i class="fa fa-print"></i>Print
             </a>
         </div>
     </div>

     <div class="box">
         <div class="box-header">
             <h3 class="box-title">QR-code Generator <i class="fa fa-qrcode"></i></h3>
         </div>
         <div class="box-body">
             <?php
                $writer = new Endroid\QrCode\Writer\PngWriter();

                // Create QR code
                $qrCode =  Endroid\QrCode\QrCode::create($itm->barcode);
                $result = $writer->write($qrCode);
                $result->saveToFile('uploads/qrcode/item-' . $itm->barcode . '.png');

                // $qrCode = new Endroid\QrCode\QrCode('Life is too short to be generating QR codes');
                // $qrCode->write('upload/qr-code/item-' . $itm->item_id . '.png');
                ?>
             <img src="<?= base_url('uploads/qrcode/item-' . $itm->barcode . '.png'); ?>" style="width:150px ;">


             <br><br>
             <?= $itm->barcode; ?>
             <br><br>
             <a href="<?= site_url('item/qrcode_print/' . $itm->item_id) ?>" target="_blank" class="btn btn-default btn-sm">
                 <i class="fa fa-print"></i>Print
             </a>
         </div>
     </div>



 </section>
 <!-- /.content -->