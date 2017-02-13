var colors = [];
$(document).ready(function () {
    $("#txtColor").change(function () {
        var color = document.getElementById('txtColor').value;
        $('#selColor').append('<option style="background:' + color + ';" \n\
            value="' + color + '">Eliminar</option>');
        var flag = false;
        for (var j = 0; j < colors.length; j++) {
            if (colors[j] === color) {
                flag = true;
            }
        }
        if (flag === false) {
            colors.push(color);
        }
        var value = "";
        for (var i = 0; i < colors.length; i++) {
            if (i < colors.length - 1) {
                value += colors[i] + ";";
            } else {
                value += colors[i];
            }
        }
        document.getElementById('colors').value = value;
    });
});
$(document).ready(function () {

    $("#selColor").change(function () {
        var optionColor = $('select[id=selColor]').val();
        $('#selColor option[value=' + optionColor + ']').remove();
        var value2 = "";
        var cont = colors.length;
        for (var j = 0; j <= colors.length; j++) {
            var col = colors[j].toString();
            if (col !== optionColor) {
                value2 += colors[j] + ";";
                addItem(value2);
            } else {
                cont--;
                if (cont === 1) {
                    addItem("");
                }
                colors.splice(0, j);
            }
        }
    });

});
function addItem(value) {
    document.getElementById('colors').value = value;
}
function validateColors() {
    var value = document.getElementById('colors').value;
    if (value === "") {
        document.getElementById("txtMessage").innerHTML = "Debe seleccionar al menos un color";
        return false;
    }
    return true;
}