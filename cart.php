<html>
    <head>
        <title>Cart | Cat Out of The Bag</title>
        <link rel="stylesheet" href="css/global.css"/>
        <link rel="stylesheet" href="css/nav+footer.css"/>
        <link rel="stylesheet" href="css/cart.css"/>
    </head>

    <body>
        <?php
            include('php/authoriselogin.php');
            include 'element/navigation.php';
            include 'php/connectdb.php';
        ?>

            <div class="cartpage page">
                <div class="title-container">
                    <h1>Cart</h1>
                </div>
                <?php 
                    include 'php/connectdb.php';
                    if(!isset($_SESSION['custId']))
                        echo "Please Login or sign up to continue";
                    else {
                        $cid = $_SESSION['custId'];
                        $query = "SELECT * FROM `transaction` , `cartItem`,`Product` WHERE `transaction`.`transactionId` = `cartItem`.`transactionId` and `cartItem`.`productId` = `Product`.`productId` and custId=$cid and `paid`=0";
                        $result = mysqli_query($conn, $query);
  
                ?>
                <div class="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                                $total=0;
                                $transaction_id="";
                                while($row = mysqli_fetch_assoc($result)){
                                    $total+=$row['price']*$row['quantity'];
                                    $transaction_id = $row['transactionId'];
                                    echo '
                                    <tr>
                                        <td class="product-col"> 
                                            <img src="'.$row['image'].'" alt="product"/>
                                        </td>
                                        <td>
                                            <span>
                                                <a href="productdetail.php?productId='. $row['productId']. '" class="selectproduct">    
                                                    '.$row['name'].'
                                                </a>      
                                            </span>
                                        </td>
                                        <td>'.$row['quantity'].'</td>
                                        <td>$'.$row['price'].'</td>
                                        <td>$'.($row['price']*$row['quantity']).'</td>
                                        <td>
                                            <form action="php/deletecart.php"method="POST">
                                                <input type="hidden" value="'. $row['productId']. '" name="product_id" />
                                                <input type="hidden" value="'. $row['transactionId']. '" name="transaction_id" />
                                                <input type="submit" class="delete-button" value="Delete" />
                                            </form>
                                        </td>
                                    </tr>';
                                }
                            
                            ?>
                        </tbody>
                        <tfoot>
                            <?php 
                                if($result->num_rows > 0){
                                    echo '
                                    <tr>
                                        <td colspan="5" class="total-price">Total Price: <span> $'.$total.'</span></td>
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
                                        <td class="no-product" colspan="6">Your cart is empty</td>
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