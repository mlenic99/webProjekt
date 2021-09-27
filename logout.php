<?php 

require_once("./dbconfig.php");

setcookie("activeLogin",null , time() -1, '/');

header("location: admin.php");

