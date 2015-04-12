<?php

class PostsController extends AppController{
	
	public $name = 'Posts';
	
	public function index(){
		$posts = $this->Post->find('all');
		$this->set(compact('posts'));
	}
	
	public function isAuthorized($user) {
		// All registered users can add posts
		if ($this->action === 'submit') {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])) {
				return true;
			}
			else{
				 $this->Session->setFlash(__('<alert>Somente Admin', true));
			}
		}

		return parent::isAuthorized($user);
	}
	
	public function view($id = null){
		if($id && $this->request->isGet()){
			$post = $this->Post->read(null,$id);
			
			$this->set(compact('post'));
		}
	}
	
	public function submit() {
		if ($this->request->is('post')) {
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Post enviado com sucesso!'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}

	public function edit($id = null){
		
		if ($id && $this->request->isGet()){
			$this->request->data = $this->Post->read(null,$id);			
		}else{
			if ($this->Post->save($this->data)){
				$this->Session->setFlash('Post editado com sucesso!');
				$this->redirect(array('action'=>'index'));
			}
		}
		
	}
	
	public function delete($id = null){
		if ($id && $this->request->isGet()){
			if ($this->Post->delete($id))
				$this->Session->setFlash('Post Deletado com sucesso!');
		}
		
		$this->redirect($this->referer()); //Retorna para a pagina que o usuario chegou aqui.
	}
}
?>