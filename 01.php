<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter imagens para webp</title>
</head>
<body>
    <h1>Converter imagem jpg para webp</h1>
</body>
</html>
<?php
    $file = './img/02.png';
    $image = imagecreatefromstring(file_get_contents($file));
    ob_start();
    imagejpeg($image,NULL,100);
    $cont = ob_get_contents();
    ob_end_clean();
    imagedestroy($image);
    $content = imagecreatefromstring($count);
    $output = './img_convert/img.webp';
    imagewebp($content, $output);
    imagedestroy($content);
    echo '<h3>Imagem convertida, salva em '.$output .'</h3>';
?>  