<?php 
require "conecta.php";

function inserirUsuario($conexao,$nome,$email,$senha,$tipo){
  $sql ="INSERT INTO usuario(nome,email,senha,tipo) VALUES('$nome','$email','$senha','$tipo')";
    /*executando o comando */
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    
}
function lerUsuarios($conexao){
  /*Comando para fazer a leitura  de dados (SELECT)*/
  $sql="SELECT id,nome,email,tipo FROM usuario ORDER BY nome";
  /*Execução do comando e armazenamento  do resultado da consulta /query */
 $resultado=mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
 /*Retornamos o resultado da query transformando em array associativo  */
 return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}
?>
