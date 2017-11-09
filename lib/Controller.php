<?php 
// Main Class Controller with helper functions to get used by child classes

class Controller 
{
    public function view($view, $param = [], $datas = []) 
    {
        if(file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View ' . $view . ' does not exists');
        }
    }
}