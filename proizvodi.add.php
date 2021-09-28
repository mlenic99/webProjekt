<?php
require_once("./dbconfig.php");

try {
    $conn = new PDO(
        "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
        DBConfig::USERNAME,
        DBConfig::PASS
    );
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
if(session_id() == '') {
    session_start();
}
if (!$_SESSION['username'] == 'admin' || !isset($_COOKIE['activeLogin'])) {
    header("location: index.php");
}
require 'header.php';
?>

<div class="dashboard bd-highlight mb-3">
    <?php
    require 'dashboard.sidebar.php'
    ?>
    <div class="flex-grow-1 dashboard">
        <div class=" row d-flex mh-100 my-5 mx-2">
            <div class="card col-12">
                <div class="card-body p-5">
                    <form action="addProduct.php" method="post" id="insertProduct">
                        <div id="formInsertProduct">
                            <h3 class="mb-5" id="formHeader">UPIS NOVOG PROIZVODA</h3>
                                <div class="form-outline mb-4">
                                    <label class="form-label">Naziv::
                                        <input type="text" class="form-control form-control-lg" name="eventName" placeholder="Name" id="eventName" aria-label="Event name" ></label>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label">Cijena kn:
                                        <input type="number" class="form-control form-control-lg" name="eventPrice" placeholder="Price" id="eventPrice" aria-label="Event price" ></label>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label">Preostalo ulaznica:
                                        <input type="number" class="form-control form-control-lg" name="eventQty" placeholder="Quantity" id="eventQty" aria-label="Event quantity" ></label>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label">Lokacija::
                                        <input type="text" class="form-control form-control-lg" name="eventLocation" placeholder="Location" id="eventLocation" aria-label="Event location" ></label>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label">Datum::
                                        <input type="date" class="form-control form-control-lg" name="eventDate" placeholder="Date" id="eventDate" aria-label="Event date" ></label>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label">Opis:
                                        <textarea type="date" class="form-control form-control-lg" name="eventDescription" placeholder="Opis događaja" id="eventDescription" aria-label="Event description"></textarea>
                                </div>
                                <div class="form-outline mb-5">
                                    <label class="form-label">URL slike:
                                        <input type="text" class="form-control form-control-lg" name="eventImgURL" placeholder="URL Image" id="eventImgURL" aria-label="Event image" ></label>
                                </div>
                                <input default type="submit" class="btn btn-primary btn-lg" value="DODAJ" name="updateProduct" id="btnupdateProduct" aria-label="Submit">
                                <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>