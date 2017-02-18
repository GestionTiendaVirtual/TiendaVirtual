<?php
include_once '../../Data/ClientData.php';

/**
* Capa de negocios para cliente.
*/
class ClientBusiness extends ClientData
{
	
	/*
	* Insertar cliente
	*/
	public function insertClientBusiness($client){
		return $this->insertClientData($client);
	}

	/*
	* Obtener cliente por id
	*/
	public function getClientByIdBusiness($idClient){
		return $this->getClientByIdData($idClient);
	}

	/*
	* Actualizar un cliente
	*/
	public function updateClientBusiness($client){
		return $this->updateClientData($client);
	}

}//Fin de la clase


?>