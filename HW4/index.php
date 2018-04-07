<?php
$dbuser = 'root';
$dbpassword = 'root';
$dbname = 'hw4';
$hostname = 'localhost';

$con = mysqli_connect($hostname,$dbuser,$dbpassword,$dbname);
if (mysqli_connect_errno())
{ 
	echo "Connection Error" . mysqli_connect_error();
}else{
    $url      = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url_path = parse_url($url, PHP_URL_PATH);
    $bookid   = pathinfo($url_path, PATHINFO_BASENAME);
    // echo "$url \n";
    // echo "$url_path \n";
    // echo "$bookid \n";
    if (is_numeric($bookid)){
        // echo "SELECT book.Title, book.Year, book.Price, book.Category, authors.Author_Name as Authors from book, book_authors, authors WHERE book.Book_id = 2 and book_authors.Book_id = 2 and book_authors.Author_id = authors.Author_id";
        $query = "SELECT book.Title, book.Year, book.Price, book.Category from book WHERE book.Book_id =  $bookid" ;
        //and book_authors.Book_id = $bookid and book_authors.Author_id = authors.Author_id";
        $result = mysqli_query ($con,$query);

        while($row = mysqli_fetch_assoc($result)) {
            $FinalJsonData["Title"] = $row["Title"];
            $FinalJsonData["Year"] = $row["Year"];
            $FinalJsonData["Price"] = $row["Price"];
            $FinalJsonData["Category"] = $row["Category"];
        }
        $query2 = "SELECT authors.Author_Name from authors, book_authors WHERE book_authors.Book_id = $bookid and book_authors.Author_id = authors.Author_id";
        $result2 = mysqli_query($con, $query2);
        $tempAuthors = array();
        $FinalJsonData["authors"] = array();
        while($row = mysqli_fetch_assoc($result2)){
            array_push($FinalJsonData["authors"], $row["Author_Name"]);
        }
        array_push($tempAuthors, $FinalJsonData);
        print json_encode($tempAuthors);
    }
    else if ($bookid=='books'){
        $query="select Title, Price, Category from book";
        $result = mysqli_query ($con,$query);
        while($row = mysqli_fetch_assoc($result)) {
            $FinalJsonData[] = $row;
        }
        print json_encode($FinalJsonData);
    }
    
}
?>