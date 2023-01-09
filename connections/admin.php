<?php
//connect to server
require_once 'connection.php';

//register students
if (isset($_POST["submit"])){
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $first_name = $_POST['first_name'];
    $other_names = $_POST['other_names'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $nationality = $_POST['nationality'];
    $city_of_birth = $_POST['city_of_birth'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $comments = $_POST['comments'];

    if($password1===$password2){
        //insert data
        $sql = "INSERT INTO userdata(email,passwod,fullname,dateofbirth,nationality,cityofbirth,class,gender,comment)
        VALUES ('$email','$password1','$last_name $other_names $first_name','$date_of_birth','$nationality','$city_of_birth','$class','$gender','$comments')";
        if(mysqli_query($conn, $sql)) {
            echo "
            <script>
                alert('Your account has been created. You can log in now.');
                location.href='../admin.html';
            </script>";
        }
        elseif(mysqli_errno($conn)==1062){
            echo "
            <script>
                alert('The email has already being used.');
                location.href='../admin.html';
            </script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else{
        echo "
        <script>
            alert('The account passwords do not match');
            location.href='../admin.html';
        </script>";
    }
}

//disconnect from server
require_once 'disconnection.php';
?>