<?php

require "Validator.php";
require "Database.php";
$config = require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new Database($config);

  $errors = [];

  if (!Validator::email($_POST["email"])) {
    $errors["email"] = "Nepareiz epasta formāts";
  }

  $query = "SELECT * FROM users WHERE email = :email";
  $params = [
    ":email" => $_POST["email"]
  ];
  $user = $db->execute($query, $params)->fetch();
  if (!$user || !password_verify($_POST["password"], $user["password"])) {
    $errors["email"] = "Kaut kas nav labi";
  }

  if (empty($errors)) {
    $_SESSION["user"] = true;
    $_SESSION["email"] = $_POST["email"];
    echo $_SESSION["email"];
  }
}

$title = "Login";
require "views/auth/login.view.php";