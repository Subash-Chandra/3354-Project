<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup() !== false){
        header("location: ../signup.html");
        exit();
    }

}
else{
    header("location: ../signup.html");
}


// THIS IS A COMMENT