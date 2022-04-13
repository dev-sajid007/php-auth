<?php

include_once 'Session.php';
include 'Database.php';

class User{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    public function userRegistration($data){

        $name     = $_POST['name'];
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $checkMail = $this->checkEmail($email);
        if($name == '' || $username == '' || $email == '' || $password == ''){
            return $msg = "<div class='alert alert-danger'>Error!</div>";
        }

        if($checkMail){
            return $msg = "<div class='alert alert-danger'>Email Already Exist!</div>";
        }

        $sql = "INSERT INTO tbl_user (name,username,email,password) VALUES(:name,:username,:email,:password)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name',$name);
        $query->bindValue(':username',$username);
        $query->bindValue(':email',$email);
        $query->bindValue(':password',$password);
        $result = $query->execute();

        if ($result) {
             $msg = "<div class='alert alert-success'>Registration Successfully!</div>";
             return $msg;
        }
        else{
            $msg = "<div class='alert alert-danger'>Registration Problem!</div>";
            return $msg;

        }




    }



    public function checkEmail($email){
        $sql = "SELECT email from tbl_user WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();

        return $query->rowCount() > 0 ? true:false;
    }
}