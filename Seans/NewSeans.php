<?php
require_once '../connectionzad2.php';

$sqlMovies =  "SELECT * FROM Movies";
$sqlCinemas =  "SELECT * FROM Cinemas";

echo "<a href='../index.php'>Back to menu</a>"."<br>";

?>
<!-- FORMULARZ DO DODAWANIA SEANSU -->
<html>
    <head>
        <title>Panel administracyjny</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <form action="AddSeans.php" method="POST">
<?php
$movieResult = $conn->query($sqlMovies);

if($movieResult->num_rows>0){
    echo "Wybierz film: "."<br>";
    echo '<select name="movie">';
    
    while($movieRow=$movieResult->fetch_assoc()){
        echo "<option value='{$movieRow['id']}'>{$movieRow['name']}</option>";
    }
    
    echo '</select>';
}
echo "<br>";

$sqlCinemas = $conn->query($sqlCinemas);
if($sqlCinemas->num_rows>0){
    echo "Wybierz kino: "."<br>";
    echo '<select name="cinema">';
    
    while($cinemaRow=$sqlCinemas->fetch_assoc()){
        echo "<option value='{$cinemaRow['id']}'>{$cinemaRow['name']}</option>";
    }
    
    echo '</select>';
}

?>
        <button type="submit">Add</button>
    </form>
</html>
