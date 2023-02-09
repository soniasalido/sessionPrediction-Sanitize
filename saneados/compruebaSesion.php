
<?php

    comprobarSession();

    function comprobarSession(){
        if (isset($_SESSION['token'])) {
            echo "<h1>Bienvenido:  a nuestra web".$_SESSION['userName']."</h1>";
        }else{
            echo "<script>alert('ERROR!!! No iniciada la sesión.')</script>";
            echo "<script>window.location='index.php'</script>";
        }
    }

