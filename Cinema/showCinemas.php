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
    if(isset($_POST['allCinema'])){
        $sql = "SELECT * FROM Cinemas";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ ?>
<div class="container-fluid">
    <table class="table"> 
    <?php
    while($rowCinema = $result->fetch_assoc()){ 
    ?>
        <tr><td><?php echo "Nazwa kina: ".$rowCinema['name']." Adres: ".$rowCinema['adress']."<br>";?>
            <td><?php echo "<a href='moreAboutCinemas.php?id={$rowCinema['id']}'>Movies in this cinema</a>"."<br>";?></td></tr>
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
