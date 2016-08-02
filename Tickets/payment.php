<?php
require_once '../connectionzad2.php';


$result1 = $conn->query("SELECT * FROM Tickets JOIN Payments ON 
        Payments.payment_id=Tickets.id WHERE Payments.typ='card'");

$result2 = $conn->query("SELECT * FROM Tickets JOIN Payments ON 
        Payments.payment_id=Tickets.id WHERE Payments.typ='cash'");

$result3 = $conn->query("SELECT * FROM Tickets JOIN Payments ON 
        Payments.payment_id=Tickets.id WHERE Payments.typ='transfer'");

$result4 = $conn->query("SELECT * FROM Tickets LEFT JOIN Payments ON 
        Payments.payment_id = Tickets.id WHERE Payments.payment_id IS NULL");

if($_SERVER['REQUEST_METHOD']=="POST"){
    switch ($_POST['payment_type']){
        case 'card':
            if($result1->num_rows > 0){
                echo '<strong>Bilety oplacone karta: </strong>'."<br>";
                
                while($row=$result1->fetch_assoc()){
                    echo "Id: ".$row['id'].' '."Quantity: ".$row['quantity'].' '."Price: ".$row['price']."<br>";
                } 
            } else {
                echo 'Brak biletow'."<br>";
            }
            break;
        
        case 'cash':
            if($result2->num_rows > 0){
                echo '<strong>Bilety oplacone gotowka: </strong>'."<br>";
                
                while($row=$result2->fetch_assoc()){
                    echo "Id: ".$row['id'].' '."Quantity: ".$row['quantity'].' '."Price: ".$row['price']."<br>";
                } 
            } else {
                echo 'Brak biletow'."<br>";
            }
            break;
        
        case 'transfer':
            if($result3->num_rows > 0){
                echo '<strong>Bilety oplacone przelewem: </strong>'."<br>";
                
                while($row=$result3->fetch_assoc()){
                    echo "Id: ".$row['id'].' '."Quantity: ".$row['quantity'].' '."Price: ".$row['price']."<br>";
                } 
            } else {
                echo 'Brak biletow'."<br>";
            }
            break;
        
        case 'noPayment':
            if($result4->num_rows > 0){
                echo '<strong>Bilety oplacone gotowka: </strong>'."<br>";
                
                while($row=$result4->fetch_assoc()){
                    echo "Id: ".$row['id'].' '."Quantity: ".$row['quantity'].' '."Price: ".$row['price']."<br>";
                } 
                
            } else {
                echo 'Brak biletow'."<br>";
            }
            break;
    }
}