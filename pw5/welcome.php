<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome.php</title>
</head>
<body>
    <?php
        session_start();
        
        if(isset($_SESSION["username"])){
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
                $username = $_SESSION["username"];
                $sql = "select fullname, avatar from users where username='$username'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "Welcome: ".$row['fullname'];
                        echo "<br>";
                        echo "<img src='img/".$row["avatar"]."'>";
                    }
                } else {
                    //do nothing
                }
                $sql = "select movies.title from movies, favoritemovies where favoritemovies.username='$username' AND favoritemovies.movie_id = movies.movie_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<ul>";
                    while($row = $result->fetch_assoc()) {
                        echo "<li>Title: " .$row['title']."</li>";
                    }
                    echo "</ul>";
                } else {
                    //do nothing
                }
            }
        }
        else{
            header("Location: http://localhost:4433/pw5/login.html");
        }

    ?>
</body>
</html>