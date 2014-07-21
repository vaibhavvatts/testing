<?php

class AppController {
    
    protected $_errorCode = -1;
    protected $_errorCode2 = -2;
    
        function loadView($templeName, $arrArg) {
        $viewPath = VIEW_PATH . $templeName;
        if (file_exists($viewPath)) {
            if (isset($arrArg)) {
                $arrData = $arrArg;
            }
            include_once $viewPath;
        } else {
            die($templeName . '- template not found under view folder');
        }
    }

    function loadModal($modalName, $method, $properties) {
        $modalPath = MODAL_PATH . strtolower($modalName) . '.php';

        if (file_exists($modalPath)) {
            include_once $modalPath;
            
            $modalclass = $modalName . 'Modal';

            if (!method_exists($modalclass, $method)) {
                die($method . ' method is not found under class ' . $modalclass);
            }

            $obj = new $modalclass;

            if (isset($properties)) {
                while (list($key, $value) = each($properties)) {
                    $obj->$key = $value;
                }
                return $obj->$method();
            } else {
                return $obj->$method();
            }
        } else {
            die($modalName . '-modal does not exist');
        }
    }

}
