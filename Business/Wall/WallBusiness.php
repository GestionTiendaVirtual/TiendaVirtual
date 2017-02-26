<?php 
include_once "../../Data/WallData.php";

class WallBusiness extends WallData{


	public function getAllCommentBusiness($idTypeProduct){
		return $this->getAllComments($idTypeProduct);
	}

	public function insertCommentBusiness($idProduct,$comment,$idClient){
		return $this->insertComment($idProduct,$comment,$idClient);
	}
	public function getStateBusiness($idClient,$idComment){
		return $this->getStateData($idClient,$idComment);
	}

	public function updateLIkeBusiness($idComment,$user){
		return $this->updateLIke($idComment,$user);
	}
	public function updateLIkeCheckedBusiness($idComment,$user){
		return $this->updateLIkeChecked($idComment,$user);
	}
	public function insertNewLIkeBusiness($idComment,$idClient){
		return $this->insertNewLIke($idComment,$idClient);
	}
	

}
