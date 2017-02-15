<?php

include_once './Data.php';

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
                . "(" . $idDesired . "," . $idUser . ", " . $idProduct. ",'1',".$date.");");
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

        $queryLike = mysqli_query($conn, "select * from tbproductdesired where idclient = ".$idUser." and active = 1;");
        $rowLike = mysqli_fetch_array($queryLike);
        mysqli_close($conn);

        if (sizeof($rowLike) > 0) {
            return 1;
        } else {
            return 0;
        }
        
    }
            
    
    function updateDesiredProduct($idProduct, $idUser) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdateLike = mysqli_query($conn, "update `tbproductliked` set liked = '0' "
                . "where idproduct = ".$idProduct." and iduser = ".$idUser." ");
        mysqli_close($conn);

        if ($queryUpdateLike) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
