<?php

/*
 * Descripcion de Tipo de producto
 * Clase donde se maneja el objeto cliente,
 * @author Alberth Calderon Alvarado
 */

class client {
    
    public $idClient;
    public $emailClient;
    public $userClient;
    public $passwordClient;
    public $nameClient;
    public $lastNameFClient;
    public $lastNameSClient;
    public $bornClient;
    public $sexClient;
    public $telephoneClient;
    public $addressClient;

    public function Client($emailClient, $userClient, $passwordClient, $nameClient, 
            $lastNameFClient, $lastNameSClient, $bornClient, $sexClient, 
            $telephoneClient, $addressClient) {
        $this->emailClient = $emailClient;
        $this->userClient = $userClient;
        $this->passwordClient = $passwordClient;
        $this->nameClient = $nameClient;
        $this->lastNameFClient = $lastNameFClient;
        $this->lastNameSClient = $lastNameSClient;
        $this->bornClient = $bornClient;
        $this->sexClient = $sexClient;
        $this->telephoneClient = $telephoneClient;
        $this->addressClient = $addressClient;
    }

    
    static function ClientInvoice($name,$surname1,$surname2) {
        
        return new self($name,$surname1,$surname2,"","","","");
       
    }
    

    public function getIdClient() {
        return $this->idClient;
    }

    public function getEmailClient() {
        return $this->emailClient;
    }

    public function getUserClient() {
        return $this->userClient;
    }

    public function getPasswordClient() {
        return $this->passwordClient;
    }

    public function getNameClient() {
        return $this->nameClient;
    }

    public function getLastNameFClient() {
        return $this->lastNameFClient;
    }

    public function getLastNameSClient() {
        return $this->lastNameSClient;
    }

    public function getBornClient() {
        return $this->bornClient;
    }

    public function getSexClient() {
        return $this->sexClient;
    }

    public function getTelephoneClient() {
        return $this->telephoneClient;
    }
    public function getAddressClient() {
        return $this->addressClient;
    }

    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    public function setEmailClient($emailClient) {
        $this->emailClient = $emailClient;
    }

    public function setUserClient($userClient) {
        $this->userClient = $userClient;
    }

    public function setPasswordClient($passwordClient) {
        $this->passwordClient = $passwordClient;
    }

    public function setNameClient($nameClient) {
        $this->nameClient = $nameClient;
    }

    public function setLastNameFClient($lastNameFClient) {
        $this->lastNameFClient = $lastNameFClient;
    }

    public function setLastNameSClient($lastNameSClient) {
        $this->lastNameSClient = $lastNameSClient;
    }

    public function setBornClient($bornClient) {
        $this->bornClient = $bornClient;
    }

    public function setSexClient($sexClient) {
        $this->sexClient = $sexClient;
    }

    public function setTelephoneClient($telephoneClient) {
        $this->telephoneClient = $telephoneClient;
    }


    public function setAddressClient($addressClient) {
        $this->addressClient = $addressClient;
    }
  



}
