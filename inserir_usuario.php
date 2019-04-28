<?php 	require 'index.php';
		require 'classes/Crud.php';	
;?>

<?php 

	$crud = new Crud();

if(isset($_POST['email']) && !empty($_POST['email'])) {

	$nome 	= addslashes($_POST['nome']);
	$email 	= addslashes($_POST['email']);
	$senha 	= addslashes(md5($_POST['senha']));

		if($crud->create($nome, $email, $senha)) {
			echo "CASTRADO COM SUCESSO!!";
			header('Location: usuarios_cadastrados.php');
		}	else {
			echo "USUÁRIO JÁ CADASTRADO!!";
		}
}
?>

<br><br><br>

<div class="container">
	<form action="" method="POST" accept-charset="utf-8">
	<div class="form-group">
		<label for="">Nome de Usuário:</label>
		<input class="form-control" type="text" name="nome" placeholder="Nome de usuário aqui..." required>
	</div>
	<div class="form-group">
		<label for="">Email de Usuário:</label>
		<input class="form-control" type="email" name="email" placeholder="Email de usuário aqui..." required>
	</div>
	<div class="form-group">
		<label for="">Senha de Usuário:</label>
		<input class="form-control" type="password" name="senha" placeholder="Senha de usuário aqui..." required>
	</div>
	<br>
	<input class="btn btn-success" type="submit" value="Cadastrar" name="">
</form>	
	
</div>