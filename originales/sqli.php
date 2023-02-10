<html>
<head></head>
<body>
<form action="https://educacionadistancia.juntadeandalucia.es/centros/granada/pluginfile.php/178735/mod_assign/introattachment/0/sqli.php" method="get">
Login: <input type="text" name="user">
Pass: <input type="text" name="pass">
<input type="submit">

<?php 
if (isset($_GET["user"]))
 {
 $conexion = mysqli_connect("localhost", "root", "root", "demos")
    or die ("No se puede conectar con el servidor");
 
$queEmp = "SELECT * FROM demos.usuarios where user ='".$_GET["user"]."' and pass='".$_GET["pass"]."'";
$resEmp = mysqli_query( $conexion,$queEmp) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

if ($totEmp> 0) {
   $rowEmp = mysqli_fetch_assoc($resEmp);
   $usuario=$rowEmp['User'];
   session_id($usuario);
   session_start();
   $_SESSION['username'] = $usuario;
  
   
   echo "<br></br>";
   echo "El usuario es: ".$usuario;
   echo "<br></br>";
   echo "<a href='https://educacionadistancia.juntadeandalucia.es/centros/granada/pluginfile.php/178735/mod_assign/introattachment/0/sqliDatos.php'>Ver datos</a>";
   
  }
else{
	echo "Usuario o password incorrecto";
}

 }?>
</form>
</body>
</html>