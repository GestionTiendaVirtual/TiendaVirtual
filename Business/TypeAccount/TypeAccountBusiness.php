<?php 
include "../../Data/TypeAccountData.php";

class TypeAccountBusiness extends TypeAccountData{

	public function getTypeAccountBusiness(){
		return $this->getTypeAccountData();
	}
}