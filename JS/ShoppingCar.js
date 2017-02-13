$(document).ready(function () {
    $("img").click(function () {
        var elem = $(this);
        var src = elem.attr('src');
        $("#imgChange").prop('src', src);
    });

    $("#btnCar").click(function () {

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
            url: '../../Business/ShoppingCar/ShoppingCarAddProduct.php',
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
