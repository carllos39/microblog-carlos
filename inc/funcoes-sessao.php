<?php 
/* Sessões no PHP
Recurso usado para o controle de acesso à determinadas páginas e/ou recursos do site.

Exemplos: área administrativa, painel de controle, área de cliente/aluno etc.

Nestas áreas o acesso só é possível mediante alguma forma
de autenticação. Exemplos: login/senha, digital, facial etc.
*/

/* Verificar se já NÃO EXISTE uma sessão em funcionamento */
if( !isset($_SESSION) ){
    // Então inicie uma sessão
    session_start();
}

function verificaAcesso(){
    //se não existir uma variável de sessão chamada  "id "baseada no id  de usuário logado ,então 
    //significa que ele /ela não esta logado(a) no sistema.
    if(! isset($_SESSION['id'])){
        //Portanto destrua  os dados  de sessão ,redirecione  para a página  login .php e pare o script.
        session_destroy();
        header("location:../login.php?acesso_negado");
        exit; // ou die()
    }
}

function login($id,$nome,$tipo){
//Criar variáveis de sessão são recursos que ficam disponível para uso durante  toda  duração  da sessão,ou seja ,enquanto o navegador não for fechado  ou  o usuário não clicar em sair.
$_SESSION["id"]=$id;
$_SESSION["nome"]=$nome;
$_SESSION["tipo"]=$tipo;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    exit;
}
function verificarTipo(){
    // Se tipo de usuário logado na sessão não for admin
    if($_SESSION['tipo'!='admin']){
        header("location:nao-autorizado.php");
        exit;

    }
}
?>
