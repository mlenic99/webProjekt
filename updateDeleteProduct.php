<?php
require_once("./dbconfig.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION['eventID'];

    try {
        $conn = new PDO(
            "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
            DBConfig::USERNAME,
            DBConfig::PASS
        );
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    function trim_data($data) {
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


    if (isset($_POST['updateProduct'])) {
        $sql = "UPDATE events SET eventName='" . $name . "', eventPrice = '" . $price . "',eventLocation='" . $location . "',eventDate='" . $date . "',eventImgURL='" . $imgURL . "', eventQty = '" . $quantity . "', eventDescription = '".$desc."' WHERE eventID='" . $id . "'";
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
        //echo var_dump($stmt);
        header("location: dashboard.php");

    } elseif (isset($_POST['deleteProduct'])) {
       $sql = "DELETE FROM events WHERE eventID='" . $id . "'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("location: dashboard.php");
    }
}
