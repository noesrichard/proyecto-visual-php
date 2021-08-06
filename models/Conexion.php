<?php

class Conexion
{
    private $conn; 
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "escuela";
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
    }
    function getConexion()
    { 
        return $this->conn;  
    }

    function query($query)
    { 
        $resultado = $this->conn->query($query) or die($this->conn->error); 
        return $resultado;
    }
}

?>
