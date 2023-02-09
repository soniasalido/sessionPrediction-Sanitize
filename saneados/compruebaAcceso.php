<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <?php
        //Función que obtiene el username de la BD
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

        function insertarToken($miToken, $miUser){
            try
            {
                $database = 'demos';
                $username = 'root';
                $password = '';
                $conn = new PDO("mysql:host=localhost:3306;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn-> query("SET NAMES 'utf8'");
                $stmt = $conn->prepare("UPDATE usuarios SET token=? WHERE User=?");
                $stmt->bindParam(1, $miToken);
                $stmt->bindParam(2, $miUser);
                $stmt->execute();

                //Verificamos que el insert haya realizado
                if ($stmt){
                    echo "<script>alert('Token añadido');</script>";

                }else{
                    echo "<script>alert('ERROR Token NO añadido');</script>";
                }
            } catch (Exception $e)
            {
                echo 'RROR!!! Excepción capturada: ',  $e->getMessage(), "\n";
                return false;

            }
        }


        session_start();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $_SESSION['userName'] = $_POST['user'];

        $userIdentificado = obtenerUser($user, $pass);

        if ($userIdentificado != false) {
            $token = md5(uniqid(rand(), TRUE));
            $_SESSION['token'] = $token;
        }else{
            echo "<script>alert('ERROR!!! Usuario no encontrado.')</script>";
            echo "<script>window.location='index.php'</script>";
        }

        insertarToken($token, $_SESSION['userName']);
        echo "<script>window.location='menu.php'</script>";

    ?>


</body>
</html>
