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
        $row = mysqli_fetch_all($query);
        foreach ($row as $current) {
            $temporalBrand = $current[0];
            $query2 = mysqli_query($conn, "select count(model) from tbproduct where brand='$temporalBrand'");
            $row2 = mysqli_fetch_all($query2);
            foreach ($row2 as $current2) {
                $query3 = mysqli_query($conn, "select  brand from tbproduct");
                $row3 = mysqli_fetch_all($query);
                $dateSend = round($current2[0] / 7);
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
        $row3 = mysqli_fetch_all($query);
        $dateInsert = date('Y-m-d');
        if (sizeof($row3) < 1) {
            $query = mysqli_query($conn, "insert into tbdaily(datee)values('$dateInsert')");
        } else {
            $query = mysqli_query($conn, "update tbdaily set datee='$dateInsert'");
        }

        $query2 = mysqli_query($conn, "select brand from tbloadproduct where "
                . "datee='$dateInsert'");
        $row2 = mysqli_fetch_all($query2);
        $mensaje = "";
        foreach ($row2 as $current) {
            $brand = $current[0];
            $query4 = mysqli_query($conn, "select brand,model,price,description from "
                    . "tbproduct where brand='$brand'");
            $row4 = mysqli_fetch_all($query4);

            foreach ($row4 as $current5) {
                $mensaje = $mensaje .
                        "<br>" .
                        "MGA Store le recomienda que vea los siguientes productos:"
                        . "Marca:" . $current5[0] . "modelo:" . $current5[1] . "<br>";
            }
        }



        $query5 = mysqli_query($conn, "select emailClient from tbclient");
        $row5 = mysqli_fetch_all($query5);
        foreach ($row5 as $current6) {

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->Username = 'jeremy190895@gmail.com';
            $mail->Password = 'pelu190895';
            $mail->AddAddress($current6[0]);
            $mail->Subject = "Oferta de la tienda mgasoluciones";
            $mail->Body = $mensaje;
            $mail->MsgHTML($mensaje);
            $mail->send();
        }
    }

}
