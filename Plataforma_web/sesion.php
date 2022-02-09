<?php
	session_start();

	if (isset($_SESSION['u_usuario'])){
		echo "<h1>INICIO SESION CORRECTAMENTE </h1>";
		echo "<br>";
		echo "<h3>"."<a href='cerrar_sesion.php'>"."Cerar Sesion"."</h3>";
	}else{
		header("Location: ingreso.html");
	}
?>