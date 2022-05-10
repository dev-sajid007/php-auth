<?php

include_once 'Session.php';
include 'Database.php';

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    public function userRegistration($data)
    {

        $name       = $data['name'];
        $username   = $data['username'];
        $email      = $data['email'];
        $password   = $data['password'];
        $checkMail  = $this->checkEmail($email);

        if ($name == '' || $username == '' || $email == '' || $password == '') {
            return $msg = "<div class='alert alert-danger'>Error!</div>";
        }

        if ($checkMail) {
            return $msg = "<div class='alert alert-danger'>Email Already Exist!</div>";
        }

        $sql = "INSERT INTO tbl_user (name,username,email,password) VALUES(:name,:username,:email,:password)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':username', $username);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $result = $query->execute();

        if ($result) {
            $msg = "<div class='alert alert-success'>Registration Successfully!</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'>Registration Problem!</div>";
            return $msg;
        }
    }



    public function checkEmail($email)
    {
        $sql = "SELECT email from tbl_user WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();

        return $query->rowCount() > 0 ? true : false;
    }



    public function getUserLogin($email, $password)
    {
        $sql = "SELECT * from tbl_user WHERE email = :email AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }



    public function userLogin($data)
    {
        $email      = $data['email'];
        $password   = $data['password'];
        $checkMail  = $this->checkEmail($email);

        if ($email == '' || $password == '') {
            return $msg = "<div class='alert alert-danger'>Field must be required!</div>";
        }

        if ($checkMail != true) {
            return $msg = "<div class='alert alert-danger'>Email not found!</div>";
        }

        $result = $this->getUserLogin($email, $password);
        if ($result) {
            Session::init();
            Session::set('login', true);
            Session::set('id', $result->id);
            Session::set('name', $result->name);
            Session::set('username', $result->username);
            Session::set('loginMsg', "<div class='alert alert-success'>Successfully Login!</div>");
            header("location:index.php");
        } else {
            $msg = "<div class='alert alert-danger'>Data not found!</div>";
            return $msg;
        }
    }


    public function getUser(){
        $sql = "SELECT * FROM tbl_user";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
