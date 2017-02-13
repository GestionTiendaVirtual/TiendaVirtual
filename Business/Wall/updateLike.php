<?php 

include_once "./WallBusiness.php";
$id=$_GET['id'];
$user=$_GET['user'];
$idProduct= $_GET['idProduct'];
$wall = new WallBusiness();
$result = $wall->getStateBusiness($user,$id);
$size=count($result);
echo $size;

if($size==1){
	echo 'entre';
	$wall->updateLIkeBusiness($id,$user);
}
else {
	$wall->insertNewLIkeBusiness($id,$user);
}
header("location: ../../Presentation/WallView/Wall.php?idProduct=".$idProduct);
