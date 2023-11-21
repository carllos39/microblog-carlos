<?php 
require "conecta.php";

function inserirUsuario($conexao,$nome,$email,$senha,$tipo){
  $sql ="INSERT INTO usuario(nome,email,senha,tipo) VALUES('$nome','$email','$senha','$tipo')";
    /*executando o comando */
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    
}
?>
