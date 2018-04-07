<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flickr Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <form action="/pw7/index.php" method="POST">
        <input type="text" placeholder="Search" name="searchTerm" id="searchTerm"/>
        <input type="submit" value="search"/>
    </form>
</body>
</html>

<?php
require_once('flickr.php'); 
$searchTerm = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $searchTerm = $_POST["searchTerm"];
    echo "<h2>".$searchTerm."</h2>";
    $Flickr = new Flickr('78dc2b13d9cc1127139a1aa12bf9fcc6'); 
    $data = $Flickr->search($searchTerm);
    $counter = 1;
    foreach($data['photos']['photo'] as $photo) { 
        // echo $counter;
        // the image URL becomes somthing like 
        // http://farm{farm-id}.static.flickr.com/{server-id}/{id}_{secret}.jpg  
        echo '<a href="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" target="_blank"><img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" style="height:200px;width:200px"></a>'; 
        $counter +=1;
    }
}

?>