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
        $sql= "SELECT * FROM Movies WHERE id=$id";
        $sqlMovie = "SELECT Cinemas.* FROM Cinemas JOIN Seans ON Cinemas.id = Seans.cinema_id
                  WHERE Seans.movie_id = $id";
        $result = $conn->query($sql);
        $result2 = $conn->query($sqlMovie);
        
        if($result->num_rows > 0){ ?>
<div class="container-fluid">
    <table class="table"> 
    <?php
    while($rowMovie = $result->fetch_assoc()){
    ?>
        <tr><td><?php  echo "<strong>Description: </strong>".$rowMovie['description']."<br>"; ?></tr>
            <td><?php  echo "<strong>Rating: </strong>".$rowMovie['rating']."<br>"; ?></td>  
    <?php
    } 
    ?>
    </table>
</div>
    <?php echo "Cinemas where you can watch this movie: "."<br>";
    
    if($result2->num_rows > 0){ ?>
<div class="container-fluid">
    <table class="table"> 
        <?php
        while($rowWhatCinema = $result2->fetch_assoc()){
            ?>
        <tr><td><?php    echo "<strong>Cinema: </strong>".$rowWhatCinema['name'] ?></td> 
            <td><?php  "<strong> Adres: </strong>".$rowWhatCinema['adress']."<br>"; ?></td>
<?php
        } 
        ?>
    </table>

<?php

        } else {
            echo 'No seans for this movie';
            echo "<a href='../index.php'>Back to menu</a>"."<br>";
        }
        }
    }   
}
     ?>
    <form action="../index.php">
        <button type="submit" class="btn btn-info">Back to menu</button>
    </form>   
</div>


