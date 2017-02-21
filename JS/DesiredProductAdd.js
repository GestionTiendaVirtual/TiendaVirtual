$(document).ready(function () {
    
    $("#btnDesiredAdd").click(function () {

        var idProduct = $('#idProduct').val();
        var name = $('#txtName').text();
        var brand = $('#txtBrand').text();
        var model = $('#txtModel').text();
        var serie = $('#txtSerie').text();
        var price = $('#txtPrice').val();


        var parametros = {
            "idProduct": idProduct,
            "name": name,
            "brand": brand,
            "model": model,
            "serie": serie,
            "price": price
        };
        $.ajax({
            data: parametros,
            url: '../../Business/DesiredProductBusiness/DesiredProductAdd.php',
            type: 'post',
            beforeSend: function () {

            },
            success: function (response) {
                document.getElementById('lblMessage').innerHTML = "Producto Agregado";
            },
            error: function () {
                document.getElementById('lblMessage').innerHTML = "Error al agregar";
            }
        });
    });


});