<?php

include_once 'Data.php';

/**
 * Description of DesiredProductData
 *
 * @author mm
 */
class DesiredProductData extends Data {
    
    function insertDesiredProduct($idProduct, $idUser, $date) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $resultIdDesired = mysqli_query($conn, "select max(iddesired) from tbproductdesired");
        $rowDesired = mysqli_fetch_array($resultIdDesired);
        $idDesired = $rowDesired[0] + 1;

        $queryInsertDesired = mysqli_query($conn, "insert into `tbproductdesired` "
                . "(`iddesired`, `idclient`, `idproduct`,`active`,`dateactive`) values "
                . "(" . $idDesired . "," . $idUser . ", " . $idProduct. ",'1','".$date."');");
        mysqli_close($conn);

        if ($queryInsertDesired) {
            return true;
        } else {
            return false;
        }
    }
    
    function getDesiredProducts($idUser){
        
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryProducts = mysqli_query($conn, "select pro.idproduct, pro.nameProduct, pro.brand, pro.model, "
                . "pro.serie, pro.price from tbproduct pro inner join "
                . "tbproductdesired prd on pro.idProduct = prd.idproduct where prd.idclient = ".$idUser." and prd.active = 1;");
        $array = [];
         while ($rowProduct = mysqli_fetch_array($queryProducts)) {
            $currentProduct = $rowProduct['idproduct'] .";". $rowProduct['nameProduct'] .
                    ";". $rowProduct['brand'] .";".$rowProduct['model'] .";".
                    $rowProduct['serie'].";".$rowProduct['price'];

            array_push($array, $currentProduct);
        }
        mysqli_close($conn);

        if (sizeof($array) > 0) {
            return $array;
        } else {
            return 0;
        }
        
    }
            
    
    function updateDesiredProduct($idProduct, $idUser) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdateDesired = mysqli_query($conn, "update `tbproductdesired` set active = 0 "
                . "where idproduct = ".$idProduct." and idclient = ".$idUser.";");
        mysqli_close($conn);

        if ($queryUpdateDesired) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
