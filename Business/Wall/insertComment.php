<?php

include '../../Data/Frecuency.php';
$frecuency = new Frecuency();
$result = $frecuency->updateWall();


include "./WallBusiness.php";
/* Se obtienen los datos */
$comment = $_POST['comment'];
$idProduct = $_POST['idProduct'];
session_start();
$idClient = $_SESSION["idUser"];
$wall = new WallBusiness();
$result = $wall->insertCommentBusiness($idProduct,$comment,$idClient);
header("location: ../../Presentation/WallView/Wall.php?idProduct=".$idProduct);
//$instAccountBusiness = new AccountBusiness();
