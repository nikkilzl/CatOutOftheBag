<?php
    include "connectdb.php";
    $transacid = $_POST['transaction_id'];
    $totalamt = $_POST['total'];
    echo $totalamt, $transacid;
    $inputTransac = "update `transaction` set purchasedDate=sysdate(), totalAmount=$totalamt where transactionId=$transacid";
    
    if($mysqli->query($inputTransac)){
//if the sql query is able to run and update the database, then move on to the checkout page
        header("Location:../checkout.php");
    } else {
        echo $mysqli->error(); //if query cannot run then return error and close the connection
    }
    $mysqli->close($conn)
?>
