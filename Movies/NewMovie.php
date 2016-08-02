<?php
require_once '../connectionzad2.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = isset($_POST['name'])?$_POST['name']:null;
    $description = isset($_POST['description'])?$_POST['description']:null;
    $rating = isset($_POST['rating']) && $_POST['rating']>0 && $_POST['rating'] <= 10 ?$_POST['rating']:null;
    if($name && $description && $rating){
        $sql = "INSERT INTO Movies (name, description, rating) VALUES ('$name', '$description','$rating')";
        if($conn->query($sql)){
            
            echo "Success!!";
            
        } else {
            
            echo "Blad przy dodawaniu filmu".$conn->error;
            
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
<div>
    <div class="container">
        <h2>Add new movie to database:</h2>
        <div class="form-group">
            <form class="movie_form" method="POST" action="#">
                <label>Movie Title</label><br>
                <input name="name" type="text" maxlength="255" class="form-control" placeholder="Movie title"/><br>
                <label>Description</label><br>
                <input name="description" type="text" maxlength="255" class="form-control" placeholder="Movie description"/><br>
                
                <div class="row">
                    <div class="col-xs-2">
                        <label>Rating</label><br>
                        <input name="rating" type="number" min="0" max="10" class="form-control"/><br></div>
                </div>
                <button type="submit" name="submit" value="movie" class="btn btn-success">Add</button>
            </form>
            <form action="../index.php">
                <button type="submit" class="btn btn-info">Back to menu</button>
            </form>
        </div>
    </div>
</html>