<?php
    include("connect.php");

    $fullName = $_POST['fullName'];
    $paymentMethod = $_POST["paymentMethod"];
    $email = $_POST["email"];
    $nameOnCard = $_POST["nameOnCard"];
    $phoneNumber = $_POST["phoneNumber"];
    $creditCardNumber = $_POST["creditCardNumber"];
    $address = $_POST["address"];
    $creditCardExpires = $_POST["creditCardExpires"];
    $cvv = $_POST["cvv"];
    $totalAmount = $_POST["totalAmount"];
    $orderId = $_POST["orderId"];
    $custId = $_POST["custId"];

    $sql = "UPDATE CustomerDetails SET fullName='$fullName', email='$email', phoneNumber='$phoneNumber', address='$address' where custId = '$custId'";
    mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn)<=0){
        $success = 'false';
    }

    //testcase for payment unsuccessful
    /*else if($custId == 2)
        $success = 'false';*/

    else{
        //handle payment by third party 
        //assume success
        $sql = "UPDATE `Order` SET totalAmount = $totalAmount, purchasedDate =now(), paid = 1 where orderId = ".$orderId;
        mysqli_query($conn, $sql);
    
        if(mysqli_affected_rows($conn)>0){
            $success = 'true';
        
            //send email
            $to      = 'f32ee@localhost';
            $subject = 'Your order is on its way! - Cat Out of The Bag';
            $message = '
            Your order is successful, and will be shipped soon!

            Shipping address: ' . $address . '
            Total amount: $' . $totalAmount . '
            ';

            // set content-type to send HTML email
            $headers = 'From: f32ee@localhost' . "\r\n" .
                'Reply-To: f32ee@localhost' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers,'-ff32ee@localhost');
        }
        else{
            $success = 'false';
        }
    }

    header("Location:../checkout.php?success=".$success);
    
?>
