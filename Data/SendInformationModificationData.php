<?php

require_once './Resources/PHPMailer/PHPMailerAutoload.php';
include_once 'Data.php';

/**
 * Description of SendInformationModificationData
 *
 * @author mm
 */
class SendInformationModificationData extends Data {

    function sendEmailClient() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select distinct cli.nameClient, cli.emailClient, des.idproduct, "
                . "pro.nameProduct, pro.brand, pro.model from tbclient cli inner join tbproductdesired "
                . "des on cli.idClient = des.idclient inner join tbproductmodifications modi on"
                . " modi.idproduct = des.idproduct inner join tbproduct pro on pro.idProduct = des.idproduct"
                . " where des.active = 1 and modi.active = 1");
        $idModification = "";
        while ($row = mysqli_fetch_array($result)) {

            $nameClient = $row['nameClient'];
            $emailClient = $row['emailClient'];
            $idProduct = $row['idproduct'];
            $nameProductOrigin = $row['nameProduct'];
            $brandProduct = $row['brand'];
            $modelProduct = $row['model'];

            $resultInfoProduct = mysqli_query($conn, "select idmodification, nameproduct,"
                    . " priceproduct, descriptionproduct, characteristicsproduct, colorproduct,"
                    . " specificationproduct, imagesproduct from tbproductmodifications"
                    . " where idproduct = " . $idProduct . " "
                    . "and active = 1");

            $messageSend = "El producto " . $nameProductOrigin . " " . $brandProduct . " " . $modelProduct . " "
                    . "ha modificacdo su respectiva información: ";

            $idAfther = 0;
            $idCurent = 0;
            while ($rowModi = mysqli_fetch_array($resultInfoProduct)) {

                $idCurent = $rowModi['idmodification'];
                if ($idCurent != $idAfther) {
                    $idModification .= $idCurent . ';';
                    $idAfther = $idCurent;
                }

                if ($rowModi['nameproduct'] != '0') {
                    $messageSend .= " Nombre: " . $rowModi['nameproduct'];
                }
                if ($rowModi['priceproduct'] != '0') {
                    $messageSend .= " Precio: ₡" . number_format($rowModi['priceproduct']);
                }
                if ($rowModi['descriptionproduct'] != '0') {
                    $messageSend .= " Descripción: " . $rowModi['descriptionproduct'];
                }
                if ($rowModi['characteristicsproduct'] != '0') {
                    $messageSend .= " Características: " . $rowModi['characteristicsproduct'];
                }
                if ($rowModi['colorproduct'] != 0) {
                    $messageSend .= ", se agregaron nuevos colores";
                }
                if ($rowModi['specificationproduct'] != 0) {
                    $messageSend .= ", se agregaron nuevas especificaciones";
                }
                if ($rowModi['imagesproduct'] != 0) {
                    $messageSend .= ", se agregaron nuevas imágenes";
                }

                $messageSend .= " te invitamos a que revise la actualización del producto.";


                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
                $mail->Username = "mgasoluciones17@gmail.com";
                $mail->Password = "adminMGA";
                $mail->setFrom('mgasoluciones17@gmail.com', 'MGA Store');
                $mail->addAddress($emailClient, $nameClient);
                $mail->Subject = 'El producto ' . $nameProductOrigin . ' tuvo algunas modificaciones';
                $mail->msgHTML($messageSend);
                $mail->send();

                $messageSend = "El producto " . $nameProductOrigin . " " . $brandProduct . " " . $modelProduct . " "
                        . "ha modificacdo su respectiva información: ";
            }
        }

        $ids = split(";", $idModification);
        for ($i = 0; $i < sizeof($ids); $i++) {
            if ($ids[$i] != "") {
                mysqli_query($conn, "update tbproductmodifications set"
                        . " active = 0 where idmodification = " . $ids[$i]);
            }
        }
        mysqli_close($conn);
    }

}
