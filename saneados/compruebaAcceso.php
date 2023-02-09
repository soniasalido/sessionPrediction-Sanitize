

<?php
    //Función que comprueba si el usuario existe en la base de datos y NO está bloqueado
    function obtenerUser($user, $pass)
    {
        try
        {
            $database = 'demos';
            $username = 'root';
            $password = '';
            $conn = new PDO("mysql:host=localhost:3306;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn-> query("SET NAMES 'utf8'");
            $stmt = $conn->prepare("SELECT User FROM usuarios WHERE User = ? and Pass = ? and bloqueado='No' ");
            $stmt->bindParam(1, $user);
            $stmt->bindParam(2, $pass);
            $stmt->execute();

            if ( $stmt->rowCount() > 0 ) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user = $row['User'];
                return $user;
            }else{
                return false;
            }
        } catch (Exception $e)
        {
            echo 'RROR!!! Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        }
    }


    //Función que inserta el token en la base de datos
//    function insertarToken($miToken, $miUser){
//        try
//        {
//            $database = 'demos';
//            $username = 'root';
//            $password = '';
//            $conn = new PDO("mysql:host=localhost:3306;dbname=$database", $username, $password);
//            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            $conn-> query("SET NAMES 'utf8'");
//            $stmt = $conn->prepare("UPDATE usuarios SET token=? WHERE User=?");
//            $stmt->bindParam(1, $miToken);
//            $stmt->bindParam(2, $miUser);
//            $stmt->execute();
//
//            //Verificamos que el insert haya realizado
//            if ($stmt){
//                echo "<script>alert('Token añadido');</script>";
//
//            }else{
//                echo "<script>alert('ERROR Token NO añadido');</script>";
//            }
//        } catch (Exception $e)
//        {
//            echo 'RROR!!! Excepción capturada: ',  $e->getMessage(), "\n";
//            return false;
//
//        }
//    }




    //Obtenemos los datos del formulario
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    //Llamamos a la función que comprueba el usuario
    $userIdentificado = obtenerUser($user, $pass);


    //Si el usuario existe y no está bloqueado, creamos la sesión, el token que se guardará en la BD
    //Se redirige a la página de menú
    if ($userIdentificado != false) {
        session_start();
        $_SESSION['userName'] = $_POST['user'];
        $token = md5(uniqid(rand(), TRUE));
        $_SESSION['token'] = $token;
        include 'insertarToken.php';
        insertarToken($token, $_SESSION['userName']);
        echo "<script>window.location='menu.php'</script>";
    }else{
        echo "<script>alert('ERROR!!! Usuario no encontrado o bloqueado.')</script>";
        echo "<script>window.location='index.php'</script>";
    }
