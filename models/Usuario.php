<?php

class Usuario
{
    private $username, $password, $rol;

    public function __construct($username, $password, $rol)
    {
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRol()
    {
        return $this->rol;
    }
}
