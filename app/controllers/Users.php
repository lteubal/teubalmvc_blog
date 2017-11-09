<?php
// Users Controller 

class Users extends Controller 
{
    function login($param = []) 
    {          
        if(isset($_SESSION['id']))
        {
            $this->view('users/index', $param);
        }
        else
        {
          $this->view('users/login', $param);   
        }
        
    }
    function index($param = []) 
    {          
        if(!isset($_SESSION['id']))
        {
            $email = $param['email'];
            $password = $param['password'];
            $user = new User;
            $valid = $user->validateUser($email, $password);
            if (!$valid) {         
                $_SESSION['error'] = "Wrong Email or Password";
                header("Location: " . URL . "/users/login");
                die();        
            }   
            $this->view('users/index', $param);   
        } 
        else
        {
            
           $this->view('users/index', $param);       
        }
          
    }

    function logout($param = []) 
    {   
        session_unset();    
        $_SESSION['error'] = "You have successfully logged out!";
        header("Location: " . URL . "/users/login");        
        die();        
    }

}