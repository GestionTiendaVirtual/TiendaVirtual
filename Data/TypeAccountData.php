<?php
//include 'Data.php';
include '../../Domain/TypeAccount.php';

class TypeAccountData extends Data {
	
    /* Optener un id viable para una cuenta nueva */
    /*public function getIDData(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idAccount) from tbaccount";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $row = mysqli_fetch_array($result);
        return $row[0]+1; #Se le suma uno para que sea el id de una nueva cuenta.
    }*/

    /* Obtener todos los tipos de cuenta */
    public function getTypeAccountData(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from tbtypeaccount";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myTypeAccount = new TypeAccount($row['idtypeaccount'], $row['nametypeaccount']);
            array_push($array, $myTypeAccount);
        }
        return $array;
    }
    
}