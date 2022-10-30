<?php
    include 'connect.php';
    include 'authenticate.php';
    $conn->close();
?>

<nav>
<script src="../js/navigate.js"></script>
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
                        <a href="../index.php"><li>Home</li></a>
                        <a href="#"><li>About</li></a>
                        <br>
                        <li ><bold>CATEGORIES</bold></li>
                        <a href="../product.php?productCategory=backpack"><li>Backpack</li></a>
                        <a href="../product.php?productCategory=totebag"><li>Tote Bag</li></a>
                        <a href="../product.php?productCategory=handbag"><li>Handbag</li></a>
                        <a href="../product.php?productCategory=waistbag"><li>Waist Bag</li></a>
                        <a href="../product.php?productCategory=wallet"><li>Wallet</li></a>
                        <a href="../product.php?productCategory=luggage"><li>Luggage</li></a>
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
                <div class="cart-icon">
                    <a class="cart-icon" href="">
                        <img src="assets/icon/shoppingcart.png" alt="cart-icon">
                    </a>
                </div>
                <div class="account">
                    <a  class="user-icon" id="account-btn" href="#">
                        <img src="assets/icon/user.png" alt="user-icon">
                    </a>
                </div>
            </div>
            
        </div>
        <script src="../js/modal.js"></script>
        <script src="../js/navigate2.js"></script>

</header>
</nav>