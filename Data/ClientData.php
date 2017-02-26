<?php
include_once 'Data.php';
include_once '../../Domain/Client.php';

/*
* Conexión a BD referente a cliente.
*/
class ClientData extends Data
{
	/*
    * Función que inserta un nuevo cliente en la Base de Datos 
    */
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

            $client->telephoneClient . "','". $client->addressClient ."',1,0)";

        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;	
	}


    /* 
    * Función que obtiene un cliente por id de la Base de Datos
    */
    public function getClientByIdData($idClient){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "select * from tbclient where idClient = ".$idClient." and active = 1";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        if($row = mysqli_fetch_array($result)) {
            $bornClient = date_create($row['bornClient']);
            
            $clientResult = new Client($row['idClient'], $row['emailClient'], $row['userClient'], 
                            $row['passwordClient'], $row['nameClient'], $row['surname1Client'],
                            $row['surname2Client'], $bornClient, $row['sexClient'], 
                            $row['telephoneClient'], $row['addressclient'], $row['active']);

            return $clientResult;
        }else{
            return false;
        }
    }

    /*
    * Actualiza un cliente en específico
    */
    public function updateClientData($client){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        /*
        * Se actualiza la ubicacion de las cuentas que le pertenecen al cliente a actualizar
        */
        $query = "update tbaccount set direction = '". $client->addressClient .
                "' where idClient = ". $client->idClient;
        mysqli_query($conn, $query);

        /*
        * Se actualiza la informacion del cliente
        */
        $query = "update tbclient set emailClient = '".
            $client->emailClient."',userClient = '". $client->userClient ."', passwordClient = '".
            $client->passwordClient ."',nameClient = '". $client->nameClient ."',surname1Client='".
            $client->surname1Client ."',surname2Client='". $client->surname2Client ."',bornClient='". 
            date_format($client->bornClient, "Y-m-d") ."',sexClient='". $client->sexClient .
            "',telephoneClient='". $client->telephoneClient . "',addressclient='".
            $client->addressClient ."' where idClient = ". $client->idClient;
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result; 
    }

    /*
    * Valida que no exista un correo o usuario en cliente que coincida con los nuevos datos.
    * Retorna true si existe y false si no existen coincidencias
    */
    public function validateExistsData($client){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "select count(idClient) as numresult from tbclient where 
                (lower(emailClient) = lower('".$client->emailClient."') OR
                lower(userClient) = lower('".$client->userClient."')) AND 
                idClient != " . $client->idClient;
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        $row = mysqli_fetch_array($result);
        $numresult = $row['numresult'];
        
        if($numresult > 0){
            return true;
        }else{
            return false;
        }
    }//Fin de la funcion


    /*
    * Obtiene de la BD la localizacion de un cliente en especifico.
    */
    public function getLocationData($idClient){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "select addressclient as addressclient from tbclient where idClient = ".$idClient;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        $row = mysqli_fetch_array($result);
        return $row['addressclient'];
    }//Fin de la funcion

    public function setPointsClient($idClient, $points){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "update tbclient set points = ".$points." where idclient = ".$idClient;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        
        if($result){
            return true;
        }else{
            return false;
        }
        
    }

}//FIn de la clase

?>