<?php
// User Model

class User {
    private $database;
    
    public function __construct() 
    {
        $this->database = new Database;        
    }
    // get results from posts
    public function validateUser($email, $password) {
        $this->database->prepare('SELECT * FROM users WHERE email = :email');
        $this->database->execute(['email' => $email]);
        $user = $this->database->fetch();
        
        if (password_verify($password, $user->password)) {
            $_SESSION['id'] = $user->id;
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;
            return true;
        } else {
            return false;
        }
    }
}