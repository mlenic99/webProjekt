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

$sql = <<<EOSQL
    SELECT * FROM events 
    EOSQL;

$query = $conn->prepare($sql);

$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);


require 'header.php';
?>



<div class="dashboard bd-highlight mb-3">

    <?php
    include "dashboard.sidebar.php"
    ?>

    <div class="container event">
        <h2 class="my-4">Svi proizvodi</h2>
        <div class="w-100 mb-5">
            <input type="button" value="Dodaj proizvod"
            onclick="location.href='proizvodi.add.php'"  
            class="btn btn-light float-right" />
        </div>
        <br>
        <div class="container mt-5 border border-light event-table-mobile">
            <div class='row thead p-1 border border-light '>
                <div class='col-12 col-md-1 text-center font-weight-bold bg-light'>#</div>
                <div class='col-4 col-md-3'>
                </div>
                <div class='col-8 col-md-8 row'>
                    <div class='col-12 col-md p-1'>
                        Naziv:
                    </div>
                    <div class='col-12 col-md p-1'>
                        Cijena:
                    </div>
                    <div class='col-12 col-md p-1'>
                        Preostalo:
                    </div>
                    <div class='col-12 col-md p-1'>
                        Lokacija:
                    </div>
                    <div class='col-12 col-md p-1'>
                        Datum:
                    </div>
                    <div class='col-12 col-md p-1'>

                    </div>
                </div>
            </div>

            <?php
            $i = 1;
            foreach ($query as $row) {
                echo "
                <div class='row p-1 border border-light '>
                    <div class='col-12 col-md-1 text-center font-weight-bold bg-light'>
                    <span class='thead_hide'># </span>" . $i . "
                    </div>
                    <div class='col-4 col-md-3'>
                        <img src='" . $row['eventImgURL'] . "' class='p-img rounded mw-100 mh-100' alt='" . $row['eventName'] . "' title='" . $row['eventName'] . "'>
                    </div>
                    <div class='col-8 row'>
                        <div class='col-12 col-md p-1'>
                            <span class='thead_hide'>Naziv: </span>" . $row['eventName'] . "
                        </div>
                        <div class='col-12 col-md p-1'>
                            <span class='thead_hide'>Cijena: </span>" . $row['eventPrice'] . " kn
                        </div> 
                        <div class='col-12 col-md p-1'>
                            <span class='thead_hide'>Preostalo: </span>" . $row['eventQty'] . " 
                        </div>
                        <div class='col-12 col-md p-1'>
                        <span class='thead_hide'>Lokacija: </span>" . $row['eventLocation'] . " 
                    </div>
                    <div class='col-12 col-md p-1'>
                    <span class='thead_hide'>Datum: </span>" . $row['eventDate'] . " 
                </div>
                        <div class='col-12 col-md p-1'>
                            <form action='proizvodi.update.php' method='post' >
                            <input type='hidden' name='id' id='eventid' value=" . $row['eventID'] . ">
                            <input type='submit' value='Ažuriraj' name='updateProduct' class='submit btn btn-light' id='btnUpdateItem'>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>";
                $i++;
            }
            ?>

        </div>


    </div>
</div>

<?php
unset($conn);
?>
</body>

</html>