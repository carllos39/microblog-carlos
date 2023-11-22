<?php 
require_once "../inc/funcoes-usuario.php";
$id=$_GET['id'];
excluirUsuario($conexao,$id);
header("location:usuarios.php");
?>