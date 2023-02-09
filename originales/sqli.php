<html lang="es">
<head></head>
    <body>
    <form action="sqli.php" method="get">
        Login: <input type="text" name="user">
        Pass: <input type="text" name="pass">
    <input type="submit">

    <?php
    session_start();


    if ($_SESSION['username'] != null) {
        echo "<script>alert('Ya has iniciado la sesión. No puedes estar aqui');</script>";
        echo "<script> window.location='sqliDatos.php';</script>";
    }


    if (isset($_GET["user"]))
         {
             $conexion = mysqli_connect("localhost", "root", "", "demos")
                or die ("No se puede conectar con el servidor");

            $queEmp = "SELECT * FROM usuarios where user ='".$_GET["user"]."' and pass='".$_GET["pass"]."'";
            $resEmp = mysqli_query( $conexion,$queEmp) or die(mysqli_error());
            $totEmp = mysqli_num_rows($resEmp);

            if ($totEmp> 0) {
                $rowEmp = mysqli_fetch_assoc($resEmp);
                $usuario=$rowEmp['User'];

                $token = md5(uniqid(rand(), TRUE));
                $_SESSION['username'] = $token;

                echo "<br>";
                echo "El usuario es: ".$usuario;
                echo "<br>";
                echo "<a href='sqliDatos.php'>Ver datos</a>";

            }
            else{
                echo "Usuario o password incorrecto";
            }

         }
    ?>

    </form>
    </body>
</html>