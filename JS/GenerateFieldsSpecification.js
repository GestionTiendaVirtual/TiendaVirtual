
var cont = 1;
function addFields(id) {

    var fieldName = document.createElement('tr');
    var fieldValue = document.createElement('tr');

    //-------------------------------------------------

    fieldName.innerHTML = "<td><label>Nombre:</label></td><td><input type='text' \n\
    id='txtNameSpe"+cont+"' name='txtNameSpe"+cont+"'data-validation='custom' \n\
    data-validation-regexp='^([a-zA-Z]+)$'/>&emsp;*</td></tr>";

    fieldValue.innerHTML = "<td><label>Valor:</label>\n\
    </td><td><input type='text' id='txtValueSpe"+cont+"' name='txtValueSpe"+cont+"' data-validation='custom' \n\
    data-validation-regexp='^([a-zA-Z]+)$'/>&emsp;*</td></tr>";
    //Se carga el HTML generado con js a la etiqueta indicada
    document.getElementById(id).appendChild(fieldName);
    document.getElementById(id).appendChild(fieldValue);
    cont++;
    document.getElementById('countSpe').value = cont;
    return false;


}