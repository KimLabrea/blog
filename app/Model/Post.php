<?php

class Post extends AppModel {
    
	public $name = 'Post';
	
	public function isOwnedBy($post, $user) {
		return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}	
}
?>