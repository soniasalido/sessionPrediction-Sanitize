<?php

    comprobarSession();

    $verificado = false;
    try
    {
        $database = 'demos';
        $username = 'root';
        $password = '';
        $conn = new PDO("mysql:host=localhost:3306;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn-> query("SET NAMES 'utf8'");
        $stmt = $conn->prepare("SELECT token FROM usuarios WHERE User= ?");
        $stmt->bindParam(1, $_SESSION['userName']);
        $stmt->execute();

        //Verificamos que el token sea el mismo
        if ( $stmt->rowCount() > 0 ) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $token = $row['token'];
            $token == $_SESSION['token'] ? $verificado = true : $verificado = false;
        }
    } catch (Exception $e)
    {
        echo 'ERROR!!! Excepción capturada: ',  $e->getMessage(), "\n";
        return false;
    }