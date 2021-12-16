<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter imagem para webp</title>
</head>
<body>
    <header><h2>Imagens Convertidas:</h2></header>
</body>
</html>

<?php
/*Analisa se os arquivos que estão dentro da pastas são imagens*/
$pasta = "img";
$imagens = scandir($pasta);

$extensoes =['.png', '.jpg', '.jpeg'];
$webp = '.webp';

/*Tirar os pontos que não são relacionados as imagens*/
$ponto = array_shift($imagens);
$ponto = array_shift($imagens);

foreach($imagens as $imagem){
    /*Remove as 4 ultimas strings do arquivo*/
    $imagem = substr($imagem, 0,-4);

    /*Add extensões*/
    $entradaPNG = '/var/www/lynk/convertPHP/img/'.$imagem.$extensoes[0];
    $entradaJPG = '/var/www/lynk/convertPHP/img/'.$imagem.$extensoes[1];

    
    $saida = '/var/www/lynk/convertPHP/img_convert/'.$imagem .$webp;
    
    /*Realiza a conversão*/
    exec("cwebp /var/www/lynk/convertPHP/libwebp/examples/cwebp.c {$entradaPNG} -o {$saida}");
    exec("cwebp /var/www/lynk/convertPHP/libwebp/examples/cwebp.c {$entradaJPG} -o {$saida}");


    foreach($imagens as $imagemJPEG){
        /*Remove as 5 ultimas strings do arquivo*/
        $imagemJPEG = substr($imagemJPEG, 0,-5);

        /*Add extensões*/
        $entradaJPEG = '/var/www/lynk/convertPHP/img/'.$imagemJPEG.$extensoes[2];
        $saida = '/var/www/lynk/convertPHP/img_convert/'.$imagemJPEG .$webp;

        /*Realiza a conversão*/
        exec("cwebp /var/www/lynk/convertPHP/libwebp/examples/cwebp.c {$entradaJPEG} -o {$saida}");
    }

}
echo 'Imagens convertidas com sucesso!';
?>
