<?php

include_once '../../Domain/ModificationProduct.php';
include_once 'Data.php';

/**
 * Description of ModificationsProduct
 *
 * @author mm
 */
class ModificationsProductData extends Data {

    function setBasicAttributes($productModification) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameproduct, price, description,"
                . "characteristics from tbproduct where idproduct = " .
                $productModification->getIdProduct());
        $row = mysqli_fetch_array($result);

        $name = "0";
        $price = "0";
        $description = "0";
        $characteristics = "0";

        if ($productModification->getNameProduct() != $row['nameproduct']) {
            $name = $productModification->getNameProduct();
        }
        if ($productModification->getCharacteristicsProduct() != $row['characteristics']) {
            $characteristics = $productModification->getCharacteristicsProduct();
        }
        if ($productModification->getDescriptionProduct() != $row['description']) {
            $description = $productModification->getDescriptionProduct();
        }
        if ($productModification->getPriceProduct() != $row['price']) {
            $price = $productModification->getPriceProduct();
        }

        $resultID = mysqli_query($conn, "select max(idmodification) from tbproductmodifications");
        $rowNew = mysqli_fetch_array($resultID);
        $id = $rowNew[0] + 1;

        $queryInsertModification = mysqli_query($conn, "insert into `tbproductmodifications` "
                . "(`idmodification`, `idproduct`, `nameproduct`, `priceproduct`, "
                . "`descriptionproduct`, `characteristicsproduct`, `colorproduct`, "
                . "`specificationproduct`, `imagesproduct`, `active`) values "
                . "(" . $id . "," . $productModification->getIdProduct() . ","
                . "'" . $name . "'," . $price . ",'" . $description . "','" . $characteristics . "',"
                . "0,0,0,1);");
        mysqli_close($conn);
        if ($queryInsertModification) {
            return true;
        } else {
            return false;
        }
    }

    function setAttributeSpecification($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select idmodification,specificationproduct"
                . " from tbproductmodifications where idproduct = " . $idProduct. " and active = 1");
        $row = mysqli_fetch_array($result);
        $queryUpdateModification = false;
        $queryInsertModification = false;
        if ($row['specificationproduct'] == 0) {
            $queryUpdateModification = mysqli_query($conn, "update tbproductmodifications set "
                    . "specificationproduct = '1' where idproduct = " . $idProduct . " "
                    . "and idmodification = " . $row['idmodification']);
        } else {
            $resultID = mysqli_query($conn, "select max(idmodification) from tbproductmodifications");
            $rowNew = mysqli_fetch_array($resultID);
            $id = $rowNew[0] + 1;

            $queryInsertModification = mysqli_query($conn, "insert into `tbproductmodifications` "
                    . "(`idmodification`, `idproduct`, `nameproduct`, `priceproduct`, "
                    . "`descriptionproduct`, `characteristicsproduct`, `colorproduct`, "
                    . "`specificationproduct`, `imagesproduct`, `active`) values "
                    . "(" . $id . "," . $idProduct . ","
                    . "'0',0,'0','0',0,1,0,1);");
        }
        mysqli_close($conn);
        if($queryUpdateModification == true || $queryInsertModification == true){
            return true;
        }else{
            return false;
        }
    }
    
     function setAttributeColor($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select idmodification,colorproduct " 
                . "from tbproductmodifications where idproduct = " . $idProduct." and active = 1");
        $row = mysqli_fetch_array($result);
        $queryUpdateModification = false;
        $queryInsertModification = false;
        if ($row['colorproduct'] == 0) {
            $queryUpdateModification = mysqli_query($conn, "update tbproductmodifications set "
                    . "colorproduct = 1 where idproduct = " . $idProduct . " "
                    . "and idmodification = " . $row['idmodification']);
        } else {
            $resultID = mysqli_query($conn, "select max(idmodification) from tbproductmodifications");
            $rowNew = mysqli_fetch_array($resultID);
            $id = $rowNew[0] + 1;

            $queryInsertModification = mysqli_query($conn, "insert into `tbproductmodifications` "
                    . "(`idmodification`, `idproduct`, `nameproduct`, `priceproduct`, "
                    . "`descriptionproduct`, `characteristicsproduct`, `colorproduct`, "
                    . "`specificationproduct`, `imagesproduct`, `active`) values "
                    . "(" . $id . "," . $idProduct . ","
                    . "'0',0,'0','0',1,0,0,1);");
        }
        mysqli_close($conn);
        if($queryUpdateModification == true || $queryInsertModification == true){
            return true;
        }else{
            return false;
        }
    }
    
    
     function setAttributeImages($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $resultImages = mysqli_query($conn, "select idmodification, imagesproduct " 
                . "from tbproductmodifications where idproduct = " . $idProduct." and active = 1");
        
        $rowImages = mysqli_fetch_array($resultImages);
        
        $queryUpdateModification = false;
        $queryInsertModification = false;
        if ($rowImages['imagesproduct'] == 0) {
            $queryUpdateModification = mysqli_query($conn, "update tbproductmodifications set "
                    . "imagesproduct = 1 where idproduct = " . $idProduct . " "
                    . "and idmodification = " . $rowImages['idmodification']);
        } else {
            $resultID = mysqli_query($conn, "select max(idmodification) from tbproductmodifications");
            $rowNew = mysqli_fetch_array($resultID);
            $id = $rowNew[0] + 1;

            $queryInsertModification = mysqli_query($conn, "insert into `tbproductmodifications` "
                    . "(`idmodification`, `idproduct`, `nameproduct`, `priceproduct`, "
                    . "`descriptionproduct`, `characteristicsproduct`, `colorproduct`, "
                    . "`specificationproduct`, `imagesproduct`, `active`) values "
                    . "(" . $id . "," . $idProduct . ","
                    . "'0',0,'0','0',0,0,1,1);");
        }
        mysqli_close($conn);
        if($queryUpdateModification == true || $queryInsertModification == true){
            return true;
        }else{
            return $rowImages['imagesproduct'];
        }
    }
    

}
