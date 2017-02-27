<?php

include '../../Data/Frecuency.php';
include '../EvaluationWallBusiness/EvaluationWallBusiness.php';

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

 /*
* Al realizar la insersion del comentario, se corre un algoritmo
* que analiza el comentario.
*/

$instEvaluation = new EvaluationWallBusiness();
$result = $instEvaluation->insertEvaluationWallBusiness($idProduct,$comment,$idClient);
