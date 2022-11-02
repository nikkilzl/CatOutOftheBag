<?php
    include "connect.php";
    $total = $_POST['total'];
    $oid = $_POST['order_id'];
    //$uid = $_SESSION['custId'];
    echo $total, $oid;
    $query = "update `Order` set purchasedDate=CURDATE(), totalAmount=$total where orderId=$oid";
    
    if(mysqli_query($conn, $query)){
        header("Location:../checkout.php");
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>