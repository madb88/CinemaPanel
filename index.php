<?php

?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Panel administracyjny</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <h2><center>Panel Administracyjny</center></h2>
        <div class="container-fluid">
            <div class="row">
                <div class="btn-group btn-group-justified" role="group">
                    <div class="btn-group" role="group">
                        <form action="Cinema/NewCinema.php" method="POST">
                            <button type="submit" name="Cinema" class="btn btn-primary">Add new cinema</button>
                        </form>
                        <form action="Cinema/showCinemas.php" method="POST">
                            <button type="submit" name="allCinema" class="btn btn-primary">Show Screenings</button>
                        </form>
                        <form action="Cinema/showAllCinemas.php" method="POST">
                            <button type="submit" name="Cinemas" class="btn btn-primary">Show all cinemas</button>
                        </form>
                        <form action="Movies/NewMovie.php" method="POST">
                            <button type="submit" name="Movie" class="btn btn-primary">Add new Movie</button>
                        </form>
                        <form action="Movies/showMovies.php" method="POST">
                            <button type="submit" name="allMovie" class="btn btn-primary">Show movies</button>
                        </form>
                        <form action="Seans/NewSeans.php" method="POST">
                            <button type="submit" name="Seans" class="btn btn-primary">Add new screening</button>
                        </form>
                        <form action="Movies/whatMovieInCinema.php" method="POST">
                            <button type="submit" name="whatMovie" class="btn btn-primary">Repertoire</button>
                        </form>
                        <form action="Tickets/checkTickets.php" method="POST">
                            <button type="submit" name="allTickets" class="btn btn-primary">Tickets</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>