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

function lerUmUsuario($conexao,$id){
  /*Montamos  o sql contendo o id  do usuário que queremos carregar */
  $sql="SELECT * FROM usuario WHERE id=$id";
  //Executamos e guardamos o resultado  da consulta
 $resultado= mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
 return mysqli_fetch_assoc($resultado);
}
function atualizarUsuario($conexao,$id,$nome,$email,$senha,$tipo){
  $sql="UPDATE usuario SET nome='$nome',email='$email',senha='$senha',tipo='$tipo' WHERE id=$id";
  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}
function excluirUsuario($conexao,$id){
  $sql="DELETE FROM usuario WHERE id=$id";
  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function buscaUsuario($conexao,$email){
 $sql="SELECT * FROM usuario WHERE email='$email'";
 $resultado= mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
return mysqli_fetch_assoc($resultado);
}
?>
