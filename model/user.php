<?php

class User
{
    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $pass)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $pass;
    }

    public function loginUser($username, $password, mysqli $conn)
    {
        $queryStr = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        //return true;
        //poslati upit nad bazom
        return $conn->query($queryStr);
    }
}
