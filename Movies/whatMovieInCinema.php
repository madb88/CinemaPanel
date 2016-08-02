<?php
require_once '../connectionzad2.php';
$sqlCinemas2 =  "SELECT * FROM Cinemas";

if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['whatMovie']){
        $whatMovie = $_POST['whatMovie'];
        $sql2= "SELECT Movies.* FROM Movies JOIN Seans ON Movies.id = Seans.movie_id
                WHERE Seans.cinema_id = $whatMovie";
        $result = $conn->query($sql2);
        echo "<strong>Filmy wyswietlane w danym kinie: </strong>"."<br>";
        if($result->num_rows > 0){ 
            while($row=$result->fetch_assoc()){
                echo '<strong>Tytul:</strong> '.$row['name']."<br>".' Opis: '.$row['description']."<br>".'Rating: '.$row['rating']."<br>";
            }
            
        } else {
            
            echo 'Brak filmow w podanym kinie';
        }
       
    } 
}
echo "<br>";

?>
<html>
    <hr>
    <form action="#" method="POST">
<?php
$cinemaResult = $conn->query($sqlCinemas2);

if($cinemaResult->num_rows>0){
    echo "Wybierz kino: "."<br>";
    echo '<select name="whatMovie">';
    
    while($cinemaRow = $cinemaResult->fetch_assoc()){
        echo "<option value='{$cinemaRow['id']}'>{$cinemaRow['name']}</option>";
    }
    echo '</select>';
}

echo "<br>";
echo "<br>";

?>
        <button type="submit">Show Movies</button>
    </form>
</html>
