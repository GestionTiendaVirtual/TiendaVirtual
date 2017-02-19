<?php
/*
* Clase de puente entre la capa de Presentacion y la capa de Datos
*/

include_once '../../Data/SexualPreferencesData.php';
class SexualPreferencesBusiness extends SexualPreferencesData
{
	
	/*
	* Funcion que obtiene todas las preferencias sexuales
	* de la capa de Datos
	*/
	function getAllSexualPreferencesBusiness(){
		return $this->getAllSexualPreferencesData();
	}
	
}
?>