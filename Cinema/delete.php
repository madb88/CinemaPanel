<?php
require_once '../connectionzad2.php';

if($_SERVER['REQUEST_METHOD']== "GET"){
    if(isset($_GET['table_name']) && isset($_GET['id']) ){
        $tabela = $_GET['table_name'];
        $id = $_GET['id'];
        $conn->query("DELETE FROM $tabela WHERE id='$id'");
        
    } else {
       
        echo "Error";
        
    }
}


header('Location: ../index.php');
