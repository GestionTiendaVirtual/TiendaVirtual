<?php
/**
* Consultas a la tabla de compras canceladas
*/
include_once 'Data.php';

class CanceledSaleData extends Data{

        function insertCanceledSaleData($canceledSale)
	{
                $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
                $conn->set_charset('utf8');

                $resultID = mysqli_query($conn, "select max(idcanceledsales) from tbcanceledsales");
                $rowId = mysqli_fetch_array($resultID);
                $idCanceledSale = $rowId[0] + 1;

                $query = "INSERT INTO `tbcanceledsales`(`idcanceledsales`, `idclient`, `idproduct`) VALUES (".$idCanceledSale.",".$canceledSale->idClient.",".$canceledSale->idProduct.")";
                
                $result = mysqli_query($conn, $query);
                mysqli_close($conn);
                return true;		
	}
}

?>