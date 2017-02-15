<?php
include_once '../../Data/ClientData.php';

/**
* Capa de negocios para cliente.
*/
class ClientBusiness extends ClientData
{
	
	/* Insertar cliente */
	public function insertClientBusiness($client)
	{
		return $this->insertClientData($client);
	}



	/* Valida que los datos no esten vacios*/
	public function validateEmpty($arrayVar){
		foreach ($arrayVar as $tem) {
			if (trim($tem) == '') {
				return false;
			}
		}
		return true;
	}

	/*Valida que los datos ingresados sean numericos*/
	public function validateNumeric($arrayVar){
		foreach ($arrayVar as $tem) {
			if ((filter_var(trim($tem), FILTER_VALIDATE_INT)) === false) {
				return false;
			}
		}
		return true;
	}



}//Fin de la clase


?>