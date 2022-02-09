<?php
	session_start();
	$email = $_POST['correoelectronico'];
	$pass = $_POST['contraseña'];
	$rol = $_POST['rol'];

	include("conexion.php");

	$proceso = $conexion -> query("SELECT * FROM ingreso WHERE email = '$email' AND contraseña = '$pass' AND rol = '$rol' ");

	if ($resultado = mysqli_fetch_array($proceso)){
		$_SESSION['u_usuario'] = $email;
		header("Location: sesion.php");
		//echo "Sesion iniciada";
	}else{
		//header("Location: ingreso.html");
		echo "Error de email o contraseña";
		echo "<h3>"."Puedes ingresar nuevamente en la siguiente direccion: "."<a href='ingreso.html'> Iniciar Sesion </a>"."</h3>";
	}

?>