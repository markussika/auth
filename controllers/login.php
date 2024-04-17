<?php
require "Validator.php";
require "Database.php";
$config =require("config.php"); 



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $db = new Database($config);
    $errors = [];

    if(!Validator::email($_POST["email"])){
        $errors["email"] = "nepareizs epasta formats";
    }

    if (empty($errors)){
        $query = "SELECT * FROM users WHERE email = :email ";
        $params = [
            "email" => $_POST["email"],
         
        ];
        $user = $db->execute($query, $params)->fetch();
        if ( !$user || !password_verify($_POST["password"], $user["password"])){
            $errors["email"] = "kkas nav labi";
        }

        
    }
    if (empty($errors)) {
            $_SESSION["user"] = true;
            $_SESSION["email"] = $_POST["email"];
    }
}


require "views/login.view.php";