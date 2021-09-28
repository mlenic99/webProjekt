<?php
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

session_start();

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

if (isset($_POST['total_cart_items'])) {
    echo $_SESSION['total_products'];
    exit();
}


//https://www.plus2net.com/php_tutorial/array-session.php
if (isset($_POST['item_id'])) {
    $id = $_POST['item_id'];
    $qty = (int)$_POST['item_qty'];

    //$b = [$id => $qty];
    //array_push($_SESSION['cart'], $b); // Items added to cart
    $_SESSION['cart'] += [$id => $qty];

    $tot = $_SESSION['total_products'] + $qty;
    $_SESSION['total_products'] = $tot;
    echo $_SESSION['total_products'];
    exit();
}

if (isset($_POST['showcart'])) {

    if ($_POST['showcart'] == "cart-large") {
        showproducts_cart();
    } elseif ($_POST['showcart'] == "finalise") {
        listproducts();
    } else {
        showproducts();
        $location = '"cart.php"';
        echo "          <input type='button' value='KUPI SADA' class='c-checkout cart btn btn-primary' onclick='location.href=" . $location . "' >";
    }
    exit();
}

if (isset($_POST['sum'])) {
    calc_sum();
    echo $_SESSION['sum'];
    exit();
}


if (isset($_POST['endSession'])) {
    end_session();
    exit();
}
function end_session () {
    unset($_SESSION['cart']);
    unset($_SESSION['total_products']);
    unset($_SESSION['total_sum']);
    session_destroy();
    echo "session ended";
}

if (isset($_POST['removeProduct'])) {
    $id = $_POST['removeProduct'];
    $tot = $_SESSION['total_products'] - (int)$_SESSION['cart'][$id];
    $_SESSION['total_products'] = $tot;

    unset($_SESSION['cart'][$id]); // $id is the key  of the element
    unset($_SESSION['total_sum'][$id]); // $id is the key  of the element

    calc_sum();
    echo $_SESSION['total_products'];
    exit();
}

function showproducts()
{
    if ($_SESSION['total_products'] == 0) {
        echo "Košarica je prazna";
    } else {

        foreach ($_SESSION['cart'] as $id => $qty) {
            $conn = connToDB();

            $sql = <<<EOSQL
    SELECT * FROM events WHERE eventID='{$id}' 
    EOSQL;
            $query = $conn->prepare($sql);

            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $row = $query->fetch();

            $name = $row['eventName'];
            $price = (float)$row['eventPrice'];
            $imgURL = $row['eventImgURL'];
            $price_total = $qty * $price;
            echo "
            
<div class='c-item container row align-items-start'><img src='" . $imgURL . "' class='c-img col-5' alt='" . $name . "'><div class=' c-name col'> 
<p class='cart-title mb-1 font-weight-bold'>" . $name . "</p>
<p class='cart-text'>Cijena: <span class='font-weight-bold'> " . $price_total . " </span> </p>
<p class='cart-text'>Količina:  <span class='font-weight-bold'> " . $qty . " </span> </p> </div>
<input type='button' value='x' id='remove_" . $id . "' class='c-del btn col-1' onclick='remove_from_cart(" . $id . ")'></div>
            ";
        }
    }
    calc_sum();
}

function showproducts_cart(){
    $totalsum = 0;
    if ($_SESSION['total_products'] == 0) {
        echo "Košarica je prazna";
    } else {
        $conn = connToDB();

        foreach ($_SESSION['cart'] as $id => $qty) {
            $sql = <<<EOSQL
              SELECT * FROM events WHERE eventID='{$id}' 
          EOSQL;
            $query = $conn->prepare($sql);

            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $row = $query->fetch();

            $name = $row['eventName'];
            $price = (float)$row['eventPrice'];
            $imgURL = $row['eventImgURL'];
            $price_total = $qty * $price;
            $_SESSION['total_sum'] += [$id => $price_total];
            echo "
                <div class='row p-1 my-2'>
                    <div class='col-4 col-md-2justify-content-center align-items-center'>
                        <img src='" . $imgURL . "' class='c-img rounded mw-100 mh-100' alt='" . $name . "' title='" . $name . "'>
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
                    <div class='col-1 p-1'>
                        <input type='button' value='x' id='remove_" . $id . "' class='c-del btn' onclick='remove_from_cart(" . $id . ")'>
                    </div>
                </div>";
        }
    }
    calc_sum();
}

function calc_sum()
{
    $sum = 0;
    foreach ($_SESSION['total_sum'] as $id => $tot) {
        $sum = $sum + $tot;
    }
    $_SESSION['sum'] = $sum;
}

function listproducts()
{
    $conn = connToDB();
    foreach ($_SESSION['cart'] as $id => $qty) {
        $sql = <<<EOSQL
              SELECT * FROM events WHERE eventID='{$id}' 
          EOSQL;
        $query = $conn->prepare($sql);

        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $row = $query->fetch();

        $name = $row['eventName'];
        $price = (float)$row['eventPrice'];
        $price_total = $qty * $price;
        echo $name." ".$qty." x ".$price."<br>";
    }
}


