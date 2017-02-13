<?php

class CanceledSales{
	public $idCanceledSale;
	public $idClient;
	public $idProduct;

	function CanceledSales($idClient ,$idProduct)
	{
		$this->idClient = $idClient;
		$this->idProduct = $idProduct;
	}

}//Fin de CLase


?>