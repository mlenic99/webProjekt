<?php
require_once("./dbconfig.php");

function connToDB()
{
    try {
        $conn = new PDO(
            "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
            DBConfig::USERNAME,
            DBConfig::PASS
        );
        return $conn;
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
}

if (isset($_POST['contactform'])) {
    echo "Mail uspješno poslan";
    exit();
}
