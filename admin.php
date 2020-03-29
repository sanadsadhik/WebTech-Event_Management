<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "event_management";

// Create connection
$conn = mysqli_connect($server,$user,$pass,$dbname);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand&display=swap" rel="stylesheet">
    <title>admin</title>
</head>
<body style="background-color: wheat;border-style:ridge;border-color: black; color:wheat; padding-bottom: 220px; ">

    <P style="text-align: center; font-weight: 300; font-size: 70px; color: black;">A D M I N <br> P A G E</P>

    <p style="font-family: 'Patrick Hand', cursive; text-align: center;font-weight: bolder;
     font-size: 20px; color:crimson;"> UPCOMING EVENTS </p>

    

    <table border="1" style="border-collapse: collapse; background-color: crimson;
    text-align: center; margin-right: auto; margin-left: auto;border-color: black; ">  
    <tr>
    <th > EVENT DATE </th>
    <th > TIME </th>
    <th> VENUE </th>
    <th > EVENT TYPE </th>
    <th > DECORATION </th>
    <th > COLOURS </th>
    <th > EXTRAS </th>
    <th > SUGGESTIONS </th>
    </tr> 
    
    <?php   
    $currentdate=date("Y/m/d");
    $query = "SELECT * FROM event
    WHERE date>='$currentdate'";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    while($row = $result->fetch_assoc()) {
        $field1 = $row["date"];
        $field2 = $row["time"];
        $field3 = $row["venue"];
        $field4 = $row["type"];
        $field5 = $row["decoration"];
        $field6 = $row["colours"];
        $field7 = $row["extras"];
        $field8 = $row["suggestions"];
        echo '
        <tr>
            <td style="width: 5%;" >'.$field1.'</td>
            <td style="width: 5%;" >'.$field2.'</td>
            <td style="width: 5%;" >'.$field3.'</td>
            <td style="width: 5%;" >'.$field4.'</td>
            <td style="width: 5%;" >'.$field5.'</td>
            <td style="width: 5%;" >'.$field6.'</td>
            <td style="width: 5%;" >'.$field7.'</td>
            <td style="width: 5%;" >'.$field8.'</td>
        </tr>
                ';
     }
    ?>
  
  </table>
</body>
</html>