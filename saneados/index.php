<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        // Update actual session id with a newly generated one. This is to protect against session fixation attacks.
        session_regenerate_id();
    ?>


    <form action="compruebaAcceso.php" method="post">
        Login: <input type="text" name="user">
        Pass: <input type="text" name="pass">
        <input type="submit">
    </form>

    <?php
        // If the session is started, the user can be here & the user is redirected to the login page.
        // Redirect to verDatos.php
        if (isset($_SESSION['userName'])) {
            echo "<script>alert('Ya has iniciado la sesión. No puedes estar aqui');</script>";
            echo "<script> window.location='menu.php';</script>";
        }
    ?>

</body>
</html>