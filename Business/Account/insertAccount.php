<?php
include "./AccountBusiness.php";
include "../Client/clientBusiness.php";

/* Se obtienen los datos */
session_start();
$idAccount = $_POST['idAccount'];
$idClient = $_SESSION["idUser"];
$CSC = $_POST['CSC'];
$typeAccount = $_POST['typeAccount'];
$expirationDate = $_POST['expirationDate'];
$cardNumber = $_POST['cardNumber'];


$instAccountBusiness = new AccountBusiness();
$instClientBusiness = new clientBusiness();

$direction  = $instClientBusiness->getLocation($idClient);

/*Validamos*/
$resultValidation = $instAccountBusiness->validateEmpty(array($idAccount,$idClient,$typeAccount,$expirationDate,$cardNumber,$CSC, $direction));
#Si existen campos vacios
if($resultValidation == false){ 
	header("location: ../../Presentation/Account/AccountInterface.php?msg=ERROR! Debe ingresar todos los datos solicitados.");
} # Si es ingresado un dato no numerico en un campo de tipo numerico
elseif ($instAccountBusiness->validateNumeric(array($idAccount,$idClient)) === false) {
	header("location: ../../Presentation/Account/AccountInterface.php?msg=Error de tipo numérico.");
} #Si los datos son correctos entonces se hace la consulta en la BD
else{
	//Ordenamos la fecha;
	$tem = split("/",$expirationDate);
	$expirationDate = $tem[2]."-".$tem[0]."-".$tem[1];
	$account = new Account($CSC, $expirationDate, $idClient, $idAccount, $cardNumber, $typeAccount, $direction);
	$result = $instAccountBusiness->insertAccountBusiness($account);
	header("location: ../../Presentation/Account/AccountInterface.php?msg=Se realizó con éxito.");
}

