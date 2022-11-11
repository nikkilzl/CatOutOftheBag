<?php
    include "connectdb.php";
    $prodid = $_POST['product_id'];
    $transacid = $_POST['transaction_id'];
    $sql = "delete from cartItem where productId = $prodid and `transactionId` = $trasacid";
    mysqli_query($conn, $sql);
    $mysqli->close($conn);
    header("Location:../cart.php");
?>
