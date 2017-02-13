<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registar Producto</title>          
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script src="../../JS/AddColors.js" type="text/javascript"></script>
    </head>
    <body>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductCreate.php">Registrar</a></td>
                <!--<td><a href="ProductRetrieve.php">Visualizar</a><td>-->
                <td><a href="ProductUpdate.php">Actualizar</a><td>
                <td><a href="ProductState.php">Estado</a><td>
            </tr>
        </table>
        <hr>
        <?php
        $name = $_GET['nameProduct'];
        $idProduct = $_GET['idProduct'];
        ?>
        <h1>Registar color a&emsp;<?php echo $name; ?></h1>
        <br>
        <form id="createProduct" method="POST" action="../../Business/Product/ProductAction.php" enctype="multipart/form-data">
            <table id="input">
                <tr>
                    <td><label id="lblColor">Color:</label></td>
                    <td><input style="width: 165px;" type="color" id="txtColor" name="txtColor"/></td>
                    <td><input type="hidden" id="idProduct" name="idProduct" value="<?php echo $idProduct; ?>"/></td>
                </tr> 
                <tr>
                    <td>Colores seleccionados</td>
                    <td><select style="width: 165px;" id="selColor"><option>--Ver--</option></select></td>
                </tr>
            </table>
            <input type="hidden" id="colors" name="colors">
            <input type="hidden" id="optionInsertImage" name="optionInsertColor">
            <input type="submit" id="btnAccept" name="btnAccept" value="Aceptar" onclick="return validateColors()" />
        </form>
        <br>
        <label id="txtMessage"></label>

    </center>
</body>
</html>
