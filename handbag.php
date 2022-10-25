<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Out Of The Bag</title>
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel="stylesheet" href="css/product.css">
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
                        <a href="backpack.php"><li>Backpack/li></a>
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
                <a class="user-icon" href="">
                    <img src="assets/icon/shoppingcart.png" alt="cart-icon">
                </a>
                <a class="cart-icon" href="">
                    <img src="assets/icon/user.png" alt="user-icon">
                </a>
            </div>
    
        </div>


    </header>

    <h2 style="padding-left:50px;color:#414934;margin-top:200px;">Hangbags | 5 items</h2>


    <div class="categories-wrapper">
        <div class="categories-card">
            <img src="assets/handbag/BTV_HBcanvasblue.jpg">
            <p>BTV Canvas Blue Handbag</p>
            <span><p>$70.00</p></span>

        </div>
        <div class="categories-card">
            <img src="assets/handbag/BTV_HBdumplingblack.jpg">
            <p>BTV Black Dumpling Handbag</p>
            <span><p>$79.00</p></span>

        </div>
        <div class="categories-card">
            <img src="assets/handbag/BTV_HBdumplingkhaki.jpg">
            <p>BTV Khaki Dumpling Handbag</p>
            <span><p>$79.00</p></span>

        </div>
        <div class="categories-card">
            <img src="assets/handbag/BTV_HBmicrodumplingmaroon.jpg">
            <p>BTV Maroon Dumpling Handbag</p>
            <span><p>$59.00</p></span>

        </div>
    </div>

    <div class="categories-wrapper">
        <div class="categories-card">
            <img src="assets/handbag/CNK_Wgabinenavy.jpg">
            <p>Charles & Keith Navy Handbag</p>
            <span><p>$49.00</p></span>

        </div>
        <div style="background-color:#ede1d5;" class="categories-card">
        </div>
        <div style="background-color:#ede1d5;" class="categories-card">
        </div>
        <div style="background-color:#ede1d5;" class="categories-card">
        </div>
    </div>




    <footer>
        <div class="footer-fixed">
            <p>Copyright © 2022 COTB All rights reserved</p>
            <p>Terms & Conditions | Privacy Policy</p>
        </div>
    </footer>


</body>
</html>