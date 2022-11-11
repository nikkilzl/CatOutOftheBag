<html>
    <?php 
        $success=0;
        if(isset($_POST['success']) && !empty($_POST['success']))
            $success = $_POST['success']; 

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
            $getcust = "SELECT * FROM custdets where custId=$cid";
	$custdets = $mysqli->query($getcust);
            $custdets = $custdets->fetch_assoc();

            $transac = "SELECT * FROM `transaction` , `cartItem`,`Product` WHERE `transaction`.`transactionId` = `cartItem`.`transactionId` and `cartItem`.`productId` = `Product`.`productId` and custId=$cid and `paid`=0";
            $result = $mysqli->query($transac);
        ?>
            <div class="checkpage page">
                <div class="containertitle">
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
                                    while($sessrow = $result->fetch_assoc()){
                                        $totalamt+=$sessrow['price']*$sessrow'quantity'];
                                        $transactionId  = $sessrow['transactionId'];
                                        echo '
                                        <tr>
                                            <td class="product-display"> 
                                                <img src="'.$sessrow['image'].'" />
                                                <span>'. $sessrow['name'] .'<span>
                                            </td>
                                            <td>$'. $sessrow['price'] .'</td>
                                            <td>'. $sessrow['quantity'] .'</td>
                                            <td>$'. ($sessrow['price']*$sessrow['quantity']) .'</td>
                                        </tr>';
                                    }
                                
                                ?>
 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="price-total">Order Total: <span>$<?php echo $totalamt; ?></span></td>
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
                                    <td> <input type="text" placeholder="Full name" name="fullName" value="<?php echo $custdets['fullName']; ?>" required/> </td>
                                    <td class="label">Payment</td>
                                    <td><input type="radio" checked name="paymentMethod"/> Credit Card</td>
                                </tr>
                                <tr>
                                    <td class="label">Email</td>
                                    <td> <input type="email" placeholder="Email address" name="email" value="<?php echo $custdets['email']; ?>" required/> </td>
                                    <td class="label">Name on Credit Card</td>
                                    <td> <input type="text" placeholder="Enter your full name on card" name="cardname" required/> </td>
                                </tr>
                                <tr>
                                    <td class="label">Contact Number</td>
                                    <td> <input type="text" placeholder="Phone number" name="phoneNumber" value="<?php echo $custdets['phoneNumber']; ?> " required/> </td>
                                    <td class="label">Credit card Number</td>
                                    <td> <input type="text" placeholder="13-16 digit Credit card number" name="cardNo" required/> </td>
                                </tr>
                                <tr>
                                    <td class="label">Shipping Address</td>
                                    <td> <input type="text" placeholder="Shipping address" name="address" value="<?php echo $custdets['address']; ?> " required/> </td>
                                    <td class="label">Expiry Date</td>
                                    <td> <input type="text" placeholder="MM/YYYY" name="cardExpiry" required/> </td>
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
                                            <div>Total Payment: <span>$<?php echo $total;?>.00</span></div>
                                            <button class="order-button">Order</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>

                          <!-- Payment Notification Pop-Up -->
                          <div id="pass" class="popup">
                            <span></span>
                            <div class="popup-content">
                                <div class="popup-successful-header">
                                    <h2>Your payment was successful</h2>
                                </div>
                                <div class="popup-successful-footer">
                                    <p>Please check your email for the order confirmation</p>
                                </div>
                                <button class="button popup-button" style="display: block; margin-top: 12px;"> <a href="cart.php">Back to Cart </a></button>
                            </div>
                        </div>
                        <div id="fail" class="popup">
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
           
                var popupsucc = document.getElementById("pass");
                var popupunsucc = document.getElementById("fail");
        
                
                if (check == 'true')
                    popupsucc.style.display = "inline-block";
                if (check == 'false')
                    popupunsucc.style.display = "inline-block";
                
            </script>
    </body>

    <script src="js/validateForm.js"></script>
    <script src="js/quantity.js" ></script>
    <script>
    function handleSubmit(){
       var form = document.getElementById('#place-order-form')

        try {
            var fullName = form.getElementsbyName('input[name="fullName"]').value
            var email = form.getElementsbyName('input[name="email"]').value
            var phoneNumber = form.getElementsbyName('input[name="phoneNumber"]').value
            var address = form.getElementsbyName('input[name="address"]').value
            var cardname = form.getElementsbyName('input[name="cardname"]').value
            var cardNo = form.getElementsbyName('input[name="cardNo"]').value
            var cardexpiry = form.getElementsbyName('input[name="cardExpiry"]').value
            var cvv = form.getElementsbyName('input[name="cvv"]').value

            let checkValidate = orderVal({
                fullName, email, phoneNumber, address, cardname, cardNo, cardexpiry, cvv
            })
            console.log('checkValidate:' ,checkValidate)
            return checkValidate
        }
        catch(error) {
            console.log(error)
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
