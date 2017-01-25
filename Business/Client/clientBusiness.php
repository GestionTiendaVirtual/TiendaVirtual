<?php
include '../../Data/clientData.php';
/**
 * Descripcion de clientBusiness
 * Clase donde se realizan las conexiones entre la interface y la clase data , 
 * para llevar a cabo el CRUD que corresponde a client
 * @author Alberth Calderon Alvarado
 */
class clientBusiness
{
    public $clientData;
    
    function clientBusiness() {
        $this->clientData = new clientData();
    }
    public function deleteClient($idClient) {
        return $this->clientData->deleteClient($idClient);
    }

    public function getClient() {
        return $this->clientData->getClient();
    }

    public function insertClient($client) {
        return $this->clientData->insertClient($client);
    }

    public function updateClient($client) {
        return $this->clientData->updateClient($client);
    }



}


