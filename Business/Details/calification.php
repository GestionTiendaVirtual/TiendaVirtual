<?php

$idProductCalificated = $_POST['idProductCalification'];
$idUserCalificated = $_POST['idUserCalification'];
$calification = $_POST['Estrellas'];
include '../../Business/Details/detailsBusiness.php';
$detailsBusiness = new detailsBusiness();

$star = new star($idProductCalificated, $idUserCalificated, $calification);

$result = $detailsBusiness->insertCalification($star);
if ($result) {
    header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductCalificated . "");
} else {
    header('location: ../../Presentation/Product/ProductDetail.php?idProduct=' . $idProductCalificated . "");
}
?>
    
