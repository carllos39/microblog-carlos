
<?php 
$servdor="localhost";
$usuario="root";
$senha="";
$banco="microblog";
$conexao=mysqli_connect($servdor,$usuario,$senha,$banco);
mysqli_set_charset($conexao,"utf8");
if($conexao){
die("Deu ruim:".mysqli_connect());
}else{
echo"Beleza,conectado!";
}

?>
