<html>
    <head>
        <title>Panel administracyjny</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
</html>
<?php
require_once '../connectionzad2.php';

$result1 = $conn->query("SELECT * FROM Cinemas");

if($_SERVER['REQUEST_METHOD']=="POST"){
    if($result1->num_rows > 0){
        echo '<strong>Wszystkie kina: </strong>'."<br>";?>
<div class="container-fluid">
    <table class="table"> 
    <?php
    while($row=$result1->fetch_assoc()){
    ?>
        <tr><td><?php echo "Id: ".$row['id'].' '." Nazwa kina: ".$row['name'].' '." Adres: ".$row['adress'].' ';?>
            <td><?php echo "<a href='delete.php?table_name=Cinemas&id={$row['id']}'>Delete</a>"."<br>";?></td></tr>
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
        echo 'Brak kin do wyswietlenia'."<br>";
    }
}