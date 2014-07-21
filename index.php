<?php

ini_set('display_errors', 1);

class Router {

    private $_function;
    private $_controller;

    function findRoutingMembers() {
        
        $constatsFile = $_SERVER['DOCUMENT_ROOT'] . '/config/constants.php';

        if (!file_exists($constatsFile)) {
            die($constatsFile . ' - does not exist on index page');
        } 
        // if exists load it
        include_once($constatsFile);


        // set controller
        if (isset($_GET['controller']) && !empty($_GET['controller'])) {
            $this->_controller = $_GET['controller'];
        } else {
            $this->_controller = "UserManagement";
        }
        
        
        // set function
        if (isset($_GET['function']) && !empty($_GET['function'])) {
            $this->_function = $_GET['function'];
        } else {
            $this->_function = 'createUser';    //default function
        }
    }

    function callFunctionOfTheClass() {
        
        $classPath = SITE_ROOT . 'controller/' . strtolower($this->_controller) . '.php';
        $function = $this->_function;
        if (file_exists($classPath)) {
            //$classPath = ltrim($classPath,'/');
            require_once $classPath;
            //require_once('var/www/testing/controller/usermanagement.php');
            $controllerClass = $this->_controller . 'controller';
            
            if (!method_exists($controllerClass, $this->_function)){
                die($this->_function . ' function not found');
            }
            $obj = new $controllerClass;
            $obj->$function(); 
        } else {
            die($this->_controller . ' controller not found');
        }
        
        
        /*
        $controller = strtolower($this->_controller);

        $fn = SITE_ROOT . 'controller/' . $controller . '.php';

        if (file_exists($fn)) {
            echo "df";
            require_once($fn);
            $controllerClass = $controller . 'Controller';
            if (!method_exists($controllerClass, $function)) {
                die($function . ' function not found');
            }

            $obj = new $controllerClass;
            $obj->$function();
        } else {
            die($controller . ' controller not found');
        }
         * 
         */
    }

}


$router = new Router;

$router->findRoutingMembers();
$router->callFunctionOfTheClass();
