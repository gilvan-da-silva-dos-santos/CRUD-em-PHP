<?php require 'index.php';
		require 'classes/Crud.php';
 ?>

<?php 
$crud = new Crud();

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);

  	$usuario = $crud->selectUsuEx($id);
}

if(isset($_POST['email']) && !empty($_POST['email'])) {
	$nome 	= addslashes($_POST['nome']);
	$email 	=  addslashes($_POST['email']);
	$senha 	= addslashes(md5($_POST['senha']));

		$crud->update($id, $nome, $email, $senha);

		header('Location: usuarios_cadastrados.php');
}	

?>

<br><br><br>

<div class="container">
	<form action="" method="POST" accept-charset="utf-8">
	<div class="form-group">
		<label for="">Nome de Usuário:</label>
		<input class="form-control" type="text" name="nome" placeholder="<?php echo $usuario['nome'];?>" required>
	</div>
	<div class="form-group">
		<label for="">Email de Usuário:</label>
		<input class="form-control" type="email" name="email" placeholder="<?php echo $usuario['email'];?>" required>
	</div>
	<div class="form-group">
		<label for="">Senha de Usuário:</label>
		<input class="form-control" type="password" name="senha" placeholder="<?php echo $usuario['senha'];?>" required>
	</div>
	<br>
	<input class="btn btn-success" type="submit" value="Cadastrar" name="">
</form>	
	
</div>