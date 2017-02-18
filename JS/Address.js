/*
* Recibe un string con el id del select al cual se le desean agregar opciones.
* Recibe un Array con las opciones que se desean agregar.
*/
function setOption(idSelect, listOption){
	var x = document.getElementById(idSelect);
	
	//Limpia el select
	while (x.length > 0) {
	    x.remove(x.length-1);
	}


	for (cont=0;cont<listOption.length;cont++){
		var tem = listOption[cont];
		var option = document.createElement("option");
		option.value = (tem.split("?"))[0];
		option.text = (tem.split("?"))[1];
		x.add(option);
	}
	return true;
}


function getCanton(){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

      		/*Actualiza las opciones del select de canton y distrito*/
      		if(setOption("canton",this.responseText.split(";"))){
      			getDistrict();
      		}
    	}
  	};
	xhttp.open("POST", "../../Business/Location/LocationAction.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	var idProvince = document.getElementById("province").value;
	xhttp.send("var1="+ idProvince +"&var2=canton");
	return false;
}

function getDistrict(){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

      		/*Actualiza las opciones del select de distrito*/
      		setOption("district",this.responseText.split(";"));
    	}
  	};
	xhttp.open("POST", "../../Business/Location/LocationAction.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	var idCanton = document.getElementById("canton").value;

	xhttp.send("var1="+ idCanton +"&var2=district");
	return false;
}