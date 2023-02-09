<?php



    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    echo "<script>window.location='menu.php'</script>";