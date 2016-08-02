<?php
require_once '../connectionzad2.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = isset($_POST['name'])?$_POST['name']:null;
    $adress = isset($_POST['adress'])?$_POST['adress']:null;
    if($name && $adress){
        $sql = "INSERT INTO Cinemas (name, adress) VALUES ('$name', '$adress')";
        if($conn->query($sql)){
            echo "Cinema successfully added";
        } else {
            echo "Error".$conn->error;
            
        }
        
        $conn->close();
        $conn = null;
        
        } 

}
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
<div class="container">
    <h2>Add Cinema to database:</h2>
    <div class="form-group">
        <form class="cinema_form" method="POST" action="#">
            <label>Name</label><br>
            <input name="name" type="text" maxlength="255" class="form-control" placeholder="Cinema name"/><br>
            <label>Address</label><br>
            <input name="adress" type="text" maxlength="255" class="form-control" placeholder="Cinema address"/><br>
            <button type="submit" name="submit" value="cinema" class="btn btn-success">Add</button>
        </form>
        <form action="../index.php">
            <button type="submit" class="btn btn-info">Back to menu</button>
        </form>
    </div>
</div>
</html>