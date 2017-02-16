<?php

/*
*  Validaciones -> true(datos correctos)  
*/
class Validations
{
	/* 
	* Valida que los datos no esten vacios
	*/
	public function validateEmpty($arrayVar){
		foreach ($arrayVar as $tem) {
			if (trim($tem) == '') {
				return false;
			}
		}
		return true;
	}

	/*
	* Valida que los datos ingresados sean numericos
	*/
	public function validateNumeric($arrayVar){
		foreach ($arrayVar as $tem) {
			if ((filter_var(trim($tem), FILTER_VALIDATE_INT)) === false) {
				return false;
			}
		}
		return true;
	}
}


?>