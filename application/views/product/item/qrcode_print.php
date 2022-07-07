<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR-Code Product- <?= trim($itm->barcode); ?></title>
</head>


<body>
    <!-- pemanggilan versi dulu langsung path filenya -->
    <!-- <img src="uploads/qrcode/item-<?= trim($itm->barcode) ?>.png" style="width:250px;"> -->

    <?php
    // dompdf terbaru nggak tau kenapa gak bisa load image harus convert dulu
    //Use this code to convert your image to base64
    // Apply this in a view 

    $path = base_url('uploads/qrcode/item-' . trim($itm->barcode) . '.png'); // Modify this part (your_img.png
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    echo '<br>';
    ?>

    <!-- This will output the image in pdf to the browser. -->
    <img style="width: 200px ;" src="<?= $base64 ?>" />
    <br>
    <p>

        <?= trim($itm->barcode) ?>
    </p>


</body>

</html>