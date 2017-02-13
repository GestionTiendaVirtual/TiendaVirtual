<?php

include_once 'Data.php';

class Frecuency extends Data {

    function createFrecuency() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select  max(idfrecuency) from tbfrecuency";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        $valor = $row['max(idfrecuency)'] + 1;
        //session_start();
        $idClient = $_SESSION["idUser"];
        $date = date('Y-m-d');
        $contador = 0;


        $query2 = "insert into tbfrecuency values($valor,'$date',$idClient,$contador,$contador,$contador)";
        $result2 = mysqli_query($conn, $query2);
        mysqli_close($conn);
    }

    function updateWall() {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idfrecuency) from tbfrecuency";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        $valor = $row['max(idfrecuency)'];
        $query2 = "update tbfrecuency set participationwall=participationwall+1 where idfrecuency=$valor";
        $result2 = mysqli_query($conn, $query2);
        mysqli_close($conn);
    }

    function updateSearch() {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idfrecuency) from tbfrecuency";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        $valor = $row['max(idfrecuency)'];
        $query2 = "update tbfrecuency set searchproduct=searchproduct+1 where idfrecuency=$valor";
        $result2 = mysqli_query($conn, $query2);
        mysqli_close($conn);
    }

    function updateView($idProduct) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idfrecuency) from tbfrecuency";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        $valor = $row['max(idfrecuency)'];
        $query2 = "update tbfrecuency set viewproduct=viewproduct+1 where idfrecuency=$valor";
        $result2 = mysqli_query($conn, $query2);
        
        $query4="select * from tbfrecuencyview where idfrecuency=$valor and idproduct=$idProduct";
        $result4 = mysqli_query($conn, $query4);
        $row= mysqli_fetch_array($result4);
        if (sizeof($row) >= 1) {
            $query5="update tbfrecuencyview set countview=countview+1 where idfrecuency=$valor and idproduct=$idProduct";
            $result5 = mysqli_query($conn, $query5);
	}
	else{
            $query3="insert into tbfrecuencyview (idfrecuency,idproduct,countview) values($valor,$idProduct,1)";
            $result3 = mysqli_query($conn, $query3);  
	}
	
            
           
        
        mysqli_close($conn);
    }

}

?>
