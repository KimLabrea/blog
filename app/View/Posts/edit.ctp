<h2>Editar Post</h2>

<?php
	echo $this->Form->create('Post', array('action' => 'edit')),
	$this->Form->input('id'),
	//$this->Form->input('user_id'),
	$this->Form->input('title'),
	$this->Form->input('post'),
	$this->Form->end('Editar');
	
	
?>