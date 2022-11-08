<?php
    include "connectdb.php";
    $oid = $_POST['order_id'];
    $total = $_POST['total'];
    echo $total, $oid;
    $query = "update `Order` set purchasedDate=CURDATE(), totalAmount=$total where orderId=$oid";
    
    if(mysqli_query($conn, $query)){
        header("Location:../checkout.php");
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>