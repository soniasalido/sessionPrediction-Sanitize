<?php

    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    $mierda = $token;
    echo "mierda:" . $mierda;

    //echo "<script>window.location='menu.php'</script>";
    echo "<button onclick='window.location='menu.php''>Regresar</button>";