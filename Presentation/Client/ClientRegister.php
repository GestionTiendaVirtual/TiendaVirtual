<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registrar Cliente</title>

		<!-- Calendario -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	    <link rel="stylesheet" href="/resources/demos/style.css">
	    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	    <script>
	    $( function() {
	      $( "#datepicker" ).datepicker();
	    } );
	    </script>
	    <!-- FIn de Calendario -->

	    <!-- Ubicacion -->
	    <script>

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
			}


			function getCanton(){
				var xhttp = new XMLHttpRequest();
			    xhttp.onreadystatechange = function() {
			    	if (this.readyState == 4 && this.status == 200) {

			      		/*Actualiza las opciones del select de canton*/
			      		setOption("canton",this.responseText.split(";"));
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
		</script>
	    <!-- Fin ubicacion -->

	    <!-- Mensaje recibido -->
	    <?php
	    	if(isset($_GET['Error']) && $_GET['Error'] == "Numeric"){
	    		echo '<h2><b>ERROR!</b> Procura ingresar solo números en
	    		los campos numéricos</h2>';
	    	}
	    	else if(isset($_GET['Error']) && $_GET['Error'] == "Empty"){
	    		echo '<h2><b>ERROR!</b> Debe ingresar todos los datos.</h2>';
	    	}
	    	else if(isset($_GET['Success'])){
	    		echo '<h2>Se ha realizado con éxito.</h2>';
	    	}
	    ?>

	    <!-- Se carga por defecto una ubicacion -->
	    <?php 
		    include '../../Business/Location/LocationBusiness.php';
		    $instLocationBusiness = new LocationBusiness();
		    $listProvince = $instLocationBusiness->getProvinceBusiness();
		    $listCanton = $instLocationBusiness->getCantonBusiness($listProvince[0]->getIdProvince());
		    $listDistrict = $instLocationBusiness->getDistrictBusiness($listCanton[0]->getIdCanton());
	    ?>

	</head>

	<body>
		<a href="../../index.php">Inicio</a>
		<hr>
		<!-- Fin del menu -->

		<form autocomplete="off" method="POST" action="../../Business/Client/ClientInsertAction.php">
			<table>
				<!--Correo-->
				<tr>
					<td><b>Correo</b></td>
					<td><input type="email" name="email"> *</td>
				</tr>

				<!-- Usuario -->
				<tr>
					<td><b>Usuario</b></td>
					<td><input type="text" name="user"> *</td>
				</tr>

				<!-- Contraseña -->
				<tr>
					<td><b>Contraseña</b></td>
					<td><input type="password" name="password"> *</td>
				</tr>

				<!-- Nombre -->
				<tr>
					<td><b>Nombre</b></td>
					<td><input type="text" name="name"> *</td>
				</tr>

				<!-- Primer Apellido -->
				<tr>
					<td><b>Primer apellido</b></td>
					<td><input type="text" name="surname1"> *</td>
				</tr>

				<!-- Segundo Apellido -->
				<tr>
					<td><b>Segundo apellido</b></td>
					<td><input type="text" name="surname2"> *</td>
				</tr>

				<!-- Fecha de nacimiento -->
				<tr>
					<td><b>Fecha de nacimiento</b></td>
					<td><input type="text" name="born" id="datepicker"> *</td>
				</tr>

				<!-- Sexo -->
				<tr>
					<td><b>Sexo</b></td>
					<td><input type="text" name="sex"> *</td>
				</tr>

				<!-- Teléfono -->
				<tr>
					<td><b>Teléfono</b></td>
					<td><input type="text" name="telephone"> *</td>
				</tr>

				<!-- Ubicación -->

				<tr> <!-- Inicio de fila para los select de ubicacion -->
					<td><b>Ubicación</b></td>
					<td>
						<!-- Select para PROVINCIA -->
						<select id="province" name="province" onclick="return getCanton()">
							<?php
								foreach ($listProvince as $temProv) {
									echo "<option value='". $temProv->getIdProvince() ."'> ".
										$temProv->getName() ." </option>";
								}
							?>
						</select> 

						<!-- Select para CANTON -->
						<select id="canton" name="canton" onclick="getDistrict()">
							<?php
								foreach ($listCanton as $temCanton) {
									echo "<option value='". $temCanton->getIdCanton() ."'> ".
										$temCanton->getNameCanton() ." </option>";
								}
							?>
						</select>

						<!-- Select para DISTRITO -->
						<select id="district" name="district">
							<?php
								foreach ($listDistrict as $temDistrict) {
									echo "<option value='". $temDistrict->getIdDistrict() ."'> ".
										$temDistrict->getNameDistrict() ." </option>";
								}
							?>
						</select>
					</td>
					
				</tr>
				<!-- Fin de los select para uicacion -->

				<!-- Otras señas -->
				<tr>
					<td></td>
					<td>
						<input type="text" name="otherReviews" placeholder="Otras señas">
					</td>
				</tr><!-- Fin para otras señas -->

				<!-- btn -->
				<tr>
					<td></td>
					<td><input type="submit" value="insertar"></td>
				</tr>
			</table>

		</form><!-- Fin del form para insertar -->
		
	</body>
</html>