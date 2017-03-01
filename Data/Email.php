<?php

include_once 'Data.php';
include_once('./Resources/class.phpmailer.php');
include_once('./Resources/class.smtp.php');

class Email extends Data {

    public function loadProduct() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = mysqli_query($conn, "select  brand from tbproduct");
        $date = date('Y-m-d');
    
        while($row =mysqli_fetch_array($query)){
              $temporalBrand = $row[0];
              $query2 = mysqli_query($conn, "select count(model) from tbproduct where brand='$temporalBrand' and active != 0 ");
              while($row2 =mysqli_fetch_array($query2)){
                 $dateSend = round($row2[0] / 7);
                if ($dateSend == 0) {
                    $dateSend = 1;
                }
                $a = strtotime($date);
                $temp = date('Y-m-d', strtotime("$dateSend day", $a));
                $query4 = mysqli_query($conn, "insert into tbloadproduct"
                        . "(brand,datee)values('$temporalBrand','$temp')");
              }
        }
     
    }

    public function sendEmail() {


        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

         $query = mysqli_query($conn, "select datee from tbdaily");
         $row3 = mysqli_fetch_array($query);
         $dateInsert = date('Y-m-d');
         if (sizeof($row3) < 1) {
            $query = mysqli_query($conn, "insert into tbdaily(datee)values('$dateInsert')");
         } else {
            $query = mysqli_query($conn, "update tbdaily set datee='$dateInsert'");
         }


        $query2 = mysqli_query($conn, "select brand from tbloadproduct where "
                . "datee='$dateInsert'");
        $mensaje = "MGA Store le recomienda que vea los siguientes productos:";
        while($row =mysqli_fetch_array($query2)){
             $brand = $row[0];
             $query4 = mysqli_query($conn, "select brand,model,price,description from "
                    . "tbproduct where brand='$brand'");

              while($row2 =mysqli_fetch_array($query4)){
                 $mensaje .=
                        "<br>" .
                        ""
                        . "Marca:" . $row2[0] . "modelo:" . $row2[1] . "<br>";

              }
        }
        $query5 = mysqli_query($conn, "select emailClient from tbclient");
        while($row3=mysqli_fetch_array($query5)){
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->Username = "mgasoluciones17@gmail.com";
            $mail->Password = "adminMGA";
            $mail->setFrom('mgasoluciones17@gmail.com', 'MGA Store');
            $mail->addAddress($row3[0]);
            $mail->Subject = "Oferta de la tienda mgasoluciones";
            $mail->Body = $mensaje;
            $mail->MsgHTML($mensaje);
            $mail->send();
        }
    }

}
