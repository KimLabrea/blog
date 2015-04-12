<h2>Cadastrar Usuarios</h2>

<?php
	echo $this->Form->create('User', array('action' => 'signup')),
	$this->Form->input('name'),
	$this->Form->input('email'),
	$this->Form->input('username'),
	$this->Form->input('password'),
	$this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
			)),
	$this->Form->end('Cadastrar');
	
	
?>