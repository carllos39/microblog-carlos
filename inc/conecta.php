<?php 
/*Script de conexão ao servidor de banco de dados */
$servidor="localhost";
$usuario="root";
$senha="";
$banco="microblog_carlos";
/* usando a função mysqli_connect para conectar ao servidor de banco de dados */
$conexao=mysqli_connect($servidor,$usuario,$senha,$banco);
mysqli_set_charset($conexao ,"utf8");
if(!$conexao){
    die("Deu ruim:".mysqli_connect());

}else{

}
?>