<?php 
session_start();
$_SESSION["count"]++;
// echo $_GET["logout"];
if(isset($_SESSION["username"]) && isset($_SESSION["name"])){

}
else{
    header("Location: http://localhost:8080/PW4/login.html");
}
if(isset($_GET["logout"])){
    // echo "yes check box set";
    session_destroy();
    header("Location: http://localhost:8080/PW4/login.html");
}
else{
    // echo "no not checked";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php 
        // session_start();
        echo "<br>Username: ".$_SESSION["username"];
        echo "<br>Name: ".$_SESSION["name"];
        echo "<br>Count: ".$_SESSION["count"]; 
    ?>
    <form action="welcome.php">
        <input type="submit" value="Reload">
        <input type="checkbox" name="logout" id="logout">Logout
    </form>
</body>
</html>

