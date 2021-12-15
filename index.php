<?php
/*Analisa se os arquivos que estão dentro da pastas são imagens*/
$pasta = "img";
$imagens = scandir($pasta);

$extensoes =['.png', '.jpg', '.jpeg'];
$webp = '.webp';

/*Tirar os pontos que não são relacionados as imagens*/
$ponto = array_shift($imagens);
$ponto = array_shift($imagens);

/*Imprime o Array de imagens*/
//print_r($imagens);

foreach($imagens as $imagem){
    /*Remove as 4 ultimas strings do arquivo*/
    $imagem = substr($imagem, 0,-4);

    /*Add extensões*/
    $entradaPNG = '/var/www/lynk/convertPHP/img/'.$imagem.$extensoes[0];
    $entradaJPG = '/var/www/lynk/convertPHP/img/'.$imagem.$extensoes[1];
    $entradaJPEG = '/var/www/lynk/convertPHP/img/'.$imagem.$extensoes[2];
    
    $saida = '/var/www/lynk/convertPHP/img_convert/'.$imagem .$webp;

    /*Realiza a conversão*/
    exec("sudo /var/www/lynk/convertPHP/libwebp/examples/cwebp.c {$entradaPNG} -o {$saida}");
    exec("sudo /var/www/lynk/convertPHP/libwebp/examples/cwebp.c {$entradaJPG} -o {$saida}");
    exec("sudo /var/www/lynk/convertPHP/libwebp/examples/cwebp.c {$entradaJPEG} -o {$saida}");

    /*Imprime onde os arquivos foram salvos*/    
    echo "<p>{$saida}</p>";

}

?>