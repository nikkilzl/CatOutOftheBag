<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Out Of The Bag</title>
    <link rel="stylesheet" href="css/stylesheet.css" />
    
</head>

<body>

    <header class="header-fixed">
        <div class="header-container">
            <div class="hamburger-menu-wrapper">
                <nav role="navigation">
                    <div id="menuToggle">
                      
                      <input type="checkbox"/> <!--Hidden checkbox is used as click reciever, to use the :checked selector on it. -->
        
                      <span></span>
                      <span></span>
                      <span></span>
                      
                      <ul id="menu">
                        <a href="index.php"><li>Home</li></a>
                        <a href="#"><li>About</li></a>
                        <br>
                        <li ><bold>CATEGORIES</bold></li>
                        <a href="product.php"><li>All Categories</li></a>
                        <a href="backpack.php"><li>Backpack</li></a>
                        <a href="totebag.php"><li>Tote Bag</li></a>
                        <a href="handbag.php"><li>Handbag</li></a>
                        <a href="waistbag.php"><li>Waist Bag</li></a>
                        <a href="wallet.php"><li>Wallet</li></a>
                        <a href="luggage.php"><li>Luggage</li></a>
                      </ul>
                    </div>
                  </nav>
            </div>

            <div class="header-logowrapper">
                <a class="header-logo" href="index.php">
                    <img src="logo1.png" alt="Cat Out of the Bag Logo">
                </a>
            </div>

            <div class="user-container">
                <a class="user-icon" href="cart.php">
                    <img src="assets/icon/shoppingcart.png" alt="cart-icon">
                </a>
                <a class="cart-icon" href="index.html">
                    <img src="assets/icon/user.png" alt="user-icon">
                </a>
            </div>
    
        </div>


    </header>


    <h1 style="padding-left:50px;color:#414934;margin-top:200px;">Shopping Cart</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Subtotal Price</th>
                    <th>Action</th>
                </tr>   
            </thead>
            <tbody>
                <tr>
                    <td class="product-col"> 
                        <img src="'.$row['image'].'" alt="product"/>
                    </td>
                    <td>
                        <span>
                            <a href="../pages/productPage.php?productId='. $row['productId']. '" class="product-link">    
                                    '.$row['name'].'
                            </a>      
                        </span>
                    </td>
                    <td>'.$row['quantity'].'</td>
                    <td>$'.$row['price'].'</td>
                    <td>$'.($row['price']*$row['quantity']).'</td>
                    <td>
                        <form action="../php/delFromCart.php"method="POST">
                            <input type="hidden" value="'. $row['productId']. '" name="product_id" />
                            <input type="hidden" value="'. $row['orderId']. '" name="order_id" />
                            <input type="submit" class="delete-btn" value="Delete" />
                        </form>
                    </td>
                </tr>
            </tbody>
            <tfoot>
            <?php 
                if($result->num_rows > 0){
                echo '
                <tr>
                    <td colspan="5" class="total-price">Total Price: <span> $'.$total.'</span></td>
                    <td>
                        <form action="../pages/checkout.php" method="POST">
                            <input type="hidden" value="<?php echo $total; ?>" name="total" />
                            <input type="hidden" value="<?php echo $order_id; ?>" name="order_id" />
                            <input type="submit" class="checkout-btn" value="Checkout" />
                    </td>
                </tr> ';
                }
                else{
                echo '
                    <tr>
                        <td class="no-product" colspan="6">No Product added to cart</td>
                        </tr>
                        ';
                }
            ?>
            </tfoot>
        </table>
    </div>

    <footer>
        <div class="footer-fixed">
            <p>Copyright © 2022 COTB All rights reserved</p>
            <p>Terms & Conditions | Privacy Policy</p>
        </div>
    </footer>


</body>
</html>