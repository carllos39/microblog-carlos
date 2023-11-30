<?php
require "inc/funcoes-noticias.php"; 
require "inc/cabecalho.php"; 
$idNoticias=$_GET['id'];
$dadosDaNoticias=lerDetalhes($conexao,$idNoticias);

?>


<div class="row my-1 mx-md-n1">

    <article class="col-12">
        <h2><?=$dadosDaNoticias['titulo']?> </h2>
        <p class="font-weight-light">
            <time><?=formataData($dadosDaNoticias['data'])?> </time> - <span><?=$dadosDaNoticias['autor']?> </span>
        </p>
        <img src="imagens/<?=$dadosDaNoticias['imagem']?>" alt="" class="float-start pe-2 img-fluid">
        <p class="ajusta-texto"><?=$dadosDaNoticias['texto']?> </p>
    </article>
    

</div>        

<?php 
require_once "inc/rodape.php";
?>

