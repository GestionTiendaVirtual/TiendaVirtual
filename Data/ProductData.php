<?php

include_once 'Data.php';
include_once '../../Domain/Product.php';
include_once '../../Domain/SpecificationProduct.php';

/**
 * Descripcion de ProductData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a Productos 
 * @author Michael Meléndez Mesén
 */
class ProductData extends Data {
    /*     * *
     * Función que permite el registro de los productos en la base de datos
     */

    function insertProduct($product, $arrayImages, $arraySpecifications) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //------------Se insertan los datos de la tabla tbproduct------------------
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultIDProduct = mysqli_query($conn, "select max(idproduct) from tbproduct");
        $rowPr = mysqli_fetch_array($resultIDProduct);
        $idProduct = $rowPr[0] + 1;
        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn, "insert into tbproduct values (" . $idProduct . ",'" .
                $product->getBrand() . "','" .
                $product->getModel() . "'," .
                $product->getPrice() . ",'" . $product->getDescription() . "', 1," .
                $product->getTypeProduct() . " , "
                . "'" . $product->getName() . "','" .
                $product->getCharacteristics() . "','" . $product->getSerie() . "', 1);");

        //-----------------------------------------------------------------------------------
        //-----------se insertan los colores del producto-----------------------------------
        $resultIdColor = mysqli_query($conn, "select max(idcolor) from tbproductcolor");
        $rowColor = mysqli_fetch_array($resultIdColor);
        $idColor = $rowColor[0] + 1;
        $colors = split(";", $product->getColor());
        for ($i = 0; $i < sizeof($colors); $i++) {
            if ($colors[$i] != "") {
                $queryColor = mysqli_query($conn, "insert into `tbproductcolor` "
                        . "(`idcolor`, `idproduct`, `color`) values (" . $idColor . ", "
                        . "" . $idProduct . ", '" . $colors[$i] . "');");
                $resultIdColor = mysqli_query($conn, "select max(idcolor) from tbproductcolor");
                $rowColor = mysqli_fetch_array($resultIdColor);
                $idColor = $rowColor[0] + 1;
            }
        }
        //-----------------------------------------------------------------------------------
        //-----------se insertan las imagenes del producto-----------------------------------
        $resultID = mysqli_query($conn, "select max(idimage) from tbimageproduct");
        $row = mysqli_fetch_array($resultID);
        $id = $row[0] + 1;

        for ($i = 0; $i < sizeof($arrayImages); $i++) {
            $queryInsertImages = mysqli_query($conn, "insert into `tbimageproduct` "
                    . "(`idImage`, `pathImage`, `idProduct`) values (" . $id . ", "
                    . "'" . $arrayImages[$i] . "', " . $idProduct . ");");
            $resultID = mysqli_query($conn, "select max(idimage) from tbimageproduct");
            $rowNew = mysqli_fetch_array($resultID);
            $id = $rowNew[0] + 1;
        }
        //-----------------------------------------------------------------------------------
        //--------------------se insertan las especificaiones del producto--------------------
        $resultIDSpe = mysqli_query($conn, "select max(idspecification) from tbspecificationproduct");
        $rowSpe = mysqli_fetch_array($resultIDSpe);
        $idSpe = $rowSpe[0] + 1;
        foreach ($arraySpecifications as $currentSpecification) {
            $queryInsertSpe = mysqli_query($conn, "insert into `tbspecificationproduct` "
                    . "(`idspecification`, `idproduct`, `namespecification`,`valuespecification`) values (" . $idSpe . "," . $idProduct . ", '" . $currentSpecification->getNameSpecification() . "','" . $currentSpecification->getValueSpecification() . "');");
            $resultIDSpe = mysqli_query($conn, "select max(idspecification) from tbspecificationproduct");
            $rowSpe = mysqli_fetch_array($resultIDSpe);
            $idSpe = $rowSpe[0] + 1;
        }
        //--------------------------------------------------------------------------------------

        mysqli_close($conn);

        if ($queryInsert == true && $queryInsertImages == true &&
                $queryInsertSpe == true && $queryColor == true) {
            return $idProduct;
        } else {
            return false;
        }
    }

//fin function insertProduct

    /*     * *
     * Función que permite la obtención de todos los registro de 
     * producto de la base de datos
     */

    function getProducts() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbproduct` where active != 0 order by brand asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], "", $row['description'], $row['nameProduct'], $row['characteristics'], $row['serie']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            $colors = "";
            $resultColors = mysqli_query($conn, "select * from tbproductcolor where idproduct = " . $idProduct);
            while ($rowColor = mysqli_fetch_array($resultColors)) {
                $colors .= $rowColor['color'] . ';';
            }
            $currentData->setColor($colors);

            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }
    
    function getProductsTypeProduct($idTypeProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbproduct` where active != 0 and idtypeproduct = ".$idTypeProduct." order by brand asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], "", $row['description'], $row['nameProduct'], $row['characteristics'], $row['serie']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            $colors = "";
            $resultColors = mysqli_query($conn, "select * from tbproductcolor where idproduct = " . $idProduct);
            while ($rowColor = mysqli_fetch_array($resultColors)) {
                $colors .= $rowColor['color'] . ';';
            }
            $currentData->setColor($colors);

            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }
            

    function getProductsWall($id) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbproduct` where active != 0 and idTypeProduct = " . $id . " order by brand asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], $row['color'], $row['description'], $row['nameProduct']);
            $currentData->setIdProduct($row['idProduct']);
            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }

//fin función getProducts

    /*     * *
     * Función que permite la actualización de un producto en la base de datos
     */

    function updateProduct($product) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la actualizacion en la base de datos
        $queryUpdate = mysqli_query($conn, "update tbproduct set brand = '" . $product->getBrand() . "', model = '" .
                $product->getModel() . "', price = " .
                $product->getPrice() . ","
                . "description = '" . $product->getDescription()
                . "', nameproduct = '" . $product->getName() . "', "
                . "characteristics = '" . $product->getCharacteristics() . "', serie = '" . $product->getSerie() . "' where tbproduct.idproduct = " . $product->getIdProduct() . ";");
        mysqli_close($conn);

        if ($queryUpdate == true) {
            return true;
        } else {
            return false;
        }
    }

    function insertColorProduct($idProduct, $color) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $resultIdColor = mysqli_query($conn, "select max(idcolor) from tbproductcolor");
        $rowColor = mysqli_fetch_array($resultIdColor);
        $idColor = $rowColor[0] + 1;
        $colors = split(";", $color);
        for ($i = 0; $i < sizeof($colors); $i++) {
            if ($colors[$i] != "") {
                $queryColor = mysqli_query($conn, "insert into `tbproductcolor` "
                        . "(`idcolor`, `idproduct`, `color`) values (" . $idColor . ", "
                        . "" . $idProduct . ", '" . $colors[$i] . "');");
                $resultIdColor = mysqli_query($conn, "select max(idcolor) from tbproductcolor");
                $rowColor = mysqli_fetch_array($resultIdColor);
                $idColor = $rowColor[0] + 1;
            }
        }
        mysqli_close($conn);
        if ($queryColor == true) {
            return true;
        } else {
            return false;
        }
    }

//fin función updateProduct

    /*     * *
     * Función que permite realizar la eliminación de algun registro en la base de datos
     */

    function stateProduct($idProduct) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn, "update tbproduct set active = 0 where idproduct = " . $idProduct . ";");
        mysqli_close($conn);

        if ($queryDelete) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteProduct

    function deleteImageProduct($idProduct, $path) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDeleteImage = mysqli_query($conn, "delete from tbimageproduct where idproduct = " . $idProduct . " and pathImage = '" . $path . "';");

        mysqli_close($conn);

        if ($queryDeleteImage == true) {
            return true;
        } else {
            return false;
        }
    }

    function deleteColorProduct($idProduct, $color) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDeleteColor = mysqli_query($conn, "delete from tbproductcolor where idproduct = " . $idProduct . " and color = '" . $color . "';");

        mysqli_close($conn);

        if ($queryDeleteColor == true) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteProduct

    function insertImageProduct($idProduct, $arrayPath) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $resultID = mysqli_query($conn, "select * from tbimageproduct order by idimage desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idImage'] + 1;
        } else {
            $id = 1;
        }
        for ($i = 0; $i < sizeof($arrayPath); $i++) {
            $queryInsertImages = mysqli_query($conn, "insert into `tbimageproduct` "
                    . "(`idimage`, `pathimage`, `idproduct`) values (" . $id . ", "
                    . "'" . $arrayPath[$i] . "', " . $idProduct . ");");
            $resultID = mysqli_query($conn, "select  * from tbimageproduct order by idimage desc limit 1");
            $rowNew = mysqli_fetch_array($resultID);
            $id = $rowNew['idImage'] + 1;
        }
        mysqli_close($conn);
        if ($queryInsertImages == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductByID($idProduct) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbproduct where idproduct = " . $idProduct);
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], "", $row['description'], $row['nameProduct'], $row['characteristics'], $row['serie']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            $colors = "";
            $resultColors = mysqli_query($conn, "select * from tbproductcolor where idproduct = " . $idProduct);
            while ($rowColor = mysqli_fetch_array($resultColors)) {
                $colors .= $rowColor['color'] . ';';
            }
            $currentData->setColor($colors);

            array_push($array, $currentData);
        }
        return $array;
    }
    
//fin función getTypeProducts
}
