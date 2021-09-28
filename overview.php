<?php
if(session_id() == '') {
    session_start();
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (!isset($_SESSION['total_products'])) {
    $_SESSION['total_products'] = 0;
}
if (!isset($_SESSION['total_sum']) && !isset($_SESSION['sum'])) {
    $_SESSION['total_sum'] = array();
    $_SESSION['sum'] = 0;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function trim_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = trim_data($_POST['name']);
    $address = trim_data($_POST['address']);
    $postcode = trim_data($_POST['postcode']);
    $town = trim_data($_POST['town']);
    $email = trim_data($_POST['email']);




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


    $conn = connToDB();
    $query = "INSERT INTO orders (name, address, town, postCode, email)
    VALUES ('" . $name . "', '" . $address . "', '" . $town . "', '" . $postcode . "', '" . $email . "')";
    $conn->exec($query);
    $sql = <<<EOSQL
              SELECT * FROM orders WHERE email='{$email}' ORDER BY `orders`.`ordersID` DESC
          EOSQL;
    $query = $conn->prepare($sql);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $row = $query->fetch();
    $orderID = $row['ordersID'];

    require 'header.php';
require 'navbar.php';

} else {
    header("location: index.php");
    exit();
}
?>
<div class="container " id="overview">

    <h2>Narudžba uspješno predana</h2>

    <div id="order_succesful" class="items-cart col-10 col-md-8 border mb-5">
        <?php
        foreach ($_SESSION['cart'] as $id => $qty) {
            $sql = <<<EOSQL
              SELECT * FROM events WHERE eventID='{$id}' 
          EOSQL;
            $query = $conn->prepare($sql);

            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $row = $query->fetch();

            $name = $row['eventName'];
            $sqldate = $row['eventDate'];
            $location = $row['eventLocation'];
            $price = $row['eventPrice'];
            $desc = $row['eventDescription'];
            $qty = $row['eventQty'];
            $img = $row['eventImgURL'] ;

            $date = strtotime($sqldate);
            $myFormatForView = date("d/m/Y", $date);
            $price_total = $qty * $price;
            $_SESSION['total_sum'] += [$id => $price_total];
            $newQty = (int)$row['eventQty'] - (int)$qty;
            $query = <<<EOSQL
            UPDATE events
            SET eventQty = '{$newQty}'
            WHERE eventID='{$id}' ;
        EOSQL;
            $conn->exec($query);

            $query = "INSERT INTO orderDetails (orderID , productID , quantity)
            VALUES ('" . $orderID . "', '" . $id . "', '" . $qty . "')";
            $conn->exec($query);
            echo "
                <div class='row p-1 my-2'>
                    <div class='col-4 col-md-2justify-content-center align-items-center'>
                        <img src='" . $img . "' class='c-img rounded mw-100 mh-100' alt='" . $name . "' title='" . $name . "'>
                    </div>
                    <div class='col-6 row'>
                        <div class='col-12  px-1 pb-1'>
                            <span class='cart-thead'>Naziv proizvoda: </span>" . $name . "
                        </div>
                        <div class='col-12  p-1'>
                            <span class='cart-thead'>Količina: </span>" . $qty . " 
                        </div>
                        <div class='col-12  p-1'>
                            <span class='cart-thead'>Cijena: </span>" . $price_total . " kn
                        </div> 
                    </div>
                </div>";
        }
        unset($_SESSION['cart']);
        unset($_SESSION['total_products']);
        unset($_SESSION['total_sum']);
        session_destroy();
        ?>
    </div>

</div>



<?php
require 'footer.php';

?>