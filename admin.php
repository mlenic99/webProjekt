<?php
session_start();
// if there is an "error" while loggin in
if (isset($_GET["error"])) {

  if ($_GET["error"] == "NoLogin") {
    echo '<script>alert("You gotta login first!");</script>';
  } elseif ($_GET["error"] == "NoSuchUser") {
    echo '<script>alert("There is no such user!");</script>';
  }
}

// if cookie is set go directly do dashboard
if (isset($_SESSION['username']) &&  $_SESSION['username']== 'admin' && isset($_COOKIE['activeLogin']))  {
  header("location: dashboard.php");
}


require 'header.php';
?>

<body>
  <?php
  require 'navbar.php';
  ?>



  <div class="container my-5 ">
    <div class="row d-flex justify-content-center align-items-center h-100 my-5">
      <div class="card col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card-body p-5 text-center">
          <h3 class="mb-5" id="admin-login">Admin Login</h3>
          <form id="form-login" action="login.php" method="post" >
            <div class="form-outline mb-4">
              <label class="form-label"> <i class="fas fa-envelope"></i> E-mail:
                <input type="email" class="form-control form-control-lg" name=email placeholder="Email"></label>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label">
                <i class="fas fa-lock"></i>
                Password:
                <input type="password" class="form-control form-control-lg" name=password placeholder="Password"></label>
            </div>
            <input class="btn btn-primary btn-lg btn-block" type="submit" name=login-button value="Log In"></input>
          </form>
        </div>
      </div>
    </div>
  </div>




  <?php
  require 'footer.php';
  ?>