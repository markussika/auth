<?php
require "Database.php";
$config = require("config.php");

$db = new Database($config);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $query = "DELETE FROM users WHERE id = :id";
  $params = [ ":id" => $_POST["id"]];
 
  $db->execute($query, $params);
}

header("Location: /");
die();