<?php

include_once 'Data.php';
include_once '../../Domain/Product.php';
include_once '../../Domain/SpecificationProduct.php';

/**
 * Description of SpecificationproductData
 *
 * @author Michael Melendez Mesen
 */
class SpecificationproductData extends Data {

    function insertSpecificationProduct($specification, $idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $resultIDSpe = mysqli_query($conn, "select max(idspecification) from tbspecificationproduct");
        $rowSpe = mysqli_fetch_array($resultIDSpe);
        $idSpe = $rowSpe[0] + 1;
        foreach ($specification as $currentSpecification) {
            $queryInsertSpe = mysqli_query($conn, "insert into `tbspecificationproduct` "
                    . "(`idspecification`, `idproduct`, `namespecification`,`valuespecification`) values (" . $idSpe . "," . $idProduct . ", '" . $currentSpecification->getNameSpecification() . "','" . $currentSpecification->getValueSpecification() . "');");
            $resultIDSpe = mysqli_query($conn, "select max(idspecification) from tbspecificationproduct");
            $rowSpe = mysqli_fetch_array($resultIDSpe);
            $idSpe = $rowSpe[0] + 1;
        }
        mysqli_close($conn);

        if ($queryInsertSpe) {
            return true;
        } else {
            return false;
        }
    }

    function getSpecificationProduct($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbspecificationproduct where idproduct = " . $idProduct);
        mysqli_close($conn);
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new SpecificationProduct($row['namespecification'], $row['valuespecification']);
            $currentData->setIdSpecification($row['idspecification']);
            array_push($array, $currentData);
        }
        return $array;
    }

    function updateSpecificationProduct($specification) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdateSpe = mysqli_query($conn, "update tbspecificationproduct set namespecification = '" .
                $specification->getNameSpecification() . "', valuespecification = '" . $specification->getValueSpecification() . "' where idspecification = " . $specification->getIdSpecification() . ";");


        mysqli_close($conn);
        if ($queryUpdateSpe) {
            return true;
        } else {
            return false;
        }
    }
    
    
    
    function deleteSpecificationProduct($idSpecification) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryDeleteSpe = mysqli_query($conn, "delete from tbspecificationproduct where "
                . "idspecification = " . $idSpecification . ";");

        mysqli_close($conn);
        if ($queryDeleteSpe) {
            return true;
        } else {
            return false;
        }
    }
    
    

}
