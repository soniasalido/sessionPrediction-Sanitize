<?php

    session_start();
    // Se cambia el token de la sesión como si hubieramos sufrido un secuestro de sesión
    $tokenCambiado = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $tokenCambiado;

    echo "<script>window.location='menu.php'</script>";