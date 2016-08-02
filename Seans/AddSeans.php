<?php
require_once '../connectionzad2.php';

$sqlMovies =  "SELECT * FROM Movies";
$sqlCinemas =  "SELECT * FROM Cinemas";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $movie = isset($_POST['name'])?$_POST['name']:null;
    $cinema = isset($_POST['cinema'])?$_POST['cinema']:null;
    if($_POST['movie'] && $_POST['cinema']){
        $movie = $_POST['movie'];
        $cinema = $_POST['cinema'];
        $sql= "INSERT INTO Seans (movie_id, cinema_id) VALUES ('$movie','$cinema')";
        $conn->query($sql);
        
        echo "Seans zostal dodany";
        
    } else {
        
        echo 'Bledne dane';
    }
}

echo "<a href='../index.php'>Back to menu</a>"."<br>";
