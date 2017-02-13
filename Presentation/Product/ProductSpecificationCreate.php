<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../../JS/GenerateFieldsSpecification.js" type="text/javascript"></script>
    </head>
    <body>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductSpecification.php?idProduct=<?php echo $_GET['idProduct']; ?>">Actualizar especificación</a><td>
                <td><a href="ProductSpecificationDelete.php?idProduct=<?php echo $_GET['idProduct'];?>">Eliminar especificación</a><td>
                <td><a href="ProductUpdate.php">Atrás</a><td>

            </tr>
        </table>
        <hr>
        <h1>Especificaciones Productos</h1>
        <br> 
        <?php
        include_once '../../Business/SpecificationProduct/SpecificationproductBusiness.php';
        if (isset($_GET['idProduct'])) {
            $idProduct = $_GET['idProduct'];
        }
        ?>
        <form method="POST" action="../../Business/SpecificationProduct/SpecificationProductAction.php">
            <table id="newSpe">
                <tr>
                    <td><label id="lblSpecification">Nombre:</label></td>
                    <td><input type="text" id="txtNameSpe0" name="txtNameSpe0"/>&emsp;*</td>
                </tr> 
                <tr>
                    <td><label id="lblSpecification">Valor:</label></td>
                    <td><input type="text" id="txtValueSpe0" name="txtValueSpe0"
                                />&emsp;*</td>
                </tr>
                <input type="hidden" id="countSpe" name="countSpe" value="1"/>
                <input type="hidden" id="optionCreateSpe" name="optionCreateSpe"/>
                <input type="hidden" id="idproduct" name="idProduct" value="<?php echo $idProduct; ?>"/>
            </table>
            <input type="submit" value="Registar" />
            <input type="submit" value="Nueva especificación" onclick="return addFields('newSpe')" />
        </form>
        <label id="txtMessage"></label>
    </center>
</body>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Se registró con éxito";
          </script>';
} else if (isset($_GET['error'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
}
?>
</html>
