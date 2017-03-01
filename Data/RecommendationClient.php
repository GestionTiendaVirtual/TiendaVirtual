

<?php 

require_once './Resources/PHPMailer/PHPMailerAutoload.php';
include_once 'Data.php';


class RecommendationClient extends Data {


	public function sendRecommendationClient(){
	    $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
	    $conn->set_charset('utf8');
	    $query = "select distinct eva.idevaluation, eva.idclient, cli.emailclient, cli.nameclient, pro.brand from tbevaluationwallclient eva inner join tbclient cli on eva.idclient = cli.idclient inner join tbproduct pro on pro.idproduct = eva.idproduct  where eva.indexproduct != 0;";
	    
	    $result = mysqli_query($conn, $query);
	    
	    while($row = mysqli_fetch_array($result)){

	        $idClient = $row['idclient'];
	        $query = "select indexproduct, criterion, metrics  from tbevaluationwallclient where idclient = ".$idClient." and indexproduct =(select max(indexproduct) from tbevaluationwallclient where idclient = ".$idClient.");";
	    
	        $resultClient = mysqli_query($conn, $query);
	        $rowR = mysqli_fetch_array($resultClient);

	        if($rowR['metrics'] === "caro"){
	        	
	            $this->getProductSend('barato',$row['brand'],$row['emailclient'],$row['nameclient']);

	        }
	        if($rowR['metrics'] === "malo"){
	        	
	            $this->getProductSend('bueno',$row['brand'],$row['emailclient'],$row['nameclient']);   
	        }
	        if($rowR['metrics'] === "grande"){
	        	
	            $this->getProductSend('pequeno',$row['brand'],$row['emailclient'],$row['nameclient']);
	        }
	        if($rowR['metrics'] === "pequeno"){
	        	
	            $this->getProductSend('grande',$row['brand'],$row['emailclient'],$row['nameclient']);
	        }
	        

	        $idEvaluation = $row['idevaluation'];
	        $query = "update tbevaluationwallclient set indexproduct = 0 where idevaluation = " .$idEvaluation;
	    
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
	    $messageSend = "MGA Store le recomienda visualizar el siguiente producto ".$row['nameproduct']. " ".$row['brand']. " ".$row['model']." ".$row['price'].", esperamos que sea de su agrado.";
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
	    $success = $mail->send();
	    if($success){
	    	return true;
	    }else{
	    	return false;
	    }
	}
}