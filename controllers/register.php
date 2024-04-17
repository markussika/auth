<?php

require "config.php";
require "Validator.php";
require "Database.php";
$config =require("config.php"); 


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $db = new Database($config);
    $errors = [];

    if(!Validator::email($_POST["email"])){
        $errors["email"] = "nepareizs epasta formats";
    }

    if(!Validator::password($_POST["password"])){
        $errors["password"] = "nepareizs paroles formats";
    }
    $query = "SELECT * FROM users WHERE email = :email" ;
    $params = [":email" => $_POST["email"]] ;
    $user = $db->execute($query, $params)->fetch();
    password_verify($_POST["password"], $user["password"]);

    if($result) {
        $errors["email"] = "konts jau pastāv";
    }
if (empty($errors)) {
    $query = "INSERT INTO users (email, password)
              VALUES (:email, :password);";
    $params = [
        ":email" => $_POST["email"],
        ":password" =>password_hash($_POST["password"], PASSWORD_BCRYPT)
    ];
    $db->execute($query, $params);

    header("Location: /");
    die();
}


    // $_POST["email"];
    // $_POST["password"];

}


$title = "register";
require "views/register.view.php";