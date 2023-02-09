<?php

Función que inserta el token en la base de datos
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


