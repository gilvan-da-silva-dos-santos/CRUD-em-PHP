<?php 	require 'index.php';
		require 'classes/Crud.php';


$crud = new Crud();
?>

<br><br><br><br>
 <div class="container">
 	<table class="table">
 		<thead>
 			<tr>
 				<th>Nome</th>
 				<th>E-mail</th>
 				<th>Senha</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php foreach($crud->read() as $usuarios): ?>
 			<tr>
 				<td><?php echo $usuarios['nome'];?></td>
 				<td><?php echo $usuarios['email'];?></td>
 				<td><?php echo $usuarios['senha'];?></td>
 				<td><a href="excluir.php?id=<?php echo $usuarios['id'];?>" title="">Excluir</a> -- <a href="editar_usuario.php?id=<?php echo $usuarios['id'];?>" title="">Editar</a></td>
 			</tr>
 		<?php endforeach; ?>
 		</tbody>
 	</table>
 </div>