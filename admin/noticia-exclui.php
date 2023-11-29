<?php 
require "../inc/funcoes-sessao.php";
require "../inc/funcoes-noticias.php";

$idNoticias=$_GET['id'];
$idUsuario=$_SESSION['id'];
$tipoUsuario=$_SESSION['tipo'];



excluirNoticia($conexao,$idNoticias,$idUsuario,$tipoUsuario);
header("location:noticias.php");

?>