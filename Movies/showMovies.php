<html>
    <head>
        <title>Panel administracyjny</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
</html>
<?php
require_once '../connectionzad2.php';

if($_SERVER['REQUEST_METHOD']== "POST"){
    if(isset($_POST['allMovie'])){
        $sql = "SELECT * FROM Movies";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ ?>

<div class="container-fluid">
    <table class="table"> 
        <?php
        while($rowMovie = $result->fetch_assoc()){
    ?>
        <tr><td><?php echo "Tytul: ".$rowMovie['name']."<br>";?>
            <td><?php  echo "<a href='../Cinema/delete.php?table_name=Movies&id={$rowMovie['id']}'>Delete</a>"."<br>";?>        
            <td><?php echo "<a href='moreAboutMovie.php?id={$rowMovie['id']}'>Screenings & Info</a>"."<br>"; ?></td></tr>
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
        }
    }
}