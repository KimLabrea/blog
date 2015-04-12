<h2>Editar Usuarios</h2>

<?php
	echo $this->Form->create('User', array('action' => 'edit')),
	$this->Form->input('id'),
	$this->Form->input('name'),
	$this->Form->input('email'),
	$this->Form->input('username'),
	$this->Form->input('password'),
	$this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
	)),
	$this->Form->end('Editar');
	
	
?>