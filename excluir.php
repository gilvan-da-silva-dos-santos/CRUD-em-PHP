<?php 
require 'classes/Crud.php';

$crud = new Crud();

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);

	$crud->delete($id);

	header('Location: usuarios_cadastrados.php');
}


?>