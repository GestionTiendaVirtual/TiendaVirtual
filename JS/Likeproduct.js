function likeProduct(idProduct) {
    
    var parametros = {
        "idProduct": idProduct
    };
    $.ajax({
        data: parametros,
        url: '../../Business/LikeProduct/LikeProduct.php',
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            $("#btnLike").prop('src','../../images/like.png');
        },
        error: function () {
            alert('algo masl');
        }
    });
}

