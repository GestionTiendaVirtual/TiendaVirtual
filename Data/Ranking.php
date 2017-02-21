<?php

include_once 'Data.php';

class Ranking extends Data {

    function show($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $idClient = $_SESSION["idUser"];
        $result = mysqli_query($conn, "select *from tbconcretesales where "
                . "idclient=$idClient and idproduct=$idProduct");
        $row = mysqli_fetch_array($result);
        mysqli_close($conn);

        if (sizeof($row) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function mark($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $idClient = $_SESSION["idUser"];
        $result = mysqli_query($conn, "select calification from tbproductcalification where idproduct=$idProduct and iduser=$idClient");

        $row = mysqli_fetch_array($result);
        $valor = $row[0];

        mysqli_close($conn);
        return $valor;
    }

    function calification($idProduct, $value) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        session_start();
        $idProduct;

        $idClient = $_SESSION["idUser"];
        $$idClient = $_SESSION["idUser"];
        $result = mysqli_query($conn, "select *from tbproductcalification where "
                . "iduser=$idClient and idproduct=$idProduct");
        $row = mysqli_fetch_array($result);


        if (sizeof($row) == 0) {
            $result = mysqli_query($conn, "insert into tbproductcalification(idproduct,iduser,calification) values($idProduct,$idClient,$value)");
        } else {
            $result = mysqli_query($conn, "update tbproductcalification set calification=$value where idproduct=$idProduct and iduser=$idClient");
        }
    }

    function rankingCalification($idProduct) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $idProduct;

        $result = mysqli_query($conn, "select count(calification) from tbproductcalification where idproduct=$idProduct");
        $row = mysqli_fetch_array($result);
        $valor = $row[0];


        $result2 = mysqli_query($conn, "select sum(calification) from tbproductcalification where idproduct=$idProduct");
        $row2 = mysqli_fetch_array($result2);
        $valor2 = $row2[0];



        if($valor != 0 && $valor2 != 0){
            return $final = $valor2 / $valor;
        }
        
        return 0;
    }

}
