<?php
require_once '../connectionzad2.php';

if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET['id'])){
        $seansId = $_GET['id'];
    }
}

?>

<!-- FORMULARZ DO KUPOWANIA BILTOW -->
<html>
    <head>
        <title>Panel administracyjny</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <div class="container-fluid">
        <div class="form-group">
    <form action="TicketComplete.php" method="POST">
        <label>
            Quantity
            <input name ="quantity" type="text" class="form-control"/>
        </label><br>
        <label>
            Price:
            <select name="ticket_price" class="form-control">
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
        </label><br>
        <label>
            Payment type:
            <select name="payment_type" class="form-control">
                <option value="card">Karta</option>
                <option value="cash">Gotowka</option>
                <option value="transfer">Przelew</option>
                <option value="noPayment">Brak</option>
            </select>
        </label><br>
        <input type="hidden" name="seans" value="<?=$seansId?>">
        <button class="btn btn-primary" type ="submit">Buy Ticket</button>
    </form> 
        </div>
    </div>
</html>

