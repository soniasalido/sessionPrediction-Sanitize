
<?php

    comprobarSession();

    function comprobarSession(){
        if (isset($_SESSION['token'])) {
            echo "<h1>Bienvenido: ".$_SESSION['token']."</h1>";
        }else{
            echo "<script>alert('ERROR!!! No iniciada la sesión.')</script>";
            echo "<script>window.location='index.php'</script>";
        }
    }