<?php
require_once '../databases/connect.php';

if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $passwod = $_POST["password"];

    $sql = "SELECT * FROM userdata WHERE email = '$email' AND passwod = '$passwod'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0) {
        //after you create the user page the location should be put in the location.href below
        echo "<script>location.href='#';</script>";
    }
    else{
        echo "<script>alert('Email or Password is incorrect.'); location.href='login.html';</script>";
    }
}

require_once '../databases/disconnect.php';

?>