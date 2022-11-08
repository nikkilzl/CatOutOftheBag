<html>
    <head>
        <title>Shopping cart</title>
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

            <div class="shopping-cart-page page">
                <div class="title-container">
                    <h1>Shopping cart</h1>
                </div>
                <?php 
                    include 'php/connectdb.php';
                    if(!isset($_SESSION['custId']))
                        echo "Please Login to continue";
                    else {
                        $uid = $_SESSION['custId'];
                        $query = "SELECT * FROM `Order` , `OrderItems`,`Product` WHERE `Order`.`orderId` = `OrderItems`.`orderId` and `OrderItems`.`productId` = `Product`.`productId` and custId=$uid and `paid`=0";
                        $result = mysqli_query($conn, $query);
  
                ?>
                <div class="table-container content">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal Price</th>
                                <th>Action</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                                $total=0;
                                $order_id="";
                                while($row = mysqli_fetch_assoc($result)){
                                    $total+=$row['price']*$row['quantity'];
                                    $order_id = $row['orderId'];
                                    echo '
                                    <tr>
                                        <td class="product-col"> 
                                            <img src="'.$row['image'].'" alt="product"/>
                                        </td>
                                        <td>
                                            <span>
                                                <a href="productdetail.php?productId='. $row['productId']. '" class="product-link">    
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
                                                <input type="hidden" value="'. $row['orderId']. '" name="order_id" />
                                                <input type="submit" class="delete-btn" value="Delete" />
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
                                            <input type="hidden" value="<?php echo $order_id; ?>" name="order_id" />
                                            <input type="submit" class="checkout-btn" value="Checkout" />
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