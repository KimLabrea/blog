<h1>Usuarios</h1>
<?=$this->Html->link('Cadastrar novo usuario',array('action'=>'signup')) ?>
<table>
	<tr>
		<td>ID</td>
		<td>NOME</td>
		<td>EMAIL</td>
		<td>USERNAME</td>
		<td>ROLE</td>
		<td>ACTIONS</td>
	</tr>
	<?php foreach($users as $user): ?>
		<tr>
			<td><?=$user['User']['id']?></td>
			<td><?=$user['User']['name']?></td>
			<td><?=$user['User']['email']?></td>
			<td><?=$user['User']['username']?></td>
			<td><?=$user['User']['role']?></td>
			<td>
				<?=$this->Html->link('Editar',array('action'=>'edit',$user['User']['id'])) ?>
				<?=$this->Html->link('Deletar',array('action'=>'delete',$user['User']['id']),null, 'Deseja realmente deletar esse usuario?') ?>
				<?=$this->Html->link('View',array('action'=>'view',$user['User']['id'])) ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
