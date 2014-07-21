<?php

require_once CONTROLLER_PATH . "appcontroller.php";

class UserManagementController extends AppController
{
    private function _imageFileHandler($userImage)
    {
        $maxSizeOfImage = 200000;
        $minSizeOfImage = 2;
        $typeOfImage = "image/png";
        
        if($userImage == NULL){
            $userImage = "1001";
        }
        
        if($userImage['error'] != 0){
            return $this->_errorCode;
        }
        
        if($userImage['error'] > $maxSizeOfImage){
            return $this->_errorCode;
        }
        
        return file_get_contents($userImage['tmp_name']);
        
    }

    public function createUser()
    {
        $arrArg['email'] = $_POST['email'];
        $arrArg['firstName'] = $_POST['firstName'];
        $arrArg['password'] = md5($_POST['password']);
        
        $arrArg['middleName'] = $_POST['middleName'];
        $arrArg['lastName'] = $_POST['lastName'];
        
        if(!empty($_FILES['image'])){
            $arrArg['image'] = $this->_imageFileHandler($_FILES['image']);
        }
        
        $arrArg['imageDescription'] = $_POST['imageDescription'];
        $arrArg['age'] = $_POST['age'];
        $arrArg['sex'] = $_POST['sex'];
        
        $this->loadModal('UserManagement', __FUNCTION__,$arrArg);
    }
    
    public function loginUser()
    {
        $arrArg['email'] = $_POST['email'];
        $arrArg['password'] = md5($_POST['password']);
        
        $this->loadModal('UserManagement', __FUNCTION__,$arrArg);
    }
}