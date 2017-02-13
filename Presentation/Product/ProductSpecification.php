<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductSpecificationCreate.php?idProduct=<?php echo $_GET['idProduct'];?>">Registrar</a></td>
                <td><a href="ProductSpecification.php?idProduct=<?php echo $_GET['idProduct'];?>">Actualizar especificación</a><td>
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
            $specificationBusiness = new SpecificationproductBusiness();
            $result = $specificationBusiness->getSpecificationProduct($idProduct);
            $cont = 0;
            ?>
            <form method="POST" action="../../Business/SpecificationProduct/SpecificationProductAction.php">
                <table>
                    <?php
                    foreach ($result as $currentSpe) {
                        ?>

                        <tr>
                            <td><label id="lblSpecification">Nombre:</label></td>
                            <td><input type="text" id="txtNameSpe<?php echo $cont; ?>" name="txtNameSpe<?php echo $cont; ?>" 
                                       value="<?php echo $currentSpe->getNameSpecification(); ?>" />&emsp;*</td>
                        </tr> 
                        <tr>
                            <td><label id="lblSpecification">Valor:</label></td>
                            <td><input type="text" id="txtValueSpe<?php echo $cont; ?>" name="txtValueSpe<?php echo $cont; ?>"
                                       value="<?php echo $currentSpe->getValueSpecification(); ?>" />&emsp;*</td>
                        <input type="hidden" id="idSpe<?php echo $cont; ?>" 
                               name="idSpe<?php echo $cont; ?>" value="<?php echo $currentSpe->getIdSpecification(); ?>"/>
                        </tr>
                        <input type="hidden" id="cont" name="cont" value="<?php echo $cont; ?>"/>

                        <input type="hidden" id="optionUpdateSpe" name="optionUpdateSpe"/>


                        <?php
                        $cont++;
                    }
                }
                ?>
                <br>
                <input type="hidden" id="idproduct" name="idProduct" value="<?php echo $idProduct; ?>"/>

            </table>
            <input type="submit" value="Actualizar" />
        </form>
        <label id="txtMessage"></label>
    </center>
</body>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Se actualizó con éxito";
          </script>';
} else if (isset($_GET['error'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Actualización fallida";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
}
?>
</html>
