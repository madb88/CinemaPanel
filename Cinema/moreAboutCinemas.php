<html>
    <head>
        <title>Panel administracyjny</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
</html>
<?php
require_once '../connectionzad2.php';

if($_SERVER['REQUEST_METHOD']== "GET"){
    if(isset($_GET['id']) ){
        $id = $_GET['id'];
        $sqlCinemas = "SELECT Movies.* FROM Movies JOIN Seans ON Movies.id = Seans.movie_id
                        WHERE Seans.cinema_id = $id";
        $result = $conn->query($sqlCinemas);
        if($result->num_rows > 0){
            echo "What movie in this Cinema: "."<br>";
?>
<div class="container-fluid">
    <table class="table"> 
    <?php
        while($rowWhatCinema = $result->fetch_assoc()){ 
    ?>
        <tr><td><?php echo "<strong>Screenings: </strong>".$rowWhatCinema['name']."<br>"; ?>
            <td><?php echo "<a href='buyTicketForMovie.php?id={$rowWhatCinema['id']}'>Buy Ticket</a>"."<br>";?></td></tr>
    <?php   
        }
    ?>
    </table>
    <div>
        <form action="../index.php">
            <button type="submit" class="btn btn-info">Back to menu</button>
        </form>
    </div>
</div>
<?php
        } else {
            echo "No screenings in this cinema"."<br>";
            echo "<a href='../index.php'>Back to menu</a>"."<br>";
        }
            
    }
}


