<?php
    include 'php/connectdb.php';
    $sql = "SELECT quantity, `transaction`.`transactionId`, productId FROM `transaction` , `cartItem` WHERE `transaction`.`transactionId` = `cartItem`.`transactionId` and custId=$cid and `paid`=0";

    $result = mysqli_query($conn, $sql);
    $quantity = !isset($_POST['quantity']) ? 1 : $_POST['quantity']; 

    if(mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE `cartItem` set quantity = quantity+$quantity WHERE `transactionId` = ".$row['transactionId']." and productId = $id";
        mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn)>0)
            $res = "INPUTCART";
        else{   
            $sql = "INSERT INTO `cartItem` (`transactionId`, productId, quantity) VALUES (".$row['transactionId'].", $id, $quantity)";
            mysqli_query($conn, $sql);
            $res = "ADDTOCART";
        }
    } else {
        $sql = "INSERT INTO `transaction` (paid, custId) VALUES (0, $cid);";
        $sql .= "INSERT INTO `cartItem` (transactionId, productId, quantity) VALUES (LAST_INSERT_ID(), $id, $quantity)"; //LAST_INSERT_ID() gives the transactionId inserted into transaction in the previous statement
        mysqli_multi_query($conn, $sql);
        $res = "ADDTOCART";
    }

    mysqli_close($conn);
?>