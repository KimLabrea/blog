<?php

class UsersController extends AppController{
	
	public $name = 'Users';
	
	public function index(){
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
	}
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('signup','logout');
    }

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash(__('Usuario ou senha incorreta, tente novamente.'));
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function view($id = null){
		if($id && $this->request->isGet()){
			$user = $this->User->read(null,$id);
			
			$this->set(compact('user'));
		}
	}
	
	public function signup(){
		if($this->request->isPost()){
			if ($this->User->save($this->data)){
				$this->Session->setFlash('Usuario cadastrado com sucesso!');
				$this->request->data = array(); //Limpar formulário
			}
		}
	}
	
	public function edit($id = null){
		if($id && $this->request->isGet()){
			$this->request->data = $this->User->read(null,$id);
		}else{
			if ($this->User->save($this->data)){
				$this->Session->setFlash('Usuario editado com sucesso!');
				$this->redirect(array('action'=>'index'));
			}
		}
		
	}
	
	public function delete($id = null){
		if ($id && $this->request->isGet()){
			if ($this->User->delete($id))
				$this->Session->setFlash('Usuario Deletado com sucesso!');
		}
		
		$this->redirect($this->referer()); //Retorna para a pagina que o usuario chegou aqui.
	}
	
	public function config($id = null){
		if($id && $this->request->isGet()){
			$user = $this->User->read(null,$id);
			
			$this->set(compact('user'));
		}
	}
}
?>