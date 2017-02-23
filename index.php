<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MGA Soluciones</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <center>
        <h1>Administrar</h1>
        <hr>  
        <a href="./Presentation/Location/DirectionClient.php">Direcciones</a>
        <a href="./Presentation/TypeProduct/typeProductInterface.php">Tipo producto</a>
        <a href="./Presentation/Product/ProductCreate.php">Producto</a>
        
        <hr>
        <h1>Iniciar sesión</h1>
        <?php 
            include_once './Business/NotifyCustomersProductChangesBusiness/NotifyCustomersBusiness.php';
            $sendEmailClient = new NotifyCustomersBusiness();
            $resultEmail = $sendEmailClient->sendEmailClient();    
        ?>

        <?php
        if (@session_start() == true) {
            if (isset($_SESSION["idUser"])) {
                ?>
                <?php
                ?>

                <?php
            } else {
                ?>

                <div>Usuario predeterminado: usuario = user contraseña = user</div>
                <br>
                <form id="frmLogin" method="POST" action="./Business/loginAction.php">
                    <label id="lblUser">Usuario:&emsp;</label>
                    <input type="text" id="txtUser" name="txtUser"/><br><br>
                    <label id="lblUser">Contraseña:</label>
                    <input type="password" id="txtPassword" name="txtPassword"/><br><br>
                    <input type="submit" id="btnAccept" name="btnAccept" value="Iniciar sesión"/><br>
                    <input type="hidden" id="option" name="option" value="login">
                    <label id="txtMessage"></label>
                </form>
                <br><br>
                <?php
            }
        }
        ?>

        <!-- Trigger the modal with a button -->
        <button style="border: none;"type="button" data-toggle="modal" data-target="#myModal">¿Olvidó su contraseña?</button>
        <a href="./Presentation/Client/ClientRegister.php">Registrarse</a>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Recuperar contraseña</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="Business/RecoverPasswordClientBusiness/RecoverPasswordAction.php">
                            <table>                                
                                <tr>
                                    <td>Email:</td>
                                    <td>&emsp;&emsp;<input style="width: 400px;"type="email" id="txtEmail" name="txtEmail"/></td>
                                </tr>
                                
                            </table><br>
                            <input class="btn btn-primary" type="submit" id="btnSend"/>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </center>
    <?php
    if (isset($_GET['errorData'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error el usuario no existe";
           </script>';
    }
    if(isset($_GET['successEmail'])){
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Se envió un correo con la contraseña nueva";
           </script>';
    }
    ?>

</body>
</html>
