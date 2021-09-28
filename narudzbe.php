<?php
session_start();
include 'narudzba.php';
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


$allOrders = array();

$sql = <<<EOSQL
    SELECT * FROM orders
    EOSQL;

$query = $conn->prepare($sql);


$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);

foreach ($query as $row) {
    $orderID = $row['ordersID'];
    $order = new Narudzba($orderID, $row['name'], $row['address'], $row['town'], $row['postCode'], $row['email']);
    $allOrders += [$orderID => $order];
}

if ($allOrders != 0) {
    $sql = <<<EOSQL
    SELECT * FROM orderDetails
    EOSQL;
    $query = $conn->prepare($sql);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($query as $row) {
        $orderID = $row['orderID'];
        $productsID = $row['productID'];
        $sqlproduct = <<<EOSQL
    SELECT * FROM events WHERE eventID='{$productsID}'
    EOSQL;
        $queryprod = $conn->prepare($sqlproduct);
        $queryprod->execute();
        $queryprod->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($queryprod as $rowprod) {
            $product = new Proizvod($row['productID'], $rowprod['eventName'], $row['quantity'], (float)$rowprod['eventPrice']);
            $allOrders[$orderID]->add_products($product);
        }
    }
}
require 'header.php';
?>




<div class="dashboard bd-highlight mb-3">
    <?php
    require 'dashboard.sidebar.php'
    ?>
    <div class="container">

        <h2 class="my-4">Narudžbe</h2>
        <?php
        if (count($allOrders) == 0) {
            echo "<p class='my-4'>Trenutno nema novih narudžbi</p>";
        } else {
            $i = 1;
            foreach ($allOrders as $order) {

                echo "<div class='row p-1 border '>
                    <div class='col-12 col-md-1 text-center font-weight-bold'>
                        <span class='thead_hide'># </span>" . $i . "
                    </div>
                    <div class='col-12 col-md-3'>
                        <p>" . $order->get_name() . "</p>
                        <p>" . $order->get_address() . "</p>
                        <p> " .  $order->get_town() . " " . $order->get_postcode() . "</p>
                        <p>" .   $order->get_email() . "</p>
                    </div>
                    <div class='col-12 col-md-4 row'>";

                $products = $order->get_products();

                foreach ($products as $p) {

                    echo "
                    <div class='col-12  px-1 pb-1'>
                        <span class='font-weight-bold'>" . $p->get_name() . " </span>
                        <div>
                            " . $p->get_quantity()  . "x " . $p->get_price()  . " kn
                        </div>
                    </div> ";
                }
                echo "</div>
                  <div class='col-12 col-md-3 font-weight-bold'>
                        Total: 
                        <div>
                            " . $order->get_order_price() . " kn
                        </div>
                  </div>
                  </div>";
                $i++;
            }
        }
        ?>


    </div>
</div>

</body>

</html>