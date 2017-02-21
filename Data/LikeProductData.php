<?php

include_once 'Data.php';

/**
 * Description of LikeProductData
 *
 * @author mm
 */
class LikeProductData extends Data {

    //put your code here

    function insertLikeProduct($idProduct, $idUser) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $resultIdLike = mysqli_query($conn, "select max(idliked) from tbproductliked");
        $rowLike = mysqli_fetch_array($resultIdLike);
        $idLike = $rowLike[0] + 1;

        $queryInsertLike = mysqli_query($conn, "insert into `tbproductliked` "
                . "(`idliked`, `idproduct`, `iduser`,`liked`) values "
                . "(" . $idLike . "," . $idProduct . ", " . $idUser. ",'1');");
        mysqli_close($conn);

        if ($queryInsertLike) {
            return true;
        } else {
            return false;
        }
    }
    
    function getProductLiked($idProduct,$idUser){
        
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryLike = mysqli_query($conn, "select * from tbproductliked where idproduct ="
                . " ".$idProduct." and liked = '1' and iduser = ".$idUser.";");
        $rowLike = mysqli_fetch_array($queryLike);
        mysqli_close($conn);

        if (sizeof($rowLike) > 0) {
            return 1;
        } else {
            return 0;
        }
        
    }
            
    
    function updateLikeProduct($idProduct, $idUser) {

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
