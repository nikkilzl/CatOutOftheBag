<?php
    include "connectdb.php";
    $oid = $_POST['transaction_id'];
    $total = $_POST['total'];
    echo $total, $oid;
    $query = "update `transaction` set purchasedDate=CURDATE(), totalAmount=$total where transactionId=$oid";
    
    if(mysqli_query($conn, $query)){
        header("Location:../checkout.php");
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>