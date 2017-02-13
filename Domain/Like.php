<?php 

class Like{
	private $idLike;
	private $idComment;
	private $idUser;
	private $state;
	
	function Like($state){
		$this->state= $state;
	}

	function getState(){
		 return $this->state;
	}
	

}