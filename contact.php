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

require 'header.php';
require 'navbar.php';
?>

    <!--brand partner-->
    <div class="jumbotron mb-5">
        <div id="" class="row mx-auto justify-content-center align-items-center">
            <div clas="col-12 col-lg-6">
                <h2>Imaš ideju? KONTAKTIRAJ NAS</h2>
                <p class="lead content-text">FESTIVAL. KONCERT. PARTY<br> Ispuni formu i kontaktiramo te u najkraćem mogućem roku!!
                </p>

            </div>
            <div class="col-12 col-lg-6">
                <form name="contact" method="post" class="form form-inline float-right content-text form-row justify-content-center">
                    <div class="col-12 col-lg-8 mb-3">
                        <input type="text" onchange="validateContactForm()" name="name" id="inputNameSurname" placeholder="Unesi ime i prezime" class="form-control shadow w-100 h-100 p-4" aria-label="Your email" required>
                    </div>
                    <div class="col-12 col-lg-8 mb-3">
                        <input type="email" onchange="validateContactForm()" name="email" id="userEmail" placeholder="Unesi email adresu" class="form-control shadow w-100 h-100 p-4" aria-label="Your email" required>
                        <span id="userEmail-info" class="info"></span>
                    </div>
                    <div class="col-12 col-lg-8 mb-3">
                        <div class="form-group">
                            <label for="text"></label>
                            <textarea onchange="validateContactForm()" class="form-control shadow w-100 h-100 p-4" name="text" id="inputComment" rows="3" placeholder="Ideja" required></textarea>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 mb-3">
                        <input type="submit" name="send" id="contactsubmit" value="Send" class="btn btn-primary w-100 p-3" aria-label="Submit" onclick="sendmessage()" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
require 'footer.php';
?>