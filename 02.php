
<?php

// imagem original com 1920x1080
$upload = 'img/03.jpg';

$imagem = new Imagick($upload);

// redimensionando mantendo proporção
// imagem ficará dentro dos limites estabelecidos
$imagem->thumbnailImage(400, 400, true);

// salvando arquivo
$imagem->writeImage('/img_convert/thumb400_1.jpg');
?>