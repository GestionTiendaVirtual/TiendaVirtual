<?php 
include_once "../../Data/CanceledSaleData.php";

class CanceledSalesBusiness extends CanceledSaleData{

	public function insertCanceledSaleBusiness($CanceledSale){
		return $this->insertCanceledSaleData($CanceledSale);
	}
}