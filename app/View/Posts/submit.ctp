<h2>Enviar Post</h2>

<?php
	echo $this->Form->create('Post', array('action' => 'submit')),
	$this->Form->input('title'),
	$this->Form->input('post'),
	$this->Form->end('Cadastrar');
?>