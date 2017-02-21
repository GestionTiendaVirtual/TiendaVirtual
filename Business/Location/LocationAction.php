<?php
include_once './LocationBusiness.php';

$instLocationBusiness = new LocationBusiness();
$concatena = "";

/*Obtiene todas las provincias*/
if($_POST['var2'] == 'province'){
	$listProv = $instLocationBusiness->getProvinceBusiness();
	foreach ($listProv as $ProvTem) {
		$concatena .= $ProvTem->getIdProvince() . "?" .$ProvTem->getName() . ";";
	}
}

/*Obtiene el canton de una provincia en especifico*/
else if($_POST['var2'] == 'canton'){
	$listProv = $instLocationBusiness->getCantonBusiness($_POST['var1']);
	foreach ($listProv as $ProvTem) {
		$concatena .= $ProvTem->getIdCanton() . "?" .$ProvTem->getNameCanton() . ";";
	}

	/*Obtiene el distrito de un canton en especifico*/
}else {
	$listProv = $instLocationBusiness->getDistrictBusiness($_POST['var1']);
	foreach ($listProv as $ProvTem) {
		$concatena .= $ProvTem->getIdDistrict() . "?" .$ProvTem->getNameDistrict() . ";";
	}
}


/*Se imprime el resultado pero se elimina el ultimo punto y coma*/
echo substr($concatena, 0, -1);
?>