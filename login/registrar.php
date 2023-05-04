<?php

//session_start();
include("conexion_bd.php");
include('consultar.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="description" content="This Is a page practice about HTML 5 inputs & forms">
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <title>Input & Forms</title>
   <!---->
   <style>
      body {
         font-family: calibri;
         padding: 0;
         margin: 0;
         background-color: #9b6eff;
      }

      .loginBox {
         margin: 1% auto 0% auto;
         padding: 5px 60px 20px 60px;
         width: 40%;
         height: 50%;
         box-sizing: border-box;
         background: rgba(0, 0, 0, .5);
      }

      h2 {
         margin: 0;
         padding: 0 0 20px;
         text-align: center;
         color: violet;

      }

      .loginBox p {
         margin: 0;
         padding: 0;
         font-weight: bold;
         color: #fff;
      }

      .loginBox input {
         width: 100%;
         height: 20px;
         margin: 0 0 20px 0;
      }

      .loginBox input[type="text"],
      .loginBox input[type="password"],
      .loginBox input[type="email"],
      .loginBox input[type="date"] {
         border: none;
         border-bottom: 1px solid #fff;
         background: transparent;
         outline: none;
         color: #fff;
         font-size: 14px;
         text-align: center;
      }

      ::placeholder {
         color: white;
         opacity: 0.1;
         text-align: center;
      }

      .loginBox button[type="submit"] {
         border: 1px solid;
         height: 40px;
         color: violet;
         background-color: transparent;
      }

      .loginBox button[type="submit"]:hover {
         color: pink;
         border: 2px solid;
      }

      form a {
         color: violet;
         text-decoration: none;
      }

      .btn {
         display: block;
         width: 100%;
         border-radius: 25px;
         outline: none;
         border: none;
         background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
         background-size: 200%;
         font-size: 1.2rem;
         color: #fff;
         font-family: 'Poppins', sans-serif;
         text-transform: uppercase;
         margin: 1rem 0;
         cursor: pointer;
         transition: .5s;
      }

      .btn:hover {
         background-position: right;
      }
   </style>
</head>

<body>
   <header>

   </header>
   <main>
      <div class="loginBox">
         <h2>Sign Up</h2>

         <form method="post" id="formulario">
            <p>First Name</p>
            <input type="text" name="fname" id="fname" placeholder="Firstname" required pattern="^[A-ZÑa-zñáéíóúÁÉÍÓÚ'° ]+$"><br>
            <p>Last Name</p>
            <input type="text" name="lname" id="lname" placeholder="Lastname" required pattern="^[A-ZÑa-zñáéíóúÁÉÍÓÚ'° ]+$"><br>
            <!--Esta expresión regular valida los nombres y/o apellidos.
             Permite letras en mayúsculas y minúsculas; con tilde. También incluye espacios, apostrofes. -->
            <p>Address</p>
            <input type="text" name="address" id="address" placeholder="Address" required pattern="^[A-ZÑa-zñáéíóúÁÉÍÓÚ'°\d ]+$"><br>
            <p>Phone Number</p>
            <input type="text" name="numero" id="numero" placeholder="123456789" required pattern="[0-9]{9}"><br>
            <p>E-mail Address</p>
            <input type="email" name="email" id="email" placeholder="e-mail" required pattern="^[a-zA-Z|\d|_|-|\.]+@[a-zA-Z]+[^_|-][\.][a-zA-Z|\d|-]+">
            <p>Username</p>
            <input type="text" name="username" id="username" placeholder="Create Username" required pattern="([a-z]([\d]{1,2})?){5,12}">
            <p>Password</p>
            <input type="Password" name="pword1" id="pword1" placeholder="Create Password" required pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[\d]).{8,}">
            <p>Re-enter Password</p>
            <input type="password" name="pword2" id="pword2" Placeholder="Confirm Password" required>
            <p id="ocho" style="color: red;"></p>
            <button type="submit" name="crearCuenta" id="crearCuenta" class="btn" value="Crear cuenta">Weee</button>


            <p>Already have an account? <a href="login.php">Sign In</a></p>
         </form>
      </div>
   </main>
</body>
<?php  //si no se pone el action en el formulario se envia a la misma pagina
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['address']) && isset($_POST['numero']) && isset($_POST['email'])
         && isset($_POST['username']) && isset($_POST['pword1'])){

   include('conexion_bd.php');
 
   $nombre = $_POST['fname'];
   $apellidos = $_POST['lname'];
   $direccion = $_POST['address'];
   $numero = $_POST['numero'];
   $correo = $_POST['email'];
   $contras = $_POST['pword1'];
   $usuario = $_POST['username'];

  /* Habrá que hacer una subconsulta para que si el username ya existe en la BBDD entonces salga un aviso, 
      por el momento dejamos esa posibilidad aunque seguro hay que hacerlo*/

   $consulta2 = $conexion->query("INSERT INTO clientes (nombre, apellido, direccion, telefono, correo, password, username) 
                                       VALUES ('$nombre', '$apellidos', '$direccion', '$numero', '$correo', '$contras', '$usuario')");
   
   //header("location: ../indexBoostrap.html");
       if ($consulta2) {
           //echo "Welcome ". $_SESSION['username']; tendria que aparecerme arriba-> WELCOME $usuario--no se usar ni session_start()
           $_SESSION['usuario'] = $usuario;
           //("location: ../index.php");
           echo "<script> 'window.location.href =../index.php '</script>";
           //die;
           //include_once '../indexBoostrap.html';
       } else {
           //echo '<div>SOMETHING IS WRONG</div>'; //al momento nunca entra aquí, aunque pinche el boton despues de haber insertado solo 1 campo
           echo "<script type='text/javascript'>alert('SOMETHING IS WRONG');</script>";

       }

}
 
   
   /*$consulta = $conexion->query("SELECT * FROM clientes WHERE username='$usuario'");
   $row = mysqli_fetch_array($consulta);
   if ($_SESSION['username'] == $row['username'])
       echo 'alert("error")';
   else {
   exit(var_dump($row['username']));*/
       
   

?>
<script type="text/javascript" src="js/registrar.js"></script>
</html>