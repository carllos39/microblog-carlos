<?php 
require_once "../inc/funcoes-usuario.php";
require_once "../inc/cabecalho-admin.php";
$id=$_GET['id'];
excluirUsuario($conexao,$id);
header("location:usuarios.php");
?>