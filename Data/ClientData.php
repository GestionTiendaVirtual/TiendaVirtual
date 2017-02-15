<?php
include_once 'Data.php';
/*
* Conexión a BD referente a cliente.
*/
class ClientData extends Data
{
	/* Función que inserta un nuevo cliente en la Base de Datos */
	public function insertClientData($client){
		$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $resultID = mysqli_query($conn, "select max(idClient) from tbclient");
        $rowId = mysqli_fetch_array($resultID);
        $idClient = $rowId[0] + 1;

        $query = "insert into tbclient values (". $idClient .",'".$client->emailClient."','".
        	$client->userClient ."','". $client->passwordClient ."','".	$client->nameClient ."','".
        	$client->surname1Client ."','".	$client->surname2Client ."','". 
        	date_format($client->bornClient, "Y-m-d") ."','". $client->sexClient . "','".
                 $client->telephoneClient . "','". $client->addressClient ."',1)";
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;	
	}

}//FIn de la clase

?>