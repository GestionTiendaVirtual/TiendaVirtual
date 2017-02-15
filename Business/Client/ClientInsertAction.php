<?php
include_once './ClientBusiness.php';
include_once '../../Domain/Client.php';
$instClientBusiness = new ClientBusiness();

$idClient = 0;
$emailClient = $_POST['email'];
$userClient = $_POST['user'];
$passwordClient = $_POST['password'];
$nameClient = $_POST['name'];
$surname1Client = $_POST['surname1'];
$surname2Client = $_POST['surname2'];
$bornClient = date_create($_POST['born']);
$sexClient = $_POST['sex'];
$telephoneClient = $_POST['telephone'];
$addressClient = $_POST['address'];
$active = 0;

$client = new Client($idClient, $emailClient, $userClient, $passwordClient, $nameClient,
		$surname1Client, $surname2Client, $bornClient, $sexClient, $telephoneClient,
		$addressClient, $active);

$result = $instClientBusiness->insertClientBusiness($client);

echo $result;

?>