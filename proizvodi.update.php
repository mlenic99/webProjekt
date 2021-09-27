<?php
require_once("./dbconfig.php");

session_start();

try {
    $conn = new PDO(
        "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
        DBConfig::USERNAME,
        DBConfig::PASS
    );
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
}

$sql = <<<EOSQL
    SELECT * FROM events WHERE eventID='{$id}' 
    EOSQL;

$query = $conn->prepare($sql);

$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$row = $query->fetch();

$_SESSION['eventID'] = $id;;


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
                    <form action="updateDeleteProduct.php" method="post" id="updateProduct" name="myForm">
                        <div id="formUpdateProduct">
                            <h3 class="mb-5" id="formHeader">IZMJENA EVENTA</h3>
                            <div class="form-outline mb-4">
                                <label class="form-label">Naziv::
                                    <input type="text" class="form-control form-control-lg" name="eventName" placeholder="Name" id="eventName" aria-label="Event name" value="<?php echo $row['eventName']; ?>"></label>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Cijena kn:
                                    <input type="number" class="form-control form-control-lg" name="eventPrice" placeholder="Price [kn/kg]" id="eventPrice" aria-label="Event price" value="<?php echo (float)$row['eventPrice']; ?>"></label>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Preostalo ulaznica:
                                    <input type="number" class="form-control form-control-lg" name="eventQty" placeholder="Quantity" id="eventQty" aria-label="Event quantity" value="<?php echo $row['eventQty']; ?>"></label>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Lokacija::
                                    <input type="text" class="form-control form-control-lg" name="eventLocation" placeholder="Location" id="eventLocation" aria-label="Event location" value="<?php echo $row['eventLocation']; ?>"></label>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Datum::
                                    <input type="date" class="form-control form-control-lg" name="eventDate" placeholder="Date" id="eventDate" aria-label="Event date" value="<?php echo $row['eventDate']; ?>"></label>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Opis:
                                    <textarea type="date" class="form-control form-control-lg" name="eventDescription" placeholder="Opis događaja" id="eventDescription" aria-label="Event description" ><?php echo $row['eventDescription']; ?></textarea>
                            </div>
                            <div class="form-outline mb-5">
                                <label class="form-label">URL slike:
                                    <input type="text" class="form-control form-control-lg" name="eventImgURL" placeholder="URL Image" id="eventImgURL" aria-label="Event image" value="<?php echo $row['eventImgURL']; ?>"></label>
                            </div>
                            <input default type="submit" class="btn btn-primary btn-lg" value="AŽURIRAJ" name="updateProduct" id="btnupdateProduct" aria-label="Submit">
                            <input type="submit" value="Obriši" name="deleteProduct" class="btn btn-secondary btn-lg" id="btnDeleteProduct" aria-label="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    </html>