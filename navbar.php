<div id="cart-items" class="shadow" style="display:none">
    <div class="float-right p-1 m-1 border" id="close_minicart" style="cursor: pointer;">x</div>
    <br>
    <?php
    if (session_id() == '') {
        session_start();
    }
    if (isset($_SESSION['username']) && isset($_COOKIE['activeLogin'])) {
        echo "<p class='content-text'>Pozdrav " . $_SESSION['username'] . "</p>";
        echo "<p class='content-text'>Tvoja košarica</p>";

    } else {
        echo "<p class='content-text'>Moja košarica</p>";
    }
    ?>
    <hr>
    <div id="items"></div>
</div>

<main>

    <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <a class="navbar-brand" href="index.php"> <span class="logo-txt">T</span>unguzija<span class="logo-txt">E</span>vent
        </a></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact us</a>
                </li>
            </ul>

            <button class="btn login" aria-haspopup="true" aria-label="Login"
                    onClick="document.location.href='admin.php'">
                <img src="Images/person.png" alt="Person login">
                <span class="color-gray font-weight-bold" href="admin.php" tabindex="0">PRIJAVI SE</span>
            </button>


            <button class="btn cart" aria-haspopup="true" aria-label="Cart" onclick="toggle_cart()">
                <img src="Images/cart.png" alt="Cart">
                <input class="color-gray font-weight-bold" type="button" id="total_items" value="0">
            </button>
        </div>
    </nav>
    

