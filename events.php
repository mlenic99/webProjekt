<?php
require_once("./dbconfig.php");
include 'functions.php';

try {
    $conn = new PDO(
        "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
        DBConfig::USERNAME,
        DBConfig::PASS
    );
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

session_start();
require 'header.php';
require 'navbar.php';
?>
<div class="container">
<?php
$stmt = $conn->prepare("SELECT * FROM locations ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$locationArray = array();
foreach($stmt as $row) {
    $id = $row['locationID'];
    $location = $row['locationName'];
    echo "<h2>".$location."</h2> 
<div id='cart-wrap' >
    <div id='cart-products' class='row align-items-top'>";
    $stmtEvent = $conn->prepare("SELECT * FROM events WHERE eventLocation ='".$location."'");
    $stmtEvent->execute();
    $result = $stmtEvent->setFetchMode(PDO::FETCH_ASSOC);
    show_products($stmtEvent);
        echo "</div></div>";

}
?>

</div>

<?php
require 'footer.php';
?>