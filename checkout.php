<html>
    <?php 
        $success=0;
        if(isset($_GET['success']) && !empty($_GET['success']))
            $success = $_GET['success']; 

    ?>
    <head>
        <title>Checkout - Cat Out of The Bag</title>
        <link rel="stylesheet" href="css/checkout.css"/>
        <link rel="stylesheet" href="css/global.css"/>
        <link rel="stylesheet" href="css/nav+footer.css"/>
        
    </head>

    <body>
        <?php 
            include 'php/authoriselogin.php';
            include 'element/navigation.php';
            include 'php/connectdb.php';
                   
            $uid = $_SESSION['custId'];
            $query = "SELECT * FROM CustomerDetails where custId=$uid";
            $customerDetails = mysqli_query($conn, $query);
            $customerDetails = $customerDetails->fetch_assoc();

            $query = "SELECT * FROM `Order` , `OrderItems`,`Product` WHERE `Order`.`orderId` = `OrderItems`.`orderId` and `OrderItems`.`productId` = `Product`.`productId` and custId=$uid and `paid`=0";
            $result = mysqli_query($conn, $query);

        ?>
            <div class="checkout-page page">
                <div class="title-container">
                    <h1>Checkout</h1>
                </div>
                <div class="checkout-content content">
                    <div class="order-summary">
                        <h2>Order summary</h2>
                        <table class="order-summary-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                    <th>Subtotal</th>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php
                                    $total=0;
                                    $orderId = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                        $total+=$row['price']*$row['quantity'];
                                        $orderId  = $row['orderId'];
                                        echo '
                                        <tr>
                                            <td class="product-col"> 
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
                                    <td colspan="4" class="total-price">Order Total: <span>$<?php echo $total; ?></span></td>
                                </tr>   
                            </tfoot>
                        </table>
                    </div>
                    
                </div>

                <div class="checkout-content content">
                    <div class="customer-details">
                        <h2>Customer Details</h2>
                        <form method="POST" action="php/orderproduct.php" id="place-order-form" onsubmit="return handleSubmit()">
                            <table class="customer-details-table">
                                <tr>
                                    <td class="label">Full Name</td>
                                    <td> <input type="text" placeholder="Full name" name="fullName" value="<?php echo $customerDetails['fullName']; ?>" required/> </td>
                                    <td class="label">Payment Method</td>
                                    <td><input type="radio" checked name="paymentMethod"/> Credit Card</td>
                                </tr>
                                <tr>
                                    <td class="label">Email</td>
                                    <td> <input type="email" placeholder="Email address" name="email" value="<?php echo $customerDetails['email']; ?>" required/> </td>
                                    <td class="label">Name on card</td>
                                    <td> <input type="text" placeholder="Enter your full name on card" name="nameOnCard" required/> </td>
                                </tr>
                                <tr>
                                    <td class="label">Phone Number</td>
                                    <td> <input type="text" placeholder="Phone number" name="phoneNumber" value="<?php echo $customerDetails['phoneNumber']; ?> " required/> </td>
                                    <td class="label">Credit card No.</td>
                                    <td> <input type="text" placeholder="16 digit Credit card number" name="creditCardNumber" required/> </td>
                                </tr>
                                <tr>
                                    <td class="label">Address</td>
                                    <td> <input type="text" placeholder="Shipping address" name="address" value="<?php echo $customerDetails['address']; ?> " required/> </td>
                                    <td class="label">Expires on</td>
                                    <td> <input type="text" placeholder="MM/YY" name="creditCardExpires" required/> </td>
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
                                        <div class="total-payment">
                                            <input type="hidden" name="totalAmount" value="<?php echo $total;?>"/>
                                            <input type="hidden" name="orderId" value="<?php echo $orderId;?>"/>
                                            <input type="hidden" name="custId" value="<?php echo $uid;?>"/>
                                            <div>Total Payment: <span>$<?php echo $total;?></span></div>
                                            <button class="place-order-btn">Order</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <!-- The Modal -->
                        <div id="success" class="modal">
                            <span></span>
                            <div class="modal-content">
                                <div class="modal-header-success">
                                    <h2>Your payment was successful</h2>
                                </div>
                                <div class="modal-footer-success">
                                    <p>We have sent you the order confirmation to your email</p>
                                </div>
                                <button class="btn modal-btn" style="margin:auto;display: block; margin-top: 12px;"> <a href="cart.php">Back to Cart </a></button>
                            </div>
                        </div>
                        <div id="unsuccess" class="modal">
                            <span></span>
                            <div class="modal-content">
                                <div class="modal-header-unsuccess">
                                    <h2>Your payment was unsuccessful</h2>
                                </div>
                                <div class="modal-footer-unsuccess">
                                    <p>Something went wrong with the payment, please try again later!</p>
                                </div>
                                <button class="btn modal-btn" style="margin:auto;display: block; margin-top: 12px;"> <a href="cart.php">Back to Cart </a></button>
                            </div>
                        </div>
                                                
                    </div>
                </div>
            </div>

            <script>
                var check='<?php echo ($success); ?>'
                // alert(typeof(check))
           
                var modal1 = document.getElementById("success");
                var modal2 = document.getElementById("unsuccess");
                
                var span = document.getElementById("close");

                
                if (check === 'true')
                    modal1.style.display = "block";
                if (check === 'false')
                    modal2.style.display = "block";
                
            </script>
    </body>

    <script src="js/validateForm.js"></script>
    <script src="js/quantity.js" ></script>
    <script>
    function handleSubmit(){
        let form = document.querySelector('#place-order-form')

        try {
            let form = document.querySelector('#place-order-form')
            let fullName = form.querySelector('input[name="fullName"]').value
            let email = form.querySelector('input[name="email"]').value
            let phoneNumber = form.querySelector('input[name="phoneNumber"]').value
            let address = form.querySelector('input[name="address"]').value
            let nameOnCard = form.querySelector('input[name="nameOnCard"]').value
            let creditCardNumber = form.querySelector('input[name="creditCardNumber"]').value
            let creditCardExpiresOn = form.querySelector('input[name="creditCardExpires"]').value
            let cvv = form.querySelector('input[name="cvv"]').value

            let isValidated = validatePlaceOrder({
                fullName, email, phoneNumber, address, nameOnCard, creditCardNumber, creditCardExpiresOn, cvv
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

