<?php
//connect to server
require_once 'connection.php';

//register students
if (isset($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email === "gtaadmin@gtaadmin" && $password == 00000){
        header("Location:../resultadd.html");
    }else{
        //select data
        $sql = "SELECT * FROM userdata WHERE email = '$email' AND passwod = '$password'";
        $result = mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION['fullname'] = $row["fullname"];
                $_SESSION['email'] = $row["email"];
    
                header("Location:../resultview.php");
            }
        }
        else {
            echo "<script>alert('The email or password is incorrect');window.open('../login/login.html','_self');</script>";
        }
    }
}
else {
    echo "<script>alert('The email or password is incorrect');window.open('../login/login.html','_self');</script>";
}

//disconnect from server
require_once 'disconnection.php';
?>