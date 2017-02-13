<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Administrar</h1>
        <hr>  
        <a href="./Presentation/Location/DirectionClient.php">Direcciones</a>
        <a href="./Presentation/TypeProduct/typeProductInterface.php">Tipo producto</a>
        <a href="./Presentation/Product/ProductCreate.php">Producto</a>
        <a href="./Presentation/Client/clientInterface.php">Cliente</a>
        <hr>
        <h1>Iniciar sesión</h1>
        
        <?php
        if (@session_start() == true) {
            if (isset($_SESSION["idUser"])) {
                ?>
                <?php
                ?>
               
                <?php
            } else {
                ?>
                
                <div>Usuario predeterminado: usuario = admin contraseña = admin</div>
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
        <?php
        if (isset($_GET['errorData'])) {
            echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error el usuario no existe";
           </script>';
        }
        ?>
    </body>
</html>
