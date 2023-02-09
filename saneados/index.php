<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="compruebaAcceso.php" method="post">
        Login: <input type="text" name="user">
        Pass: <input type="text" name="pass">
        <input type="submit">

    <?php
        session_start();
        session_regenerate_id();
        if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
            echo "<script>alert('Ya has iniciado la sesión. No puedes estar aqui');</script>";
            echo "<script> window.location='verDatos.php';</script>";
        }
    ?>


    </form>
</body>
</html>