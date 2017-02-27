<?php

include_once 'Data.php';

/**
 * Description of ProductPointsData
 *
 * @author mm
 */
class ProductPointsData extends Data {
    
    
    function setProductPoints($idProduct){
        
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $resultIdPoints = mysqli_query($conn, "select max(idpoints) from tbproductpoints");
        $row = mysqli_fetch_array($resultIdPoints);
        $idPoints = $row[0] + 1;
        $productPoints = rand(1,10);
        $queryInsertPoinst = mysqli_query($conn, "insert into `tbproductpoints` "
                . "(`idpoints`, `idproduct`, `productpoints`) values "
                . "(" . $idPoints . "," . $idProduct . ", " . $productPoints. ");");
        mysqli_close($conn);

        if ($queryInsertPoinst) {
            return true;
        } else {
            return false;
        }
        
        
    }
    
    
    
    
    
    
}
