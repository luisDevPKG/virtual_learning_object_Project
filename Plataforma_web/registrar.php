<?php

	$user = $_POST['nombre'];
	$email = $_POST['correoelectronico'];
	$pass = $_POST['contraseña'];
	$rol = $_POST['rol'];


	$host_db= "localhost";
	$user_db= "root";
	$pass_db= "";
	$db_name= "usuarios";
	$table_name= "registrate";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion -> connect_error) {
		die ("Fallo en la conexion".$conexion -> connect_error);
	}

	$buscarusuario = "SELECT * FROM $table_name WHERE email = '$email' ";
	$resultado = $conexion -> query($buscarusuario);

	$count = mysqli_num_rows($resultado);
	
	if ($count == 1) {
		echo "<br /> El correo ya está en uso <br />";
		echo "<a href='registro.html'> Ingrese nuevamente el correo </a>";
	}else {
		$query = "INSERT INTO registrate VALUES ('$user','$email', '$pass','$rol')"; 
		if ($conexion -> query($query) == true){
			echo "<br />"."<h1>"."Usuario creado correctamente"."</h1>";
			echo "<br>";
			echo "<h3>"."Bienvenido: ".$_POST['nombre']."</h3>";
			echo "<br>";
			echo "<br>";
			echo "<h3>"."Puedes ingresar en la siguiente direccion: "."<a href='ingreso.html'> Iniciar Sesion </a>"."</h3>";
		}else {
			echo "Error al crear el usuario".$query."<br>".$conexion -> error;
		}
	}

?>