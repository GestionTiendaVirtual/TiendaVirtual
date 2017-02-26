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

	/*
	* Valida si existe un cliente
	*/
	public function validateExistsBusiness($client){
		return $this->validateExistsData($client);
	}

	/*
	* Obtiene la localizacion de un cliente en especifico.
	*/
	public function getLocationBusiness($idClient){
		return $this->getLocationData($idClient);
	}
        
        public function setPointsClient($idClient, $points){
            return $this->setPointsClient($idClient, $points);
        }

}//Fin de la clase


?>