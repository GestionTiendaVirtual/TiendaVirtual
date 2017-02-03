<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registar Producto</title>          
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script src="../../JS/GenerateFields.js" type="text/javascript"></script>
        <script src="../../JS/GenerateFieldsSpecification.js" type="text/javascript"></script>
        <script src="../../JS/AddColors.js" type="text/javascript"></script>
    </head>
    <body>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductCreate.php">Registrar</a></td>
                <td><a href="ProductRetrieve.php">Visualizar</a><td>
                <td><a href="ProductUpdate.php">Actualizar</a><td>
                <td><a href="ProductState.php">Estado</a><td>
            </tr>
        </table>
        <hr>
        <h1>Registar Producto</h1>
        <br>
        <form id="createProduct" method="POST" action="../../Business/Product/ProductAction.php" enctype="multipart/form-data">
            <table id="newSpe">
                <tr>
                    <td><label id="lblName" >Tipo producto:</label></td>
                    <td><select name="cbTypeProduct" id="cbTypeProduct">
                            <?php
                            include_once '../../Business/TypeProduct/typeProductBusiness.php';
                            /* obtiene todos los elementos de la BD y los carga en un select */
                            $typeProduct = new typeProductBusiness();
                            $result = $typeProduct->getTypeProduct();
                            foreach ($result as $currentType) {
                                echo '<option value=' . $currentType->getIdTypeProduct() . '>' .
                                $currentType->getNameTypeProduct() . '</option>';
                            }
                            ?>
                        </select> </td>                     
                </tr>
                <tr>
                    <td><label id="lblName" >Nombre:</label></td>
                    <td><input type="text" id="txtName" name="txtName" 
                               data-validation="custom" data-validation-regexp="^[a-zA-Z_áéíóúñ\s]*$">&emsp;*</td>                     
                </tr>
                <tr>
                    <td><label id="lblBrand" >Marca:</label></td>
                    <td><input type="text" id="txtBrand" name="txtBrand" 
                               data-validation="custom" data-validation-regexp="^[a-zA-Z_áéíóúñ\s]*$">&emsp;*</td>                     
                </tr>
                <tr>
                    <td><label id="txtModel">Modelo:</label></td>
                    <td><input type="text" id="txtModel" name="txtModel"
                               data-validation="alphanumeric" data-validation-allowing="-_"/>&emsp;*</td
                </tr>
                <tr>
                    <td><label id="txtModel">Serie:</label></td>
                    <td><input type="text" id="txtSerie" name="txtSerie"
                               data-validation="alphanumeric" data-validation-allowing="-_"/>&emsp;*</td
                </tr>
                <tr>
                    <td><label id="lblPrice">Precio</label></td>
                    <td><input type="text" id="txtPrice" name="txtPrice" onkeypress="mascara(this, cpf)"  
                               onpaste="return false" value="₡"/>&emsp;*</td>                    
                </tr>
                <tr>
                    <td><label id="lblColor">Color:</label></td>
                    <td><input style="width: 165px;" type="color" id="txtColor" name="txtColor" />&emsp;*</td>
                </tr>  
                <tr>
                    <td>Colores seleccionados</td>
                    <td><select style="width: 165px;" id="selColor"><option>--Ver--</option></select><Td>
                </tr>
                <tr>
                    <td><label id="lblDescription">Descripción:</label></td>
                    <td><textarea type="text" id="txtDescription" name="txtDescription" 
                                  data-validation="custom" data-validation-regexp="^[a-zA-Z_áéíóúñ\s]*$"></textarea>&emsp;&emsp;*</td>
                </tr> 
                <tr>
                    <td><label id="lblCharacteristics">Características principales:</label></td>
                    <td><textarea type="text" id="txtCharacteristics" name="txtCharacteristics"
                                  data-validation="custom" data-validation-regexp="^[a-zA-Z_áéíóúñ\s]*$"></textarea>&emsp;&emsp;*</td>
                </tr> 
                <tr><td><label>Especificaciones:</label></td></tr>
                <tr>
                    <td><label id="lblSpecification0">Nombre:</label></td>
                    <td><input type="text" id="txtNameSpe0" name="txtNameSpe0" />&emsp;*</td>
                </tr> 
                <tr>
                    <td><label id="lblSpecification0">Valor:</label></td>
                    <td><input type="text" id="txtValueSpe0" name="txtValueSpe0" />&emsp;*</td>
                </tr>


            </table>
            <table id="input">
                <tr>
                    <td><label id="lblColor">Imagen:</label></td>
                    <td><input type="file" id="fileImage0" name="fileImage0"/>&emsp;*</td>
                </tr> 
            </table>

            <input type="hidden" id="count" name="count" value="1">
            <input type="hidden" id="countSpe" name="countSpe" value="1">
            <input type="hidden" id="colors" name="colors">
            <input type="hidden" id="optionCreate" name="optionCreate">
            <input type="submit" id="btnAccept" name="btnAccept" value="Aceptar" onclick="return validateColors()" />
            <input type="submit" id="btnAdd" onclick="return addInput('input')" value="Nueva imagen">
            <input type="submit" id="btnAddEs" onclick="return addFields('newSpe')" value="Nueva especificación">
        </form>
        <br>
        <label id="txtMessage">* campo obligatorio</label>

    </center>
</body>

<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Registro con éxito";
          </script>';
} else if (isset($_GET['errorInsert'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
} else if (isset($_GET['errorExis'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "La imagen ingresada ya existe";
           </script>';
} else if (isset($_GET['errorSize'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "La imagen supera el tamaño permitido";
           </script>';
}
?>
<script>
    $.validate({
        lang: 'es'
    });

</script>
<script language="JavaScript">
    $("#txtColor").focus(function () {
        var price = document.getElementById('txtPrice').value;
        document.getElementById('txtPrice').value = '₡ ' + price;
    });
</script>
</html>
