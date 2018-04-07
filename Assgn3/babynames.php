<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "password";
$db = "hw3";


$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) ;
if ($conn->connect_error) {
    // die("Connection failed: " . $conn->connect_error);
    // echo "Connection Failed";
}
else{
    // echo "Connected successfully";
    // $year = $_GET["year"];
    // $gender = $_GET["gender"];
    $year = $_POST["year"];
    $gender = $_POST["gender"];
    if(($year==null || $year=="") && ($gender==null || $gender=="") ){
        // echo "both are null or blank<br>";
        //execute query without any where clause SELECT * FROM `babynames`
        $sqlQuery = "SELECT * FROM `babynames` WHERE ranking <=5";
        // echo $sqlQuery;
        $result = $conn->query($sqlQuery);
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table style='border: 1px solid black;'><thead style='text-align:left'><th style='padding:5px'>Name</th><th style='padding:5px'>Year</th><th style='padding:5px'>gender</th><th style='padding:5px'>ranking</th></thead><tbody>";
            while($row = $result->fetch_assoc()) {
                 echo "<tr style='padding:5px'><td style='padding:5px'>" .$row['name']."</td><td style='padding:5px'>".$row['year']." </td><td style='padding:5px'>".$row['gender']."</td><td style='padding:5px'>".$row['ranking']."</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Something went Wrong";
        }
    }elseif($gender==null || $gender==""){
        // echo "gender is null or blank<br>",$year;
        //execute query without gender SELECT * FROM `babynames` WHERE year='2010'
        $sqlQuery = "SELECT * FROM `babynames` WHERE year='$year' AND ranking <=5";
        // echo $sqlQuery;
        $result = $conn->query($sqlQuery);
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table style='border: 1px solid black;'><thead style='text-align:left'><th style='padding:5px'>Name</th><th style='padding:5px'>Year</th><th style='padding:5px'>gender</th><th style='padding:5px'>ranking</th></thead><tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr style='padding:5px'><td style='padding:5px'>" .$row['name']."</td><td style='padding:5px'>".$row['year']." </td><td style='padding:5px'>".$row['gender']."</td><td style='padding:5px'>".$row['ranking']."</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Something went Wrong";
        }
    }elseif($year==null || $year==""){
        // echo "year is null or blank<br>",$gender;
        //execute query without year SELECT * FROM `babynames` WHERE gender='M'
        $sqlQuery = "SELECT * FROM `babynames` WHERE gender='$gender' AND ranking <=5";
        // echo $sqlQuery;
        $result = $conn->query($sqlQuery);
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table style='border: 1px solid black;'><thead style='text-align:left'><th style='padding:5px'>Name</th><th style='padding:5px'>Year</th><th style='padding:5px'>gender</th><th style='padding:5px'>ranking</th></thead><tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr style='padding:5px'><td style='padding:5px'>" .$row['name']."</td><td style='padding:5px'>".$row['year']." </td><td style='padding:5px'>".$row['gender']."</td><td style='padding:5px'>".$row['ranking']."</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Something went Wrong";
        }
    }else{
        // echo  $year, $gender;
        //execute query with both SELECT * FROM `babynames` WHERE year='2010' and gender='M'
        $sqlQuery = "SELECT * FROM `babynames` WHERE year='$year' and gender='$gender' AND ranking <=5";
        // echo $sqlQuery;
        $result = $conn->query($sqlQuery); 
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table style='border: 1px solid black;'><thead style='text-align:left'><th style='padding:5px'>Name</th><th style='padding:5px'>Year</th><th style='padding:5px'>gender</th><th style='padding:5px'>ranking</th></thead><tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr style='padding:5px'><td style='padding:5px'>" .$row['name']."</td><td style='padding:5px'>".$row['year']." </td><td style='padding:5px'>".$row['gender']."</td><td style='padding:5px'>".$row['ranking']."</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Something went Wrong";
        }
    }
}

?>