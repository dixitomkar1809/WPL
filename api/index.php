<?php
$dbuser = 'root';
$dbpassword = 'root';
$dbname = 'pw6';
$hostname = 'localhost';

$con = mysqli_connect($hostname,$dbuser,$dbpassword,$dbname);
if (mysqli_connect_errno())
{ 
	echo "Connection Error" . mysqli_connect_error();
}else{
    $query="select * from book";
    $result = mysqli_query ($con,$query);
    while($row = mysqli_fetch_assoc($result)) {
        $FinalJsonData[] = $row;
    }
    print json_encode($FinalJsonData);
}
?>