<?php 
include_once "../../Data/AccountData.php";

class AccountBusiness extends AccountData{

	public function getAllAccountAssetsBusiness(){
		return $this->getAllAccountAssetsData();
	}

	public function insertAccountBusiness($account){
		return $this->insertAccountData($account);
	}

	public function deactivateAccountBusiness($idAccount){
		return $this->deactivateAccountData($idAccount);
	}
	
	public function getIDBusiness(){
		return $this->getIdData();
	}

	public function getAccountByIdBusiness($idAccount) {
		return $this->getAccountByIdData($idAccount);
	}

	public function updateAccountBusiness($account){
		return $this->updateAccountData($account);
	}

	
}