<?php

    session_start();
    $tokenCambiado = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $tokenCambiado;

    echo "<script>window.location='menu.php'</script>";