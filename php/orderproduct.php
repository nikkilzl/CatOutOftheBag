<?php
    include "connectdb.php";

    $nameUser = $_POST['fullName'];
    $emailadd = $_POST["email"];
    $hpNo = $_POST["phoneNumber"];
    $address = $_POST["address"];
    $totalamt = $_POST["totalAmount"];
    $transacid = $_POST["transactionId"];
    $custId = $_POST["custId"];
    // this is to retrieve all the info from checkout and pull it for the email 

    //using sql to update the custdets
    $custdetail = "UPDATE custdets SET fullName='$nameUser', email='$emailadd', phoneNumber='$hpNo', address='$address' where custId = '$custId'";
    //we only need those that are recorded in the database so things like credit card number don't need
    mysqli_query($conn, $custdetail); 
    //call for the sql query
    if(mysqli_affected_rows($conn)<=0){ //check if the the row array that we called is more than 0 since we wanna make sure it has data
        $success = 'false';
        // so if the number of rows or data is less than or 0 then no success - payment cannot go through
    }

    //if there are rows then we wil let payment go through
    else{
        $finalorder = "UPDATE `transaction` SET totalAmount = $totalamt, purchasedDate =now(), paid = 1 where `transactionId` = ".$transacid;
        //update the total and the date when checkout into the database to the correct user
        mysqli_query($conn, $finalorder);
        // run the sql query
    
        //if the rows affected is more than 0 so at least 1, then payment goes through and an email will be sent
        if(mysqli_affected_rows($conn)>0){
            $success = 'true';
        
            //if it’s successful then an email will be sent
            //this is for the sender and recipient email and the content of the
            $to      = 'f32ee@localhost';
            $subject = 'Your order is on its way! - Cat Out of The Bag';
            $message = '
            Your order is successful, and will be shipped soon!

            Shipping address: ' . $address . '
            Total amount: $' . $totalAmount . '
            ';

            // send HTML email
            // this is taken from notes - basically it's to set the sender and recipient info
            $headers = 'From: f32ee@localhost' . "\r\n" .
                'Reply-To: f32ee@localhost' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers,'-ff32ee@localhost');
//bounce email will be sent to f32ee also
        }
        else{
            $success = 'false';
        }
    }

    header("Location:../checkout.php?success=".$success);
//if $success is true then it will show the success popup, if it is false then it will show the red unsuccessful popup
    
?>

