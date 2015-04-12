<h1>Posts</h1>
<?=$this->Html->link('Enviar Post',array('action'=>'submit')) ?>
<table>
	<tr>
		<td>ID</td>
		<td>ID_USER</td>
		<td>TITLE</td>
		<td>POST</td>
		<td>ACTIONS</td>
	</tr>
	<?php foreach($posts as $post): ?>
		<tr>
			<td><?=$post['Post']['id']?></td>
			<td><?=$post['Post']['user_id']?></td>
			<td><?=$post['Post']['title']?></td>
			<td><?=$post['Post']['post']?></td>
			<td>
				<?=$this->Html->link('Editar',array('action'=>'edit',$post['Post']['id'])) ?>
				<?=$this->Html->link('Deletar',array('action'=>'delete',$post['Post']['id']),null, 'Deseja realmente deletar esse post?') ?>
				<?=$this->Html->link('View',array('action'=>'view',$post['Post']['id'])) ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
