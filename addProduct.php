<?php

require_once("./dbconfig.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function trim_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = trim_data($_POST['eventName']);
    $price = trim_data($_POST['eventPrice']);
    $imgURL = trim_data($_POST['eventImgURL']);
    $quantity = trim_data($_POST['eventQty']);
    $location = trim_data($_POST['eventLocation']);
    $date = $_POST['eventDate'];
    $desc = trim_data($_POST['eventDescription']);


    // connect to the database
    try {
        $conn = new PDO(
            "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
            DBConfig::USERNAME,
            DBConfig::PASS
        );
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    $query = "INSERT INTO events (eventName, eventPrice, eventImgURL, eventQty, eventLocation, eventDate, eventDescription)
    VALUES ('" . $name . "', '" . $price . "', '" . $imgURL . "', '" . $quantity . "', '" . $location . "', '" . $date . "', '" . $desc . "')";
    // use exec() because no results are returned
    $conn->exec($query);
    header("location: dashboard.php");
} else {
    // Prevent submit without first filling out the form
    //TO-DO:
    header("location: index.php");

}
