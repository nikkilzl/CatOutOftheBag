<?php
    include "connectdb.php";
    $pid = $_POST['product_id'];
    $oid = $_POST['transaction_id'];
    $sql = "delete from cartItem where productId = $pid and transactionId = $oid";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location:../cart.php");
?>