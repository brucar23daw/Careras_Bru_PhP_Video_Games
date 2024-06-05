<?php

class User {
    public string $username;
    public string $password; 
    public string $role;
    public string $email;

    public function __construct($username, $role, $email) {
        $this->role = $role;
        $this->email = $email;
        $this->username = $username;
    }

    public function hashPassword($password) {
        $this->password = md5($password);
    }

    public function validatePassword($password) {
        return $this->password === md5($password);
    }
}