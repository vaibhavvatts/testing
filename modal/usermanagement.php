<?php

require_once MODAL_PATH . "appmodal.php";

class UserManagementModal extends AppModal {

    private $_objPdo;

    function __construct() {
        $this->_objPdo = $this->_connectToDatabase();
    }

    public function createUser() {
        $query = "insert into user ("
                . "email, "
                . "first_name, "
                . "middle_name, "
                . "last_name, "
                . "password, "
                . "image, "
                . "image_description, "
                . "age, "
                . "sex) "
                . "values (?,?,?,?,?,?,?,?,?)";

        $stmt = $this->_objPdo->prepare($query);

        if ($stmt->execute(array(
                    $this->email,
                    $this->firstName,
                    $this->middleName,
                    $this->lastName,
                    $this->password,
                    $this->image,
                    $this->imageDescription,
                    $this->age,
                    $this->sex))) {
            return $this->_successCode;
        } else {
            return $this->_errorCode;
        }
    }

    public function getUserInfomation() {/*
      $query = "select "
      . "email, "
      . "first_name, "
      . "middle_name, "
      . "last_name, "
      . "password, "
      . "image, "
      . "image_description, "
      . "age, "
      . "sex"
      . "from user where e
     */
    }

    public function loginUser() {
        //var_dump($this);
        $query = "select "
                . "email, "
                . "first_name, "
                . "password, "
                . "image, "
                . "image_description, "
                . "from user where email = ? and password = ?";
        $stmt = $this->_objPdo->prepare($query);
        
        if ($stmt->execute(array(
            $this->email,
            $this->password ))){
            $stmt->fetch();
        }else{
            echo $this->_errorCode;
        }
        var_dump($this->_objPdo->errorInfo());
    }

}
