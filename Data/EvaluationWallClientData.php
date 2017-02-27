<?php
include_once 'Data.php';
require_once '../../Resources/PHPMailer/PHPMailerAutoload.php';

class EvaluationWallClientData extends Data {
	

    /* Optener un id viable para una cuenta nueva */
    public function getIClientData(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idevaluation) from tbevaluationwallclient";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $row = mysqli_fetch_array($result);
        return $row[0]+1; #Se le suma uno para que sea el id de una nueva cuenta.
    }

    /*Optiene todas las filas de la tabla ClientAccount*/
    public function existisClient($idProduct, $idClient) {

    	$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select count(idevaluation) as cont from tbevaluationwallclient where idproduct = " . $idProduct . " and idclient = " . $idClient;
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
    public function insertEvaluationClientData($idProduct,$listCriterion,$idClient){

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        /*Validamos si existe*/
        $resultExists = $this->existisClient($idProduct, $idClient);

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
                     $query = "update tbevaluationwallclient set indexproduct= (indexproduct+".
                     $indexproduct.") where idproduct = " . $idProduct . " and metrics = '". $metric 
                     ."' and idclient = ". $idClient;

                     $result = mysqli_query($conn, $query);
                }
                else{
                    /*Si no existe se inserta*/
                     $idTem = $this->getIClientData();
                    $query = 'insert into tbevaluationwallclient values ('.$idTem.','.$idProduct.
                        ','. $idClient .',"'.$criterion['criterion'].'","'.$metric.'",'.$indexproduct.')';

                    $result = mysqli_query($conn, $query);
                }
               
            }

        }//Fin criterios
        
        mysqli_close($conn);
        return true;
    }

    public function sendRecommendationClient(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select distinct eva.idevaluation, eva.idclient, cli.emailclient, cli.nameclient from tbevaluationwallclient eva inner join tbclient cli on eva.idclient = cli.idclient  where eva.indexproduct != 0;";
        
        $result = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_array($result)){

            $idClient = $row['idclient'];
            $query = "select max(indexproduct), criterion, metrics  from tbevaluationwallclient where idclient =" .$idClient ;
        
            $resultClient = mysqli_query($conn, $query);
            $rowR = mysqli_fetch_array($resultClient);

            if($rowR['metrics'] == "caro"){
                $this->getProductSend('barato',$row['emailclient'],$row['nameclient']);
            }
            if($rowR['metrics'] == "malo"){
                $this->getProductSend('bueno',$row['emailclient'],$row['nameclient']);   
            }
            if($rowR['metrics'] == "grande"){
                $this->getProductSend('pequeno',$row['emailclient'],$row['nameclient']);
            }
            if($rowR['metrics'] == "pequeno"){
                $this->getProductSend('grande',$row['emailclient'],$row['nameclient']);
            }

            $idEvaluation = $row['idevaluation'];
            $query = "delete from tbevaluationwallclient where idevaluation = " .$idEvaluation;
        
            mysqli_query($conn, $query);


        }
        mysqli_close($conn);
    }


    function getProductSend($metrics,$brand,$email,$name){


        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select  max(eva.indexproduct), pro.nameproduct, pro.brand, pro.model, pro.price from tbevaluationwallgeneral eva inner join tbproduct pro on eva.idproduct = pro.idproduct where pro.brand = '".$brand."' and eva.metrics = '".$metrics."';";
        
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $messageSend = "MGA Store le recomienda visualizar el siguiente producto ".$row['nameproduct']. $row['brand']. " ".$row['model']." ".$row['price'].", esperamos que sea de su agrado.";
        mysqli_close($conn);
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "mgasoluciones17@gmail.com";
        $mail->Password = "adminMGA";
        $mail->setFrom('mgasoluciones17@gmail.com', 'MGA Store');
        $mail->addAddress($email, $name);
        $mail->Subject = 'Recomendacion producto';
        $mail->msgHTML($messageSend);
        $mail->send();
        
    }



        
        
    
}