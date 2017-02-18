<?php
include_once './ClientBusiness.php';
include_once '../../Domain/Client.php';
include_once '../Validations.php';

$instClientBusiness = new ClientBusiness();
$instValidations =  new Validations();

$idClient = $_POST['id'];
$emailClient = $_POST['email'];
$userClient = $_POST['user'];
$passwordClient = $_POST['password'];
$nameClient = $_POST['name'];
$surname1Client = $_POST['surname1'];
$surname2Client = $_POST['surname2'];
$bornClient = date_create($_POST['born']);
$sexClient = $_POST['sex'];
$telephoneClient = $_POST['telephone'];

$province = $_POST['province'];
$canton = $_POST['canton'];
$district = $_POST['district'];
$otherReviews = $_POST['otherReviews'];
$active = $_POST['active'];

/*
* Validaciones
*/
$resultEmpty =  $instValidations->validateEmpty(array($emailClient, $userClient, 
				$passwordClient, $nameClient, $surname1Client, $surname2Client,
				$_POST['born'], $sexClient, $telephoneClient, $province, 
				$canton, $district, $otherReviews));

$resultNumeric = $instValidations->validateNumeric(array($idClient,$telephoneClient,
				$province, $canton, $district, $active));

/*
* Se inserta o se devuelve error
*/

if($resultEmpty){
	if($resultNumeric){
		$addressClient = $province.";".$canton.";".$district.";".$otherReviews;

		$client = new Client($idClient, $emailClient, $userClient, $passwordClient, 
							$nameClient, $surname1Client, $surname2Client, $bornClient,
							$sexClient,	$telephoneClient, $addressClient, $active);

		$result = $instClientBusiness->updateClientBusiness($client);

		header("location: ../../Presentation/Client/ClientUpdate.php?Success=Success");
	}else{
		header("location: ../../Presentation/Client/ClientUpdate.php?Error=Numeric");
	}
}else{
	header("location: ../../Presentation/Client/ClientUpdate.php?Error=Empty");
}

?>