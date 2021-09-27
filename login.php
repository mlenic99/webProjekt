<?php

require_once("./dbconfig.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $password = $email = '';

    function trim_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
        $email = trim_data (  $_POST ['email']);

        $password = trim_data ( $_POST ['password']);

        $pwdmd5 = md5($password);

        // connect to the database
        try {
            $conn = new PDO(
                "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
                DBConfig::USERNAME,
                DBConfig::PASS
            );
        } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }

        // check if it is admin 
        $sql = <<<EOSQL
        SELECT * FROM users WHERE useremail='{$email}' AND userpwd='{$pwdmd5}'
        EOSQL;


        $query = $conn->prepare($sql);

        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0) {
            $row = $query->fetch();
            session_start();
            $_SESSION['username'] = $row['username'];
            setcookie("activeLogin", $row["username"], time() + (60 * 120));
            header("location: dashboard.php");
        } else {
            //No such user in database
            header("location: admin.php?error=NoSuchUser");
        }

        unset($conn);
    
} else {
    // Prevent going to this page without login

    header("location: admin.php?error=NoLogin");
}
