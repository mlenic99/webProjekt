<?php
require_once("./dbconfig.php");
include 'functions.php';

// Check to make sure the id parameter is specified in the URL

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $conn = new PDO(
            "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
            DBConfig::USERNAME,
            DBConfig::PASS
        );
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    // Prepare statement and execute, prevents SQL injection
    if(session_id() == '') {
        session_start();
    }
    if (!$_SESSION['username'] == 'admin' || !isset($_COOKIE['activeLogin'])) {
        header("location: index.php");
    }
    $sql = <<<EOSQL
    SELECT * FROM events WHERE eventID='{$id}' 
    EOSQL;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Check if the product exists (array is not empty)

} else {
    // Simple error to display if the id wasn't specified
    exit('Invalid input!');
}
require 'header.php';
require 'navbar.php';
?>


<div class="event content-wrapper container">
    <?php
    if ($stmt->rowCount() == 0) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        echo ('<h4>Product does not exist!</h4>');
    } else {
        show_product($stmt);
    }
    ?>


    


</div>

<?php
require 'footer.php';
?>