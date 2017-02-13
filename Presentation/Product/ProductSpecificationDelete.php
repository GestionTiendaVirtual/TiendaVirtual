<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../../Business/SpecificationProduct/SpecificationproductBusiness.php';
        $idProduct = $_GET['idProduct'];
        $specificationBusiness = new SpecificationproductBusiness();
        $specification = $specificationBusiness->getSpecificationProduct($idProduct);
        ?>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductSpecificationCreate.php?idProduct=<?php echo $_GET['idProduct'];?>">Registrar</a></td>
                <td><a href="ProductSpecification.php?idProduct=<?php echo $_GET['idProduct'];?>">Actualizar especificación</a><td>
                <td><a href="ProductUpdate.php">Atrás</a><td>
            </tr>
        </table>
        <hr>
        <h1>Estado de Productos</h1>
        <br>        
        <table>
            <th>Nombre</th>
            <th>Valor</th>         
            <?php
            foreach ($specification as $currentSpe) {
                ?>  
            <form id="deleteProduct" method="POST" action="../../Business/SpecificationProduct/SpecificationProductAction.php">
                    <tr>
                    <input type="hidden" id="idSpe" name='idSpe' 
                           value=<?php echo '"' . $currentSpe->getIdSpecification() . '"'; ?>/>
                    <td><label><?php echo $currentSpe->getNameSpecification(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentSpe->getValueSpecification(); ?>&emsp;&emsp;&emsp;</label></td>                        
                    <input type="hidden" id="optionDelete" name="optionDelete" value="delete" />     
                    <input type="hidden" id="idProduct" name="idProduct" value="<?php echo $idProduct;?>" />     
                    <td><input type="submit" id="btnAccept" name="btnAccept" value="Eliminar" /></td>                
                    </tr>
                </form>

                <?php
            }
            ?>
        </table>
        <label id="txtMessage"></label>
    </center>
</body>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Se eliminó con éxito";
          </script>';
} else if (isset($_GET['errorDelete'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Eliminación fallida";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
}
?>
</html>