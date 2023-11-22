<?php
require "inc/cabecalho.php"; 
require "inc/funcoes-usuario.php"; 
require "inc/funcoes-sessao.php";

//Programação das mensagens
if(isset($_GET['acesso_negado'])){
	$mensagem="Você deve logar primeiro !";

}elseif(isset($_GET['Dados_incorretos'])){
$mensagem="Dados incorretos,verifique!";
}elseif(isset($_GET['sair'])){
	$mensagem="Você saiu do sistema!";
	}elseif(isset($_GET['campos_obrigatório'])){
		$mensagem="Preencha email e senha!";
		}

if(isset($_POST['entrar'])){
	//Verificando se os campos estão vazio
	if(empty($_POST['email'])|| empty($_POST['senha'])){
		header("location:login.php?campos_obrigatórios");
		exit;

	}//fim  if empty

	$email=mysqli_real_escape_string($conexao,$_POST['email']);
	$senha=mysqli_real_escape_string($conexao,$_POST['senha']);
	$usuario=buscaUsuario($conexao,$email);
	/*Vericação de usuário e senha */
	
	if($usuario!=null && password_verify($senha,$usuario['senha'])){
		login($usuario['id'],$usuario['nome'],$usuario['tipo']);
		header("location:admin/index.php");
		exit;
	}else{
		header("location:login.php?Dados_incorretos");
		exit;
	}


}//fim if isset
?>

<div class="row">
    <div class="bg-white rounded shadow col-12 my-1 py-4">
    <h2 class="text-center fw-light">Acesso à área administrativa</h2>

        <form action="" method="post" id="form-login" name="form-login" class="mx-auto w-50" autocomplete="off">
           <?php if(isset($mensagem)){?>
				<p class="my-2 alert alert-warning text-center">
					<?=$mensagem?>
				</p> 
				<?php }?>               

				<div class="mb-3">
					<label for="email" class="form-label">E-mail:</label>
					<input class="form-control" type="email" id="email" name="email" required>
				</div>
				<div class="mb-3">
					<label for="senha" class="form-label">Senha:</label>
					<input class="form-control" type="password" id="senha" name="senha" required>
				</div>

				<button class="btn btn-primary btn-lg" name="entrar" type="submit">Entrar</button>

			</form>

    </div>
    
    
</div>        

<?php 
require_once "inc/rodape.php";
?>

