<?php

class AppModal 
{
    private $_host = 'localhost';
    private $_user = 'root';
    private $_databaseName = 'blog';
    private $_password = 'root';
    
    protected $_errorCode = -1;
    protected $_errorCode2 = -2;
    protected $_successCode;

    protected static $connectionObj = NULL;
    
    public function __set($name, $value) 
    {
        $this->$name = $value;
    }
    
    public function __get($name) 
    {
        if(!isset($this->$name)){
            return  NULL;
        }
        return $this->$name;        
    }
    
    protected function _connectToDatabase()
    {
        if(self::$connectionObj == NULL){
            //   = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
            self::$connectionObj = new PDO('mysql:host='.$this->_host.';'
                    . '                     dbname='.$this->_databaseName.'', 
                                            $this->_user, $this->_password);
            return self::$connectionObj;
        }else{
            //var_dump(self::$connectionObj);
            return self::$connectionObj;
        }     
    }
}