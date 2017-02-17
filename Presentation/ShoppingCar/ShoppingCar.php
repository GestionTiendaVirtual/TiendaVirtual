<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
        
        <?php
        include '../../Business/Account/AccountBusiness.php';
        include_once '../../Business/DesiredProductBusiness/DesiredProductBusiness.php';
        $accountBusiness = new AccountBusiness();
        $result = $accountBusiness->getAllAccountAssetsBusiness();
        

        $desiredBusiness = new DesiredProductBusiness();
        $resultDesired = $desiredBusiness->getDesiredProducts($_SESSION['idUser']);
        if ($resultDesired != 0) {
            $_SESSION['desired'] = $resultDesired;
        }
        ?>
    </head>
    <body>
        <?php
        if (!isset($_SESSION["idUser"])) {
            session_start();
        }
        ?>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../Modules/ClientView.php">Atrás</a></td>
                <td><a href="./ShoppingCar.php?option=desired">Deseos</a></td>
                <td><a href="./ShoppingCar.php?option=carrito">Carrito</a></td>
            </tr>
        </table>
        <hr>
        <h1>Productos agregados</h1>
        <br>        
        <table>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serie</th>
            <th>Precio</th> 

            <?php
            $option = $_GET['option'];
            $total = 0;
            if (sizeof($_SESSION[$option]) > 0) {
                for ($i = 0; $i < sizeof($_SESSION[$option]); $i++) {

                    $product = $_SESSION[$option][$i];
                    $infoProduct = split(";", $product);
                    $idProduct = $infoProduct[0];
                    ?>
                    <tr>
                        <?php
                        for ($j = 1; $j < sizeof($infoProduct); $j++) {

                            if ($j == sizeof($infoProduct) - 1) {
                                $total += $infoProduct[$j];
                                ?>
                                <td><h4><?php echo '₡' . number_format($infoProduct[$j]); ?></h4></td>
                                <?php
                            } else {
                                ?>  
                                <td><h4><?php echo $infoProduct[$j] ?></h4></td>              
                                <?php
                            }
                        }
                        ?>
                        <?php
                        if ($option == "carrito") {
                            ?>
                            <td><input type="submit" class="btnDelete" id="btnDelete" value="Quitar"
                                       onclick="return deleteItem('<?php echo $idProduct; ?>')"/></td>
                                <?php
                            } else {
                                ?>
                            <td><input type="submit" class="btnDeleteDesired" id="btnDeleteDesired" value="Quitar"
                                       onclick="return deleteDesiredProduct('<?php echo $idProduct; ?>')"/></td>
                                <?php
                            }
                            ?>        

                    </tr>


                    <?php
                }
            } else {
                ?>
                <tr><td><label>No hay productos agregados</label></td></tr>
                <?php
            }
            ?>
            <tr><td><h1>Total:<?php echo '₡' . number_format($total); ?></h1></td>
                <td></td>
                <td>
                    <form method="POST" action="../../Business/CustomerShoppingBusiness/CustomerShoppingAtion.php">
                        <input type="hidden" value="create" id="create" name="create">
                        <input type="hidden" value="<?php echo $option;?>" id="option" name="option">
                        <input type="hidden" value="<?php echo $total; ?>" id="total" name="total">

                        <!-- Cuenta -->
                        <label>Cuenta: </label>
                        <select name="account">
                            <?php
                            foreach ($result as $tem) {
                                echo "<option value='" . $tem->idAccount . "'>" . $tem->cardNumber . "</option>";
                            }
                            ?>
                        </select>
                        <!-- Fin de cuenta -->

                        <input type="submit" value="Comprar" id=""/>
                    </form>

                </td>
            </tr>

        </table>
        <label id="txtMessage"></label>
    </center>
</body>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Compra con éxito";
          </script>';
} else if (isset($_GET['error'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Compra fallida";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "El carrito está vacío, o seleccione una cuenta";
          </script>';
}
?>

<script>

    function deleteItem(idProduct) {
        var parametros = {
            "idProduct": idProduct
        };
        $.ajax({
            data: parametros,
            url: '../../Business/ShoppingCar/ShoppingCarDeleteProduct.php',
            type: 'post',
            beforeSend: function () {

            },
            success: function (response) {
                window.location = "./ShoppingCar.php?option=carrito";
            },
            error: function () {
                document.getElementById('txtMessage').innerHTML = "Error al eliminar";
            }
        });

    }
</script>

<script>
    function deleteDesiredProduct(idProduct) {
        var parametros = {
            "idProduct": idProduct
        };
        $.ajax({
            data: parametros,
            url: '../../Business/DesiredProductBusiness/DesiredProductUpdate.php',
            type: 'post',
            beforeSend: function () {

            },
            success: function (response) {
                window.location = "./ShoppingCar.php?option=desired";
            },
            error: function () {
                document.getElementById('txtMessage').innerHTML = "Error al eliminar";
            }
        });

    }
</script>




</html>
