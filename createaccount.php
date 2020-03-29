<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "event_management";

// Create connection
$conn = mysqli_connect($server,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submitform'])){
$email = $_POST['email'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];

$sql = "INSERT INTO user (name,email,phone,password)
VALUES ('$name','$email','$phone','$pass')";

if ($conn->query($sql) === TRUE) {
    echo '<script>
                alert("Registered Succesfully");
                window.location.replace("final.html");
            </script>'; 
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create an Account</title>
</head>
<style>
    form {
        background-color: bisque;
        border-radius: 30px;
        display: block;
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 4%;
        margin-bottom: 4%;
        padding: 1%;
        padding-top: 2%;
        padding-bottom: 2%;
    }
    
    input {
        display: block;
        align-items: center;
        padding: 1%;
        margin: 2%;
        margin-left: 34%;
        border: none;
        transition: transform .2s;
    }
    
    input:hover {
        transform: scale(1.5);
        border-radius: 20px;
    }
    
    button {
        border: none;
        padding: 4%;
        margin-left: 41.5%;
        border-radius: 20px;
        transition: transform .2s;
    }
    
    button:hover {
        transform: scale(1.5);
        border-radius: 0px;
    }
</style>

<body style="background-color:rgb(173, 60, 60); margin: 0px;">

    <nav>
        <ul style="background-color:black ; list-style-type: none; overflow: hidden;margin: 0px;">
            <li><a href="final.html">| HOME |</a></li>
            <li><a href="final.html#aboutus">| ABOUT US | </a></li>
            <li><a href="final.html#gallery">| GALLERY |</a></li>
            <li><a href="log_in.php">| LOG IN |</a></li>
        </ul>
    </nav>

    <form action="" method="post">
        <label style="font-size: 40px; padding-left: 33%; ">REGISTER</label> <br> <br>
        <input "text" name="name" id="" placeholder="Enter your name"> <br>
        <input type="email" name="email" id="" placeholder="Enter your email"> <br>
        <input type="text" name="phone" id="" placeholder="Enter your phone no."> <br>
        <input type="password" name="pass" id="" placeholder="Enter your password"> <br>
        <input type="password" name="" id="" placeholder="Confirm password"> <br>
        <button type="submit" name="submitform">REGISTER</button>
    </form>
</body>
<style>
    li a {
        display: block;
        color: bisque;
        text-align: center;
        text-decoration: none;
    }
    
    li {
        float: left;
        padding: 20px 30px;
    }
</style>

</html>