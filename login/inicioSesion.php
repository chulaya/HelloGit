<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<!-- Bootstrap -->

	
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<a href="../indexBoostrap.html"><img src="../Contenido/Img/LogoSinFondo.png"></a>
				<h2 class="title">BIENVENIDO/A</h2>
				<?php
					include("conexion_bd.php");
					include("consultar.php");
				?>
    			<div class="input-div one">
           		   	<div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nombre usuario</h5>
           		   		<input type="text" class="input" name="usuario">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<a href="#">Olvidaste la contraseña?</a>
            	<input type="submit" class="btn" value="INICIO SESIÓN" name="ingresar">
				<input type="submit" class="btn" value="REGISTRAR" name="registrar">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
