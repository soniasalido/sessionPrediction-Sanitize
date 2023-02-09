<?php
    session_start();

    try
    {
        $database = 'demos';
        $username = 'root';
        $password = '';
        $conn = new PDO("mysql:host=localhost:3306;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn-> query("SET NAMES 'utf8'");
        $stmt = $conn->prepare("UPDATE usuarios SET bloqueado='Si' WHERE User=?");
        $stmt->bindParam(1, $_SESSION['userName']);
        $stmt->execute();

        //Verificamos que el insert haya realizado
        if ($stmt){
            echo "<script>alert('Usuario BLoqueado')</script>";

        }else{
            echo "<script>alert('ERROOOR. Usuario no bloqueado')</script>";
        }
    } catch (Exception $e) {
        echo 'RROR!!! Excepción capturada: ',  $e->getMessage(), "\n";
        return false;
    }

    echo "<script>window.location='fin.php'</script>";