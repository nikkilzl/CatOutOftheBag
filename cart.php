<html>
    <head>
        <title>Cart | Cat Out of The Bag</title>
        <link rel="stylesheet" href="css/global.css"/>
    </head>

    <body>
        <?php
            include('php/authoriselogin.php');
            include 'element/navigation.php';
            include 'php/connectdb.php';
        ?>

            <div class="cartpage page">
                <div class="containertitle">
                    <h1>Cart</h1>
                </div>
                <?php 
                    include 'php/connectdb.php';
                    if(!isset($_SESSION['custId']))
                        echo "Please Login or sign up to continue";
                    else {
                        $cid = $_SESSION['custId'];
                        $transacsql = "SELECT * FROM `transaction` , `cartItem`,`Product` WHERE `transaction`.`transactionId` = `cartItem`.`transactionId` and `cartItem`.`productId` = `Product`.`productId` and custId=$cid and `paid`=0";
                        $result = $mysqli->query(transacsql);
  
                ?>
                <div class="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product name</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                                <th>Delete item</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                                $total=0;
                                $transaction_id="";
                                while($cartrow = $result->fetch_assoc()){
                                    $subtotal+=$cartrow['price']*$cartrow['quantity'];
                                    $transaction_id = $cartrow['transactionId'];
                                    echo '
                                    <tr>
                                        <td class="product-col"> 
                                            <img src="'.$cartrow['image'].'" />
                                        </td>
                                        <td>
                                            <span>
                                                <a href="productdetail.php?productId='. $cartrow['productId']. '" class="selectproduct">    
                                                    '.$cartrow['name'].'
                                                </a>      
                                            </span>
                                        </td>
                                        <td>'.$cartrow['quantity'].'</td>
                                        <td>$'.$cartrow['price'].'</td>
                                        <td>$'.$subtotal.'</td>
                                        <td>
                                            <form action="php/deletecart.php"method="POST">
                                                <input type="hidden" value="'. $cartrow['productId']. '" name="product_id" />
                                                <input type="hidden" value="'. $cartrow['transactionId']. '" name="transaction_id" />
                                                <input type="submit" class="delete-button" value="Delete" />
                                            </form>
                                        </td>
                                    </tr>';
                                }
                            
                            ?>
                        </tbody>
                        <tfoot>
                            <?php 
                                if($mysqli_num_rows($result) > 0){
                                    echo '
                                    <tr>
                                        <td colspan="5" class="tot-price">Total Price: <span> $'.$total.'</span></td>
                                        <td>
                                            <form action="checkout.php" method="POST">
                                            <input type="hidden" value="<?php echo $total; ?>" name="total" />
                                            <input type="hidden" value="<?php echo $transaction_id; ?>" name="transaction_id" />
                                            <input type="submit" class="checkout-button" value="Checkout" />
                                        </td>
                                    </tr> ';
                                }
                                else{
                                    echo '
                                    <tr>
                                        <td class="emptycart" colspan="5">Your cart is empty</td>
                                    </tr>
                                    ';
                                }
                            ?>
                             
                        </tfoot>
                    </table>
                </div>
                <script src="js/quantity.js" ></script>
                <?php }
                    $conn->close();
                ?>

            </div>
            <footer>
        <div class="footer-fixed">
            <p>Copyright © 2022 COTB All rights reserved</p>
            <p>Terms & Conditions | Privacy Policy</p>
        </div>
</footer>
    </body>
</html>
