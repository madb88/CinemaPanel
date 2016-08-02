<?php
require_once '../connectionzad2.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $seansID = isset($_POST['seans'])?$_POST['seans']:null;
    $ticketQuantity = isset($_POST['quantity'])?$_POST['quantity']:null;
    $ticketPrice = isset($_POST['ticket_price'])?$_POST['ticket_price']:null;

    if($seansID && $ticketQuantity && $ticketPrice){
        $sql = "INSERT INTO Tickets (quantity, price, seans_id) VALUES ('$ticketQuantity', '$ticketPrice','$seansID')";
        if($conn->query($sql)){
            if(isset($_POST['payment_type']) && $_POST['payment_type'] != "noPayment"){
                $last_id = $conn->insert_id;
                $currdate = date("Y-m-d");
                $payment_type = isset($_POST['payment_type'])?$_POST['payment_type']:null;
                $sqlPaymentType =  "INSERT INTO Payments (payment_id, typ, data) VALUES ('$last_id', '$payment_type', '$currdate')";
                $conn->query($sqlPaymentType);
                echo "Ticket succesfully bought"."<br>";
                echo "<a href='../index.php'>Back to menu</a>"."<br>";
                
            }
            
        } else {
            echo "Blad przy dodawaniu biletu".$conn->error;
        }
            
    } 
            
}