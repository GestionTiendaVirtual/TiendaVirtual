<?php




include "./RankingBusiness.php";

$value = $_GET['value'];
$idProduct = $_GET['idProduct'];
$ranking = new RankingBusiness();
$result = $ranking->calificationBusiness($idProduct, $value);
header("location: ../../Presentation/Product/ProductDetail.php?idProduct=".$idProduct);