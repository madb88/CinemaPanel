<?php
require_once '../connectionzad2.php';

?>

<form action="payment.php" method="POST">
    <label>
        Bilety oplacone za pomoca:
        <select name="payment_type">
            <option value="card">Karta</option>
            <option value="cash">Gotowka</option>
            <option value="transfer">Przelew</option>
            <option value="noPayment">Brak</option>
        </select>
    </label><br>
    <button type ="submit" value="Payment" name="submit">Check</button>
</form>