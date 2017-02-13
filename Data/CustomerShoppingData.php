<?php

include_once 'Data.php';
include_once '../../Domain/Client.php';
include_once '../../Domain/Product.php';
include_once '../../Domain/CustomerShopping.php';

/**
 * Description of CustomerShopping
 * Clase que se encarga de manejar las funciones correspondientes a la tabla tbCustomerShopping
 * @author Michael Meléndez Mesén
 */
class CustomerShoppingData extends Data {
    
    
     function getCustomerInvoices() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select cus.idSale, cl.nameClient, cl.surname1Client, "
                . "cl.surname2Client, cus.dateSale, cus.totalSale from tbcustomershopping "
                . "cus inner join tbclient cl on cus.idClient = cl.idClient and cus.active != 1;");        
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentClient = Client::ClientInvoice($row['nameClient'], $row['surname1Client'], $row['surname2Client']);
            $currentCusShopping = new CustomerShopping("", $row['dateSale'], $row['totalSale']);
            $currentCusShopping->setIdSale($row['idSale']);
            $arrayNew = array($currentClient,$currentCusShopping);
            array_push($array, $arrayNew);
        }
        mysqli_close($conn);
        return $array;
    }
            

    
    function getCustomerInvoice($idSale) {        
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select cli.nameClient, cli.surname1Client, "
                . "cli.surname2Client, cli.emailClient, cli.addressClient, "
                . "cus.dateSale, cus.totalSale, cus.idSale from tbclient "
                . "cli inner join tbcustomershopping cus on cli.idClient = "
                . "cus.idClient where cus.idSale = " . $idSale . ";");
        
        $row = mysqli_fetch_array($result);
        $currentClient = new client($row['nameClient'], $row['surname1Client'],
                $row['surname2Client'], $row['emailClient'], "", "", $row['addressClient']);
        $currentInvoice = new CustomerShopping("",$row['dateSale'], $row['totalSale']);
        $currentInvoice->setIdSale($row['idSale']);
        $resultProducts = mysqli_query($conn, "select pd.brand, pd.model, pd.price "
                . "from tbconcretesales cs inner join tbproduct pd on cs.idproduct = "
                . "pd.idProduct where cs.idSale =" . $idSale . ";");
        mysqli_close($conn);
        $arrayProduct = [];
        while($rowProduct = mysqli_fetch_array($resultProducts)){
            $currentProduct = Product::ProductInvoice($rowProduct['brand'],$rowProduct['model'], $rowProduct['price']);
            array_push($arrayProduct, $currentProduct);
        }        
        $array = array($currentClient, $currentInvoice,$arrayProduct);
        return $array;
    }

    function insertCustomerInvoice($customerShopping,$products) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "SELECT max(idSale) FROM tbcustomershopping ");
        $row = mysqli_fetch_array($resultID);
        $idInvoice = $row[0] + 1;
        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn, "insert into tbcustomershopping values "
                . "(" . $idInvoice . "," . $customerShopping->getIdClient() . ","
                . "'" . $customerShopping->getDatePurchase() ."'," . $customerShopping->getTotalPurchase() . ",0);");
        
        if ($queryInsert) {
            $resultID = mysqli_query($conn, "SELECT max(idSale) FROM tbconcretesales ");
            $row = mysqli_fetch_array($resultID);
            $id = $row[0] + 1;            
            for($i = 0; $i < sizeof($products); $i++){
                $queryInsert = mysqli_query($conn, "insert into tbconcretesales values "
                . "(" . $id . "," . $customerShopping->getIdClient() . "," .
                $products[$i] . " , " . $idInvoice. ");");
                $id++;
            }
            return $idInvoice;
        } else {
            return false;
        }
        mysqli_close($conn);
    }

    function cancelInvoice($id) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = mysqli_query($conn, "update tbcustomershopping set active = 1 where idSale = " . $id);
        mysqli_close($conn);
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

}
