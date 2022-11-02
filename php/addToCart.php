<?php
    include 'php/connect.php';
    $sql = "SELECT quantity, `Order`.`orderId`, productId FROM `Order` , `OrderItems` WHERE `order`.`orderId` = `orderitems`.`orderId` and custId=$uid and `paid`=0";

    $result = mysqli_query($conn, $sql);
    $quantity = !isset($_POST['quantity']) ? 1 : $_POST['quantity'];

    if(mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE `OrderItems` set quantity = quantity+$quantity WHERE `orderId` = ".$row['orderId']." and productId = $id";
        mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn)>0)
            $res = "CART_UPDATE";
        else{   
            $sql = "INSERT INTO `OrderItems` (`orderId`, productId, quantity) VALUES (".$row['orderId'].", $id, $quantity)";
            mysqli_query($conn, $sql);
            $res = "CART_ADD";
        }
    } else {
        $sql = "INSERT INTO `Order` (paid, custId) VALUES (0, $uid);";
        $sql .= "INSERT INTO `OrderItems` (`orderId`, productId, quantity) VALUES (LAST_INSERT_ID(), $id, $quantity)"; //LAST_INSERT_ID() gives the orderId inserted into order in the previous statement
        mysqli_multi_query($conn, $sql);
        $res = "CART_ADD";
    }

    mysqli_close($conn);

    if( ($res == "CART_ADD" || $res == "CART_UPDATE") && isset($_POST["type"]) && $_POST["type"] == 'BUY_NOW'){
        header('Location: ../shoppingCart.php'); //send to raw http in this case shoppingCart page
    }
?>