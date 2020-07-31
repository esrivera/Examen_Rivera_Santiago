<?php

class Connection {
 function getConnection() {
    $conex = mysqli_connect("127.0.0.1", "root", "", "prueba");
    if (!$conex) {
        echo "<p>Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno();
        echo "error de depuración: " . mysqli_connect_error();
        echo "<p/>";
        exit;
    }else{
        return $conex;
    }
    
 }
}
