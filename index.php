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

//DESC -> kako bi prikazao najnovije proizvode (imaju veći ID broj)
$stmt = $conn->prepare("SELECT * FROM events ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

session_start();
/* unset($_SESSION['cart']);
unset($_SESSION['total_products']);
unset($_SESSION['total_sum']);
session_destroy();
echo "session ended"; */

require 'header.php';
require 'navbar.php';
?>

    <div id="hero_img">
        <div class="container p-5">
            <div class="row header align-items-center py-5">
                <div class="col-12 col-md-6 px-5" id="title">
                    <h1 class="prime-text py-5">TUNGUZIJA EVENT</h1>
                    <div class="row justify-content-start">

                        <button type="button" class="btn btn-outline-light mx-2 mb-2 col-5 col-md">
                            <p class="content-title mt-2 mb-0">THE BEST</p>
                            <p class="content-title mb-2">IN YOUR TOWN</p>
                        </button>

                        <button type="button" class="btn btn-outline-secondary mr-2 mb-2 col-5 col-md">
                            <p class="content-title mt-2 mb-0">COMMING</p>
                            <p class="content-title mb-2">SOON</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--box sjena-->
    <div class="container-fuid align-items-center my-5 ">
        <div class="row col-12 col-md-5 col-xl-7 content-text shadow p-2 mb-4 bg-gray offset-md-2">
            <div class="row col-12 col-xl mb-3">
                <img class="fit-content mr-4 mt-2" src="Images/icon_rocknroll.png" height="60px" width="60px" alt="Time to eat" loading="lazy">
                <p class="m1-3 mt-2">NAJBOLJI<br>IZVOĐAČI</p>
            </div>
            <div class="row col-12 col-xl mb-3">
                <img class="fit-content mr-3" src="Images/icon_music.png" alt="Paris" height="0px" width="60px" loading="lazy">
                <p class="m1-3 mt-2">NAJBOLJA<br>GLAZBA</p>
            </div>
            <div class="row col-12 col-xl">
                <img class="fit-content mr-3" src="Images/beer_icon.jpg" alt="Paris" height="0px" width="60px" loading="lazy">

                <p class="m1-3 mt-2">NAJBOLJA<br>CUGA</p>
            </div>
            <div class="row col-12 col-xl mb-3">
                <img class="fit-content mr-4 mt-2" src="Images/icon_tickets.png" height="60px" width="60px" alt="Time to eat" loading="lazy">
                <p class="m1-3 mt-2">NAJBOLJE<br>KARTE</p>
            </div>
            <div class="row col-12 col-xl mb-3">
                <img class="fit-content mr-4 mt-2" src="Images/icon_rocknroll.png" height="60px" width="60px" alt="Time to eat" loading="lazy">
                <p class="m1-3 mt-2">NAJBOLJE<br>LOKACIJE</p>
            </div>

        </div>

    </div>



    <!--Novo u ponudi!-->
    <div class="row justify-content-center align-items-center mb-4">
        <h2>COMMING SOON! DON'T MISS THE BEST PARTY! BUY TICKETS NOW</h2>
    </div>


    <div id="cart-wrap" class="container col-12 col-md-8 mb-5">
        <div id="cart-products" class="row align-items-top">
            <?php
            show_products($stmt);

            ?>
        </div>
    </div>



    <!--Counter-->


    <!--IG-->

    <section class="container-fluid col-12 col-md-10 mt-5 mb-3" aria-label="Instagram Posts">
        <div class="row justify-content-start align-items-center">
            <div class="col-12 col-lg-3 col-xl-2">
                <h2>#tunguzija</h2>
            </div>
            <div class="col-12 col-lg-3">
                <h3>društvene mreže</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-3 mb-4">
                <img class="mw-100" src="Images/Rectangle 10.png" alt="Instagram tag" loading="lazy">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img class="mw-100" src="Images/Rectangle 11.png" alt="Instagram tag" loading="lazy">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img class="mw-100" src="Images/Rectangle 12.png" alt="Instagram tag" loading="lazy">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img class="mw-100" src="Images/Rectangle 13.png" alt="Instagram tag" loading="lazy">
            </div>
        </div>
    </section>



    <?php
    require 'footer.php';
    ?>