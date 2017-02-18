<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Actualizar Cliente</title>

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
	    <script src="../../JS/Address.js"></script>

	    <?php 
		    /* =========== Informacion del cliente =========== */
		    include '../../Business/Client/ClientBusiness.php';
		    $instClientBusiness = new ClientBusiness();
		    if(!isset($_SESSION['idUser'])){
		    	@session_start();
		    }
		    $client = $instClientBusiness->getClientByIdBusiness($_SESSION['idUser']);
		    
		    $province = split(";", $client->addressClient)[0];
		    $canton = split(";", $client->addressClient)[1];
		    $district = split(";", $client->addressClient)[2];
		    $otherReviews = split(";", $client->addressClient)[3];

		    /* =========== Ubicación =========== */
		    include '../../Business/Location/LocationBusiness.php';

		    $instLocationBusiness = new LocationBusiness();
		    $listProvince = $instLocationBusiness->getProvinceBusiness();
		    $listCanton = $instLocationBusiness->getCantonBusiness($province);
		    $listDistrict = $instLocationBusiness->getDistrictBusiness($canton);

	    ?>

	</head>

	<body>
		<a href="../Modules/ClientView.php">Inicio</a>
		<hr>
		<!-- Fin del menu -->


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



		<form autocomplete="off" method="POST" action="../../Business/Client/ClientUpdateAction.php">
			<!-- Input no visibles -->
			<input type="hidden" name="id" value="<?php echo $client->idClient; ?>">
			<input type="hidden" name="active" value="<?php echo $client->active; ?>">


			<table>
				<!--Correo-->
				<tr>
					<td><b>Correo</b></td>
					<td><input type="email" name="email" value="<?php echo $client->emailClient; ?>" > *</td>
				</tr>

				<!-- Usuario -->
				<tr>
					<td><b>Usuario</b></td>
					<td><input type="text" name="user" value="<?php echo $client->userClient; ?>"> *</td>
				</tr>

				<!-- Contraseña -->
				<tr>
					<td><b>Contraseña</b></td>
					<td><input type="password" name="password" value="<?php echo $client->passwordClient; ?>"> *</td>
				</tr>

				<!-- Nombre -->
				<tr>
					<td><b>Nombre</b></td>
					<td><input type="text" name="name" value="<?php echo $client->nameClient; ?>"> *</td>
				</tr>

				<!-- Primer Apellido -->
				<tr>
					<td><b>Primer apellido</b></td>
					<td><input type="text" name="surname1" value="<?php echo $client->surname1Client; ?>"> *</td>
				</tr>

				<!-- Segundo Apellido -->
				<tr>
					<td><b>Segundo apellido</b></td>
					<td><input type="text" name="surname2" value="<?php echo $client->surname2Client; ?>"> *</td>
				</tr>

				<!-- Fecha de nacimiento -->
				<tr>
					<td><b>Fecha de nacimiento</b></td>
					<td><input type="text" name="born" id="datepicker" value="<?php echo date_format($client->bornClient, "m-d-Y") ?>"> *</td>
				</tr>

				<!-- Sexo -->
				<tr>
					<td><b>Sexo</b></td>
					<td><input type="text" name="sex" value="<?php echo $client->sexClient; ?>"> *</td>
				</tr>

				<!-- Teléfono -->
				<tr>
					<td><b>Teléfono</b></td>
					<td><input type="text" name="telephone" value="<?php echo $client->telephoneClient; ?>"> *</td>
				</tr>

				<!-- Ubicación -->

				<tr> <!-- Inicio de fila para los select de ubicacion -->
					<td><b>Ubicación</b></td>
					<td>
						<!-- Select para PROVINCIA -->
						<select id="province" name="province" onclick="return getCanton()">
							<?php
								foreach ($listProvince as $temProv) {
									if($temProv->getIdProvince() == $province){
										echo "<option 
												value='". $temProv->getIdProvince() ."' selected> ".
												$temProv->getName() ."
											 </option>";
									}
									else{
										echo "<option value='". $temProv->getIdProvince() ."'> ".
										$temProv->getName() ." </option>";
									}
								}
							?>
						</select> 

						<!-- Select para CANTON -->
						<select id="canton" name="canton" onclick="getDistrict()">
							<?php
								foreach ($listCanton as $temCanton) {
									if($temCanton->getIdCanton() == $canton){
										echo "<option value='". $temCanton->getIdCanton() ."' selected> ".
												$temCanton->getNameCanton() ." 
											</option>";
									}else{
										echo "<option value='". $temCanton->getIdCanton() ."'> ".
										$temCanton->getNameCanton() ." </option>";
									}
								}
							?>
						</select>

						<!-- Select para DISTRITO -->
						<select id="district" name="district">
							<?php
								foreach ($listDistrict as $temDistrict) {
									if($temDistrict->getIdDistrict() == $district){
										echo "<option value='". $temDistrict->getIdDistrict() 
										."' selected> ".
												$temDistrict->getNameDistrict() ."
											</option>";
									}else{
										"<option value='". $temDistrict->getIdDistrict() 
										."'> ".
										$temDistrict->getNameDistrict() ." </option>";
									}
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
						<input type="text" name="otherReviews" value="<?php echo $otherReviews; ?>">
					</td>
				</tr><!-- Fin para otras señas -->

				<!-- btn -->
				<tr>
					<td></td>
					<td><input type="submit" value="Actualizar"></td>
				</tr>
			</table>

		</form><!-- Fin del form para insertar -->
		
	</body>
</html>