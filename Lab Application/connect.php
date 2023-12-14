<?php
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    //Database connection
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed.". $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into students(fullname,email,gender) values(?,?,?)");
        $stmt->bind_param("sss",$full_name,$email,$gender);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration Successfully...";
        $stmt->close();
        $conn->close();
    }
?>