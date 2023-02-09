<?php

// Inserta el token en la BD

try
    {
        $database = 'demos';
        $username = 'root';
        $password = '';
        $conn = new PDO("mysql:host=localhost:3306;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn-> query("SET NAMES 'utf8'");
        $stmt = $conn->prepare("UPDATE usuarios SET token=? WHERE id=?");
        $stmt->bindParam(1, $_SESSION['token']);
        $stmt->bindParam(2, $_SESSION['userName']);
        $stmt->execute();

        //Verificamos que el insert haya realizado
        if ($stmt){
            echo "<script>alert('Proceso realizado con EXITO. TOKEN añadido a la BD')</script>";

        }else{
            echo "<script>alert('ERROOOR. TOKEN NO añadido a la BD')</script>";
        }
    } catch (Exception $e)
    {
        echo 'RROR!!! Excepción capturada: ',  $e->getMessage(), "\n";
        return false;

}



