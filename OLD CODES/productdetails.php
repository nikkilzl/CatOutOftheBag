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
                <a class="user-icon" href="">
                    <img src="assets/icon/shoppingcart.png" alt="cart-icon">
                </a>
                <a class="cart-icon" href="index.html">
                    <img src="assets/icon/user.png" alt="user-icon">
                </a>
            </div>
    
        </div>


    </header>

    <div class="homepage-banner">
        <div class="homepage-banner-container">
            <img src="assets/icon/banner.jpg" alt="bag banner">
        </div>
        <div class="banner-content">
            <h1>Always Good to Go.</h1>
            <h3>Pick your favourites for a fun night with friends.</h3>
            <br><br><br><br><br><br><br>
            <a href="product.php"><button>Shop All</button></a>
        </div>   
    </div>

    <h1 style="padding-left: 50px;color:#414934;">Shop Categories</h1>



    <footer>
        <div class="footer-fixed">
            <p>Copyright © 2022 COTB All rights reserved</p>
            <p>Terms & Conditions | Privacy Policy</p>
        </div>
    </footer>


</body>
</html>