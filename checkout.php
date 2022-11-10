<html>
    <?php 
        $success=0;
        if(isset($_GET['success']) && !empty($_GET['success']))
            $success = $_GET['success']; 

    ?>
    <head>
        <title>Checkout | Cat Out of The Bag</title>
        <link rel="stylesheet" href="css/global.css"/>

        
    </head>

    <body>
        <?php 
            include 'php/authoriselogin.php';
            include 'element/navigation.php';
            include 'php/connectdb.php';
                   
            $cid = $_SESSION['custId'];
            $query = "SELECT * FROM cust_dets where custId=$cid";
            $cust_dets = mysqli_query($conn, $query);
            $cust_dets = $cust_dets->fetch_assoc();

            $query = "SELECT * FROM `transaction` , `cartItem`,`Product` WHERE `transaction`.`transactionId` = `cartItem`.`transactionId` and `cartItem`.`productId` = `Product`.`productId` and custId=$cid and `paid`=0";
            $result = mysqli_query($conn, $query);

        ?>
            <div class="checkpage page">
                <div class="title-container">
                    <h1>Checkout</h1>
                </div>
                <div class="ord-sum content">
                    <div class="ord-sum">
                        <h2>Order summary</h2>
                        <table class="ord-tbl">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php
                                    $total=0;
                                    $transactionId = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                        $total+=$row['price']*$row['quantity'];
                                        $transactionId  = $row['transactionId'];
                                        echo '
                                        <tr>
                                            <td class="product-display"> 
                                                <img src="'.$row['image'].'" alt="product"/>
                                                <span>'. $row['name'] .'<span>
                                            </td>
                                            <td>$'. $row['price'] .'</td>
                                            <td>'. $row['quantity'] .'</td>
                                            <td>$'. ($row['price']*$row['quantity']) .'</td>
                                        </tr>';
                                    }
                                
                                ?>
 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="price-total">Order Total: <span>$<?php echo $total; ?></span></td>
                                </tr>   
                            </tfoot>
                        </table>
                    </div>
                    
                </div>

                <div class="order-summary content">
                    <div class="cust-det">
                        <h2>Customer Details</h2>
                        <form method="POST" action="php/orderproduct.php" id="place-order-form" onsubmit="return handleSubmit()">
                            <table class="cust-det-tbl">
                                <tr>
                                    <td class="label">Full Name</td>
                                    <td> <input type="text" placeholder="Full name" name="fullName" value="<?php echo $cust_dets['fullName']; ?>" required/> </td>
                                    <td class="label">Payment Method</td>
                                    <td><input type="radio" checked name="paymentMethod"/> Credit Card</td>
                                </tr>
                                <tr>
                                    <td class="label">Email</td>
                                    <td> <input type="email" placeholder="Email address" name="email" value="<?php echo $cust_dets['email']; ?>" required/> </td>
                                    <td class="label">Name on Card</td>
                                    <td> <input type="text" placeholder="Enter your full name on card" name="nameOnCard" required/> </td>
                                </tr>
                                <tr>
                                    <td class="label">Contact Number</td>
                                    <td> <input type="text" placeholder="Phone number" name="phoneNumber" value="<?php echo $cust_dets['phoneNumber']; ?> " required/> </td>
                                    <td class="label">Credit card Number</td>
                                    <td> <input type="text" placeholder="16 digit Credit card number" name="cardNo" required/> </td>
                                </tr>
                                <tr>
                                    <td class="label">Shipping Address</td>
                                    <td> <input type="text" placeholder="Shipping address" name="address" value="<?php echo $cust_dets['address']; ?> " required/> </td>
                                    <td class="label">Expiry Date</td>
                                    <td> <input type="text" placeholder="MM/YYYY" name="creditCardExpires" required/> </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="label">CVV</td>
                                    <td> <input type="text" placeholder="3 digit CVV" name="cvv" required/> </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2">
                                        <div class="payment-sum">
                                            <input type="hidden" name="totalAmount" value="<?php echo $total;?>"/>
                                            <input type="hidden" name="transactionId" value="<?php echo $transactionId;?>"/>
                                            <input type="hidden" name="custId" value="<?php echo $cid;?>"/>
                                            <div>Total Payment: <span>$<?php echo $total;?></span></div>
                                            <button class="order-button">Order</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>

                          <!-- Payment Notification Pop-Up -->
                          <div id="success" class="popup">
                            <span></span>
                            <div class="popup-content">
                                <div class="popup-successful-header">
                                    <h2>Your payment was successful</h2>
                                </div>
                                <div class="popup-successful-footer">
                                    <p>We have sent you the order confirmation to your email</p>
                                </div>
                                <button class="button popup-button" style="margin:auto;display: block; margin-top: 12px;"> <a href="cart.php">Back to Cart </a></button>
                            </div>
                        </div>
                        <div id="unsuccess" class="popup">
                            <span></span>
                            <div class="popup-content">
                                <div class="popup-unsuccessful-header">
                                    <h2>Your payment was unsuccessful</h2>
                                </div>
                                <div class="popup-unsuccessful-footer">
                                    <p>Something went wrong with the payment, please try again later!</p>
                                </div>
                                <button class="button popup-button" style="margin:auto;display: block; margin-top: 12px;"> <a href="cart.php">Back to Cart </a></button>
                            </div>
                        </div>
                                                
                    </div>
                </div>
            </div>

            <script>
                var check='<?php echo ($success); ?>'
                // alert(typeof(check))
           
                var popupsucc = document.getElementById("success");
                var popupunsucc = document.getElementById("unsuccess");
                
                var span = document.getElementById("close");

                
                if (check === 'true')
                    popupsucc.style.display = "block";
                if (check === 'false')
                    popupunsucc.style.display = "block";
                
            </script>
    </body>

    <script src="js/validateForm.js"></script>
    <script src="js/quantity.js" ></script>
    <script>
    function handleSubmit(){
        let form = document.querySelector('#place-order-form')

        try {
            var form = document.querySelector('#place-order-form')
            var fullName = form.querySelector('input[name="fullName"]').value
            var email = form.querySelector('input[name="email"]').value
            var phoneNumber = form.querySelector('input[name="phoneNumber"]').value
            var address = form.querySelector('input[name="address"]').value
            var nameOnCard = form.querySelector('input[name="nameOnCard"]').value
            var cardNo = form.querySelector('input[name="cardNo"]').value
            var cardexpiry = form.querySelector('input[name="creditCardExpires"]').value
            var cvv = form.querySelector('input[name="cvv"]').value

            let isValidated = orderVal({
                fullName, email, phoneNumber, address, nameOnCard, cardNo, cardexpiry, cvv
            })
            console.log('isValidated:' ,isValidated)
            return isValidated
        }
        catch(err) {
            console.log(err)
            return false
        }
        return false
    }
    </script>
    <footer>
            <div class="footer-fixed">
                <p>Copyright © 2022 COTB All rights reserved</p>
                <p>Terms & Conditions | Privacy Policy</p>
            </div>
        </footer>

</html>

