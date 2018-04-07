<?php 
$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "password";
$db = "pw5";


$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) ;
if ($conn->connect_error) {
    // die("Connection failed: " . $conn->connect_error);
    // echo "Connection Failed";
}
else{
    // echo "Connected successfully";
    $username = trim($_GET["username"]);
    $password = trim($_GET["password"]);

    if($username != "" && $password != "" ){
        // echo "All Set";
        $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                session_start();
                $_SESSION["username"] = $username;
                header("Location: http://localhost:4433/pw5/welcome.php");
                // echo "Username: " .$row['username']." Password: ".$row['password']." Fullname: ".$row['fullname']." Email: ".$row['email']." Avatar: ".$row['avatar'];
            }
        } else {
            header("Location: http://localhost:4433/pw5/login.html");
        }
    }else{
        // echo "Something is missing";
        header("Location: http://localhost:4433/pw5/login.html");
    }
    
}


?>