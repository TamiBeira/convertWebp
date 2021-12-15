<?php
/*Analisa se os arquivos que estão dentro da pastas são imagens*/
$folder = "img";
$images = scandir($folder);

$dots = array_shift($images);
$dots = array_shift($images);

/*Imprime o Array de imagens*/
//print_r($images);

foreach($images as $image){
    $image = substr($image, 0, -5);

    $input = './img/'.$image.'.jpg';
    $output = './img_convert/'.$image.'.webp';

    exec("/usr/local/lib/libwebp.a.{$input} -o {$output}");

    echo $output .'</br>';
}


?>