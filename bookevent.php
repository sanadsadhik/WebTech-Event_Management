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
    $u_id=$_SESSION['uid'];
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $type= $_POST['event_type'];
    $color = $_POST['color'];
    $extras="";
    $suggestions = $_POST['suggestions'];
    $decoration = $_POST['level'];
    foreach($_POST['extras'] as $selected){
        $extras = $extras.", ".$selected; ;
        }

        $query = "SELECT * FROM event
          WHERE date='$date' AND time='$time' ";
          $result = mysqli_query($conn,$query) or die(mysql_error());
          if($result->num_rows == 0) {
            $query1 = "INSERT INTO event (user_id,venue,date,time,type,decoration,colours,extras,suggestions)
VALUES ('$u_id','$venue','$date','$time','$type','$decoration','$color','$extras','$suggestions')";
if ($conn->query($query1) === TRUE) {
    echo '<script>
        alert("Booking succesfull!!");
        window.location.replace("bookevent.php");
    </script>'; 
} 
       } else {
        echo '<script>
        alert("Sorry, there is already an event at the provided date and time. Kindly change the date and time");
        window.location.replace("bookevent.php");
    </script>'; 
       }

    
}

?>    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book an event</title>
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
        display: inline;
        align-items: center;
        padding: 1%;
        margin: 2%;
        margin-left: 0%;
        border: none;
        transition: transform .2s;
    }
    
    input:hover {
        transform: scale(1.25);
        border-radius: 20px;
    }
    
    button {
        border: none;
        padding: 3%;
        margin_top: 3%
        margin-left: 5.5%;
        border-radius: 20px;
        transition: transform .2s;
    }
    
    button:hover {
        transform: scale(1.5);
        border-radius: 0px;
    }
    
    label {
        padding: 1%;
        padding-top: 3%;
        float: left;
        font-weight: 900;
    }
</style>

<body style="background-color: sandybrown ;margin:0px">
    <nav>
        <ul style="background-color:black ; list-style-type: none; overflow: hidden;margin: 0px;">
            <li><a href="user.php">| HOME |</a></li>
            <li><a href="user.php#aboutus">| ABOUT US | </a></li>
            <li><a href="user.php#gallery">| GALLERY |</a></li>x
        </ul>
    </nav>

    <form action="" method="post">
        <p style="text-align: center; font-size: 40px;">Fill in the details</p>

        <div style="text-align: center;">

            <label for="venue">Venue:</label><input type="text" placeholder="" name="venue"> <br>
            <label for="">Date and Time:</label> <input type="date" name="date"> <input type="time" name="time"> <br>
            <label for="">Event Type:</label>
            <div align-items="center">
                <input type="radio" name="event_type" value="Birthday">Birthday &nbsp;
                <input type="radio" name="event_type" value="Anniversary">Anniversary &nbsp;
                <input type="radio" name="event_type" value="Baby shower">Baby shower &nbsp;<br>
                <input type="radio" name="event_type" value="Wedding">Wedding &nbsp;
                <input type="radio" name="event_type" value="Entertainment">Entertainment&nbsp;
                <input type="radio" name="event_type" value="Engagement">Engagement&nbsp;<br>
                <input type="radio" name="event_type" value="Holi Party">Holi Party&nbsp;
                <input type="radio" name="event_type" value="Music Night">Music Night&nbsp;
                <input type="radio" name="event_type" value="Mehendi">Mehendi&nbsp;
                <input type="radio" name="event_type" value="Haldi">Haldi <br>
                <input type="radio" name="event_type" value="Other">Other
            </div>

            <br>
            <label for="">Decoration: </label><input type="range" value="0" min="0" max="5" list="numbers" name="level"/>
<datalist id="numbers">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</datalist>
            <br>
            <label for="">Pick a colour for your theme:</label> <input type="color" name="color" list="colors">
            <datalist id="colors">
  <option>#ff0000</option>
  <option>#0000ff</option>
  <option>#00ff00</option>
  <option>#ffff00</option>
  <option>#00ffff</option>
</datalist>
            
            <br>(if more than one, please mention in the "suggestion box") <br>
            <label for="">Extra Requirements(If any):</label>
            <div style="padding-top: 3%;">
                <input type="checkbox" style="margin: 0%;" name="extras[]" value="Music">Music &nbsp;
                <input type="checkbox" style="margin: 0%;" name="extras[]" value="Return Gifts">Return Gifts &nbsp;
                <input type="checkbox" style="margin: 0%;" name="extras[]" value="Invitations">Invitations &nbsp;
            </div>
            <br>
            <label for="">EMAIL ID For event confirmation: </label> <input type="email" placeholder="Enter registered mail here"> <br>
            <input style="padding: 40px 40px;" type="textarea" placeholder="suggestions(if any)" name="suggestions"> <br>

            <button type="submit" name="submitform">BOOK</button> <br> <br> <br>
        </div>
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