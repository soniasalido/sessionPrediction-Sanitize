
<?php

    function comprobarSession(){
        if (isset($_SESSION['user'])) {
            echo "<h1>Bienvenido: ".$_SESSION['user']."</h1>";
        }else{
            echo "<script>alert('ERROR!!! No iniciada la sesión.')</script>";
            echo "<script>window.location='index.php'</script>";
        }
    }