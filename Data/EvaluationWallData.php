<?php
include_once 'Data.php';

class EvaluationWallData extends Data {
	

    /* Optener un id viable para una cuenta nueva */
    public function getIDData(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idevaluation) from tbevaluationwallgeneral";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $row = mysqli_fetch_array($result);
        return $row[0]+1; #Se le suma uno para que sea el id de una nueva cuenta.
    }

    /*Optiene todas las filas de la tabla ClientAccount*/
    public function existis($idProduct) {

    	$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select count(idevaluation) as cont from tbevaluationwallgeneral where idproduct = " . $idProduct;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $row = mysqli_fetch_array($result);

        if($row['cont'] > 0){
            return true;
        }else{
            return false;
        }
    }

    /*Inserta la nueva cuenta en la BD*/
    public function insertEvaluationGeneralData($idProduct,$listCriterion,$idClient){

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        /*Validamos si existe*/
        $resultExists = $this->existis($idProduct);

        for ($numCri=0; $numCri < count($listCriterion); $numCri++) { 
            $criterion = $listCriterion[$numCri];
            $listMetrics = $criterion['metrics'];

            /*Recorremos cada metrica del criterio obtenido del primer for*/
            for ($numMetric=0; $numMetric < count($listMetrics); $numMetric++) { 
                $metric = $listMetrics[$numMetric][0];
                $indexproduct = $listMetrics[$numMetric][1];


                /* Validamos que no exista el producto en el la tabla */
                if($resultExists){
                    /*Si existe se actualiza*/
                     $query = "update tbevaluationwallgeneral set indexproduct= (indexproduct+".
                     $indexproduct.") where idproduct = " . $idProduct . " and metrics = '". $metric ."'";

                     $result = mysqli_query($conn, $query);
                }
                else{
                    /*Si no existe se inserta*/
                     $idTem = $this->getIDData();
                    $query = 'insert into tbevaluationwallgeneral values ('.$idTem.','.$idProduct.
                        ',"'.$criterion['criterion'].'","'.$metric.'",'.$indexproduct.')';

                    $result = mysqli_query($conn, $query);
                }
               
            }

        }//Fin criterios
        
        mysqli_close($conn);
        return true;
    }
    
}