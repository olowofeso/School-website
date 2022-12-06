<?php
require_once 'databases/connect.php';

if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $firstname = $_POST["first_name"];
    $othername = $_POST["other_name"];
    $lastname = $_POST["last_name"];
    $dateofbirth = $_POST["date_of_birth"];
    $nationality = $_POST["nationality"];
    $cityofbirth = $_POST["city_of_birth"];
    $gender = $_POST["gender"];
    $comments = $_POST["comments"];

    if ($password1===$password2){
        $sql = "INSERT INTO userdata(email,passwod,firstname,othername,lastname,dateofbirth,nationality,cityofbirth,gender,comment)
        VALUES ('$email','$password','$firstname','$othername','$lastname','$dateofbirth','$nationality','$cityofbirth','$gender','$comments')";
        if (mysqli_query($conn, $sql)) {
            //echo "<script>location.href='logged/homepage.php';</script>";
            //header('location:logged/homepage.php');
            echo "<script>alert('Your account has been created, you can log in now.');location.href='login/login.html';</script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else{
        echo "<script>alert('Password and Confirm password do not match'); location.href='admin.html';</script>";
    }
}

require_once 'databases/disconnect.php';

?>