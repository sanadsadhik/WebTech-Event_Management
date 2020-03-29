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

session_start();

if(isset($_POST['submitform'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if($email=='admin@admin.com'&&$pass=='admin'){
        header("Location:http://localhost/WTPROJECT/admin.php");
    }
else{
    $query = "SELECT * FROM user
    WHERE email='$email' AND password='$pass' ";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    if($result->num_rows == 0) {
        echo '<script>
        alert("Invalid credentials");
        window.location.replace("log_in.php");
    </script>';
    }
    else{
        $_SESSION['email']=$email;
        header("Location:http://localhost/WTPROJECT/user.php");
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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
</head>

<body style="background-color:rgb(173, 60, 60); margin: 0px;">
    <nav>
        <ul style="background-color:black ; list-style-type: none; overflow: hidden;margin: 0px;">
            <li><a href="final.html">| HOME |</a></li>
            <li><a href="final.html#aboutus">| ABOUT US | </a></li>
            <li><a href="final.html#gallery">| GALLERY |</a></li>
            <li style="float: right;"><a href="createaccount.php">| CREATE YOUR ACCOUNT! |</a></li>
        </ul>
    </nav>
    <form action="" method="post">
        <label style="font-size: 40px; padding-left: 40%; ">Log In</label> <br> <br>
        <input type="email" name="email" id="" placeholder="Enter your email"> <br>
        <input type="password" name="pass" id="" placeholder="Enter your password"> <br>
        <button type="submit" name="submitform">Log In</button>
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