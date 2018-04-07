<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["name"])){
    header("Location: http://localhost:8080/pw4/welcome.php");
}
else{
    // echo $_GET["Username"];
    // echo $_GET["Name"];
    // echo $_GET["Password"];
    $username = $_GET["Username"];
    $name = $_GET["Name"];
    $password = $_GET["Password"];

    if(($username!=null || $username!="")&&($name!=null || $name!="")&&($password!=null || $password!="")){
        $_SESSION["username"]= $username;
        $_SESSION["name"] = $name;
        $_SESSION["count"] = 1;
        // echo "all good";
        header("Location: http://localhost:8080/pw4/welcome.php");
    }
    else{
        header("Location: http://localhost:8080/pw4/login.html");
    }
}

?>