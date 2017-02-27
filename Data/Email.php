<?php

include_once 'Data.php';
include_once('./Resources/class.phpmailer.php');
include_once('./Resources/class.smtp.php');

class Email extends Data {

    public function sendEmail() {


        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = mysqli_query($conn, "select datee from tbdaily");
        $row3 = mysqli_fetch_all($query);
        foreach ($row3 as $current3) {
            $date2 = $current3[0];
        }
        $date = date('Y-m-d');

        if ($date == $date2) {
            
        } else {
            $brandd = "Huawei";
            $query = mysqli_query($conn, "select brand,model,price,description from tbproduct"
                    . " where brand='$brandd'");
            $row = mysqli_fetch_all($query);

            $query2 = mysqli_query($conn, "select emailClient from tbclient");
            $row2 = mysqli_fetch_all($query2);
            foreach ($row2 as $current) {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;
                $mail->Username = 'jeremy190895@gmail.com';
                $mail->Password = 'pelu190895';
                foreach ($row as $current2) {

                    $mail->AddAddress("jeremy190895@gmail.com");
                    $mail->Subject = "Oferta de la tienda mgasoluciones";
                    $mensaje = "El producto de la marca:" . $current2[0] . "  " . "modelo: " . $current2[1] .
                            " " . "ha tenido un descuento del 10%, como consecuencia el precio es:" .
                            $current2[2] . " " . "algunas de sus principales caracteristicas son" . $current2[3];
                    $mail->Body = $mensaje;
                    $mail->MsgHTML($mensaje);

                    $mail->send();
                }
            }
            $quer4 = mysqli_query($conn, "update tbdaily set datee='$date'");
            mysqli_close($conn);
        }
    }

}
