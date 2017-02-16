<?php
/**
* Descripción de Cliente
*/
class Client
{
	public $idClient;
	public $emailClient;
	public $userClient;
	public $passwordClient;
	public $nameClient;
	public $surname1Client;
	public $surname2Client;
	public $bornClient;
	public $sexClient;
	public $telephoneClient;
	public $addressClient;
	public $active;
	
	function Client($idClient, $emailClient, $userClient, $passwordClient, $nameClient,
		$surname1Client, $surname2Client, $bornClient, $sexClient, $telephoneClient,
		$addressClient, $active)
	{
		$this->idClient = $idClient;
		$this->emailClient = $emailClient;
		$this->userClient = $userClient;
		$this->passwordClient = $passwordClient;
		$this->nameClient= $nameClient;
		$this->surname1Client= $surname1Client;
		$this->surname2Client= $surname2Client;
		$this->bornClient= $bornClient;
		$this->sexClient= $sexClient;
		$this->telephoneClient= $telephoneClient;
		$this->addressClient= $addressClient;
		$this->active = $active;
	}
}

?>