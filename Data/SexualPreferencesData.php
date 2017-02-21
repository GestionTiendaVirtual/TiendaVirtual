<?php
/**
* COnexion a BD referente a preferencias sexuales
*/

include_once 'Data.php';
include_once '../../Domain/SexualPreferences.php';

class SexualPreferencesData extends Data
{
	
	/*
    * Funcion que obtiene todas las preferencias sexuales de la BD
    */
    public function getAllSexualPreferencesData() {
    	
    	$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from tbsexualpreferences";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $preferenceTem = new SexualPreferences($row['idSex'], $row['nameSex']);
            array_push($array, $preferenceTem);
        }
        
        return $array;
    }//Fin de la funcion
}
?>