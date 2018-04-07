<?php
// echo $_GET["Username"];
// echo $_GET["Name"];
// echo $_GET["Password"];
$username = $_GET["Username"];
$name = $_GET["Name"];
$password = $_GET["Password"];

if(($username!=null || $username!="")&&($name!=null || $name!="")&&($password!=null || $password!="")){
    session_start();
    $_SESSION["username"]= $username;
    $_SESSION["name"] = $name;
    $_SESSION["count"] = 0;
    // echo "all good";
    header("Location: http://localhost:8080/pw4/welcome.php");
}
else{
    header("Location: http://localhost:8080/pw4/login.html");
}
?>