<?php

    include 'compruebaSesion.php';


    try
    {
        $database = 'demos';
        $username = 'root';
        $password = '';
        $conn = new PDO("mysql:host=localhost:3306;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn-> query("SET NAMES 'utf8'");
        $stmt = $conn->prepare("SELECT id, User FROM usuarios WHERE User = ? and token = ? ");
        $stmt->bindParam(1, $_SESSION['userName']);
        $stmt->bindParam(2, $_SESSION['token']);
        $stmt->execute();

        if ( $stmt->rowCount() > 0 ) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $user = $row['User'];
            echo "ID del Usuario" . $id;
            echo "Nombre del Usuario:" . $user;
        }else{
            echo '<script>alert("ERROR!!!xxxxxxxxx.")</script>';
            return false;
        }

    } catch (Exception $e)
    {
        echo 'RROR!!! Excepción capturada: ',  $e->getMessage(), "\n";
        return false;
    }



