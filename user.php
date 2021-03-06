<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "event_management";

// Create connection
$conn = mysqli_connect($server,$user,$pass,$dbname);
session_start();
$email=$_SESSION['email'];

$query = "SELECT * FROM user
WHERE email ='$email'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$row = $result->fetch_assoc();
$name=$row['name'];
$_SESSION['uid']=$row['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Zilla+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comic+Neue&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        p {
            margin: 0px;
        }
        
        div {
            margin: 0px;
        }
    </style>
</head>

<body style="margin: 0px;">
    <nav>
        <ul style="background-color:rgb(173, 60, 60) ; list-style-type: none; overflow: hidden;margin: 0px;">
            <li><a href="#home">| HOME |</a></li>
            <li><a href="#aboutus">| ABOUT US | </a></li>
            <li><a href="#gallery">| GALLERY |</a></li>
            <li style="float: right;"><a href="#">| <?php echo $name ?> |</a></li>
            <li style="float: right;"><a href="logout.php">| LOG OUT |</a></li>
        </ul>
    </nav>



    <div id="home" style="background-image: url(img/fairy.jpg); padding-bottom: 200PX;">
        <div style="text-align:center;font-family: 'Special Elite', cursive;font-size:80px;padding-top: 350PX; color: rgb(236, 214, 214);">DREAM CATCHERS </div>
        <BR>
        <div style="text-align:center;font-family: 'Satisfy', cursive;
            font-size:30px; color: rgb(236, 214, 214);"> your dream , our destination</div>
    </div>


    <div id="aboutus" style="text-align: center; background-color:rgb(231, 92, 67);">
        <div style="font-size: 70px; font-family: 'Satisfy', cursive; "> about us </div>
        <P style="line-height: 300%;font-family: 'Comic Neue', cursive; font-weight: bold; ">
            Welcome to Dream Catchers! <br> Any special day in our lives are always incomplete without celebrations. <br> Here at Dream Catchers, we help you celebrate any of your events with a whole lot of love and happiness. <br> It's important for
            us to look back at these days and always have a smile while we remember how we enjoyed the party. Here, we've come up with a very simple website that can help us to stay connected and reach you easily. All you'll have to do is click the button
            at the bottom of this page which will redirect you to our booking form.<br> We've made it as simple as it can get so that it's easier for you all to access it.<br> May it be a wedding, your friends birthday party, mehendi party, a house warming,
            baby showers or any event you can think of- we've got your back. <br> You can have a look into our gallery in order to have a visual representation of what we do, and for any further detials, you can directly contact use via mail/phone. <br>            To recieve any further updates from us, kindly register by logging in or signing up if you don't have an account already.<br> We hope to help you in our best possible way!<br>
        </P>
    </div>


    <div id="gallery" style="background-color: black; padding-bottom: 70px;">
        <div style="color:sandybrown;font-family: 'Special Elite', cursive; font-size: 100px; padding-top: 20PX; text-align: right;"> G A L L E R Y </div>

        <table style="color: tomato; text-align: center; padding-left: 100px;">
            <tr>
                <td><img style="height:250px; width: 250px;" src="img/holi.jpg">
                    <figcaption> HOLI PARTIES</figcaption>
                </td>
                <td><img style="height:250px;" src="img/bday.jpg">
                    <figcaption> BIRTHDAY PARTIES</figcaption>
                </td>
                <td><img style="height:250px;" src="img/mehendi.png">
                    <figcaption> MEHENDI </figcaption>
                </td>
            </tr>
        </table>

        <table style="padding-left: 420px; color: tomato; text-align: center; ">
            <tr>
                <td><img style="height:250px;" src="img/wed.jpg">
                    <figcaption>WEDDINGS</figcaption>
                </td>
                <td><img style="height:250px;" src="img/baby.jpg">
                    <figcaption> BABY SHOWERS</figcaption>
                </td>
                <td><img src="img/eng.jfif">
                    <figcaption> ENGAGEMENTS</figcaption>
                </td>
            </tr>
        </table>
    </div>


    <div id="book" style="text-align: center;background-image: url(img/woo.png) ;padding: 90px 80px;font-weight: bolder; ">
        <mark style="background-color: wheat;">To Book An Event, Click On The Button Below </mark><br> <br>
        <button style="border:none"  onclick="window.location.href='bookevent.php';">Click here </button> <br> <br> <br>
        <H1> <mark style="background-color: wheat;"> THANK YOU</H1> </mark>
    </div>

</body>

</html>

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