<?php
    require_once "connection.php";

    $fileName = $_FILES['filename']['name'];
    $fileTmpName = $_FILES['filename']['tmp_name'];
    $path = "../uploads/".$fileName;

    $query = "INSERT INTO result(reportsheet) VALUES ('$fileName')";
    $run = mysqli_query($conn,$query);

    if($run){
        move_uploaded_file($fileTmpName,$path);
        echo "<script>alert('".$fileName." uploaded successfully');
        window.open('../resultadd.html');</script>";
    }
    else{
        echo "error".mysqli_error($conn);
    }

    require_once "disconnection.php";
?>