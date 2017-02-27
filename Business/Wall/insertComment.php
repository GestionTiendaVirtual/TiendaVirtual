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

/*
for ($numCri=0; $numCri < count($result); $numCri++) { 
			$criterion = $result[$numCri];
			$listMetrics = $criterion['metrics'];

			//Recorremos cada metrica del criterio obtenido del primer for
			for ($numMetric=0; $numMetric < count($listMetrics); $numMetric++) { 
				echo "criterio: ". $listMetrics[$numMetric][0] .
					 "  num: " .  $listMetrics[$numMetric][1] . "<br><br>";
			}

		}//Fin criterios
*/