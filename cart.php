<?php
require_once("./dbconfig.php");

session_start();
//DESC -> kako bi prikazao najnovije proizvode (imaju veći ID broj)


require 'header.php';
require 'navbar.php';
?>
<div id="overview"></div>
<div class="constainer m-5">
    <div class="checokut row mb-5">
        <h3 class="col-12">Proizvodi iz minicarta</h3>
        <div id="items-cart" class="items-cart col-10 col-md-8 border mb-5 py-4">

        </div>
<?php
if ($_SESSION['total_products'] == 0){
    echo "</div></div>";
    require 'footer.php';
    exit();
}
?>

        <div id="customer" class="col-12 col-md-6 border  ">
            <div class="card-body m-2 p-3">
                <form name="cart" method="post" id="orderinfo" action="overview.php">
                    <div id="">
                        <h3 class="mb-5" id="formHeader">Podaci za dostavu</h3>
                            <div class="form-outline mb-1">
                                <label class="form-label">Ime i prezime
                                    <input type="text" onchange="ValidationForm()" class="form-control form-control-lg" name="name" placeholder="Ime i prezime" aria-label="Ime i prezime" required></label>
                            </div>
                            <div class="form-outline mb-1">
                                <label class="form-label">Adresa
                                    <input type="text" onchange="ValidationForm()" class="form-control form-control-lg" name="address" placeholder="Ulica i broj" aria-label="Adresa" required></label>
                            </div>
                            <div class="form-outline mb-1">
                                <label class="form-label">Poštanski broj
                                    <input type="number" onchange="ValidationForm()" class="form-control form-control-lg" name="postcode" placeholder="10000" aria-label="Postanski broj" required></label>
                            </div>
                            <div class="form-outline mb-1">
                                <label class="form-label">Grad
                                    <input type="text" onchange="ValidationForm()" class="form-control form-control-lg" name="town" placeholder="Grad" aria-label="Grad" required></label>
                            </div>
                            <div class="form-outline mb-1">
                                <label class="form-label">Email
                                    <input type="email" id="userEmail" onchange="ValidationForm()" class="form-control form-control-lg" name="email" placeholder="Email" aria-label="Mail" required></label>
                            </div>
                            <input type="submit" id="btn-finish" class="btn btn-primary btn-lg btn-block" value="ZAVRŠI NARUDŽBU" name="finsihOrder" aria-label="Submit" disabled>

                    </div>
                    <div>
                </form>
            </div>
        </div>

    </div>
    <div id="order-detail" class="col-12 col-md-3 border mx-2 p-3">
        <div>
            <h3 class="mb-1" id="formHeader">Pregled</h3>
            <p id="proizvodi"> </p>
            <p class="font-weight-bold">UKUPNO: <span id="sum"></span> kn</p>
            <p>Plaćanje pouzećem </p>

        </div>
        <form action="" method="post">
        </form>
    </div>
</div>

<?php
require 'footer.php';
?>