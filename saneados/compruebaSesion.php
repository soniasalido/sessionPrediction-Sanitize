
<?php

    comprobarSession();

    function comprobarSession(){
        if (!isset($_SESSION['token'])) {
            echo "<script>alert('ERROR!!! No iniciada la sesión.')</script>";
            echo "<script>window.location='index.php'</script>";
        }
    }

