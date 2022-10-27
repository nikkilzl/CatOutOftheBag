<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Out Of The Bag</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/headerfooter.css" />
    
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

    <div class="categories-wrapper">
        <div class="categories-card">
            <img src="assets/waistbag/herschelWB.jpg">
            <p>Waist Bags</p>

        </div>
        <div class="categories-card">
            <img src="assets/backpack/billabongBP_bluecanvas.jpg">
            <p>Backpacks</p>

        </div>
        <div class="categories-card">
            <img src="assets/totebag/billabongTB_canvasblue.jpg">
            <p>Tote Bags</p>

        </div>
        <div class="categories-card">
            <img src="assets/handbag/CNK_Wgabinenavy.jpg">
            <p>Handbags</p>

        </div>
    </div>

    <div class="categories-wrapper">
        <div class="categories-card">
            <img src="assets/wallet/CNK_beadstrawberry.jpg">
            <p>Wallets</p>

        </div>
        <div class="categories-card">
            <img src="assets/luggage/billabongL_blackduffel.jpg">
            <p>Luggage</p>

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