<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    <script src="products.js"></script>

    <title>čvarci.net</title>
</head>

<body>
    <!--NAVBAR-->

    <div class="container">
        <nav class="navbar navbar-light bg-white fixed-top">
            <div class="container-fluid align-items-center justify-content-center">
                <div class="col-12 col-md .mx-auto align-self-center">
                    <a class="navbar-brand" href="#">
                        <span>T</span>unguzija<span>E</span>vent</a>
                </div>
                <div class="login col-md-2">
                    <button class="btn" aria-haspopup="true" aria-label="Login">
                        <img src="Images/person.png" alt="Person login">
                        <a class="color-gray font-weight-bold" href="#" tabindex="0">LOGIN</a>
                    </button>

                </div>
                <span class="cart col-md-2">
                    <button class="btn" aria-haspopup="true" aria-label="Cart" id="cart">
                        <img src="Images/cart.png" alt="Cart">
                        <span id="item-count" class="color-gray font-weight-bold" href="#" tabindex="0" >0</span>
                    </button>
                </span>
            </div>
        </nav>
    </div>

    <div id="cart-items" class="shadow"></div>


    <!--Najcvarci-->
    <div class="container mt-5">
        <div class="row header align-items-center">
            <div class="col-12 col-md-6">
                <h1 class="prime-text mb-5">TUNGUZIJA EVENT</h1>
                <div class="row justify-content-start">

                    <button type="button" class="btn btn-outline-dark mr-2 mb-2 ml-2 col-5 col-md">
                        <p class="content-title mt-2 mb-0">THE BEST</p>
                        <p class="content-title mb-0">IN YOUR TOWN</p>
                    </button>

                    <button type="button" class="btn btn-outline-primary mr-2 mb-2 col-5 col-md">
                        <p class="content-title mt-2 mb-0">COMMING</p>
                        <p class="content-title mb-0">SOON</p>
                    </button>
                </div>
            </div>
                <div class="col-12 col-md-6 mt-5 mb-5 relative">
                    <img class="rounded-circle img-fluid" src="Images/headerImage.jpg" alt="Čvarci" loading="lazy">
                </div>
</div>
        </div>
    </div>


    <!--box sjena-->
    <div class="container-fuid align-items-center mb-5 mt-3">
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
      <!-- Dodavanje proizvoda preko JS-->
      <div id="cart-products" class="row">
      
      <!-- Kod za to je besramno preuzet s interneta -->
      </div>
    </div>

    <!--brand partner-->
    <div class="jumbotron mt-5 mb-5">
        <div class="col-12 col-lg-10 row mx-auto justify-content-center align-items-center">
            <div clas="col-12 col-lg-6">
                <h2>Imaš ideju? KONTAKTIRAJ NAS</h2>
                <p class="lead content-text">FESTIVAL. KONCERT. PARTY<br> Ispuni formu i kontaktiramo te u najkraćem mogućem roku!!
                </p>

            </div>
            <div class="col-12 col-lg-6">
                <form class="row formEmail form-inline float-right content-text col-12 form-row justify-content-end">

                    <div class="col-12 col-lg-8 mb-3">
                        <input type="text" name="UnesiImeIPrezime" id="inputNameSurname" placeholder="Unesi ime i prezime" class="form-control shadow w-100 h-100 p-4" aria-label="Your email">
                    </div>
                    <div class="col-12 col-lg-8 mb-3">
                        <div class="form-group">
                          <label for="comment"></label>
                          <textarea class="form-control shadow w-100 h-100 p-4" name="unesiKomentar" id="inputComment" rows="3" placeholder="Ideja"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mb-3">
                        <input type="email" name="UnesiEmail" id="inputEmail" placeholder="Unesi email adresu" class="form-control shadow w-100 h-100 p-4" aria-label="Your email">
                    </div>
                    <div class="col-12 col-lg-8 mb-3">
                        <input type="submit" name="Pošalji" id="submit" value="Pošalji" class="btn btn-primary w-100 p-3" aria-label="Submit">
                    </div>
                </form>
            </div>
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



    <!--FOOTER-->
    <footer class="mb-5">
        <div class="container-flud offset-md-1">
            <div class="row justify-content-center">
                <div clas="col-12 col-md-3">
                    <a class="navbar-brand" href=#>
                        <span>T</span>unguzija<span>E</span>vent
                    </a>
                    <hr>
                </div>
                <div class="row col-12 col-md justify-content-end order-first order-md-last align-items-center">
                    <div class="col-12 col-md-3 banner-prime-text text-center mb-1">
                        <span tabindex="0" aria-label="O nama"><a class="color-gray" href="#" title="O nama">O
                                nama</a></span>
                    </div>
                    <div class="col-12 col-md-3 banner-prime-text  text-center mb-1">

                        <span tabindex="0" aria-label="Cijenik link"><a class="color-gray" href="#" title="Cijenik">Cijenik</a></span>
                    </div>
                    <div class="col-12 col-md-3 banner-prime-text  text-center mb-1">
                        <span tabindex="0" aria-label="Kontakt link"><a class="color-gray" href="#" title="Kontakt">Kontakt</a></span>

                    </div>
                </div>

            </div>

            <div class="row justify-content-center align-items-center">
                <div class="row col-12 col-md-6 justify-content-md-start justify-content-center">
                    <a href="#"><img class="mr-3 " src="Images/Union.png" alt="Instagram logo" loading="lazy"> </a>
                    <a href="#">
                        <img class="ml-3 mr-3" src="Images/twitter.png" alt="Twitter logo" loading="lazy">
                    </a>
                    <a href="#">
                        <img class="ml-3" src="Images/Group.png" alt="Facebook logo" loading="lazy">

                    </a>
                </div>
                
            </div>

        </div>
    </footer>

    <script src="app.js"></script>

</body>

</html>