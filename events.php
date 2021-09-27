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


<h2>Osijek</h2>
<div id="cart-wrap" class="container col-12 col-md-8 mb-5">
    <div id="cart-products" class="row align-items-top">
        <?php
        //DESC -> kako bi prikazao najnovije proizvode (imaju veći ID broj)
        $stmt = $conn->prepare("SELECT * FROM events WHERE eventLocation ='Osijek'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        show_products($stmt);
        ?>
    </div>
</div>

<h2>Beograd</h2>
<div id="cart-wrap" class="container col-12 col-md-8 mb-5">
    <div id="cart-products" class="row align-items-top">
        <?php
        //DESC -> kako bi prikazao najnovije proizvode (imaju veći ID broj)
        $stmt = $conn->prepare("SELECT * FROM events WHERE eventLocation ='Beograd'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        show_products($stmt);
        ?>
    </div>
</div>


<?php
require 'footer.php';
?>