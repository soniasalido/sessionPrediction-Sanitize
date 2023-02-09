<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        // Se Actualiza el id de sesión actual con uno generado más reciente. Esto protege de ataques de fijación de sesión
        session_regenerate_id();
    ?>


    <form action="compruebaAcceso.php" method="post">
        Login: <input type="text" name="user">
        Pass: <input type="text" name="pass">
        <input type="submit">
    </form>


    <?php
        // Si la sesión ya está iniciada, el usuario NO puede estar aquí & Se redirige al usuario a la página de verDatos.php
        if (isset($_SESSION['userName'])) {
            echo "<script>alert('Ya has iniciado la sesión. No puedes estar aqui');</script>";
            echo "<script> window.location='verDatos.php';</script>";
        }
    ?>


</body>
</html>