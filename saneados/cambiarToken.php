<?php

    session_start();
    // Change token session as if we had suffered a session kidnapping
    $tokenCambiado = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $tokenCambiado;

    echo "<script>window.location='menu.php'</script>";