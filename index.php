<html>
    <head>
        <title>Cat Out of The Bag</title>
        <link rel="stylesheet" href="css/index.css"/>
        <link rel="stylesheet" href="css/nav.css"/>
        <link rel="stylesheet" href="css/footer.css"/>
        <link rel="stylesheet" href="css/category.css"/>
    </head>

    <body>

        <?php include 'components/nav.php' ?>
        <?php 
            include 'php/connect.php'; 
            $res="";
            if(!isset($_SESSION['custId']) && isset($_POST['id']))
                $res = "NOT_LOGGED_IN";
            else if(isset($_SESSION['custId']) && isset($_POST['id']))
            {
                $id = $_POST['id'];
                $uid = $_SESSION['custId'];
                if($_POST['type'] == "cart")
                {
                    include "php/addToCart.php";   
                }
                
            }
            unset($_POST['id']); //as we don't want the product id to be the same if we reload the page
        ?>
        <div class="container">
                <br>
                <div class="homepage-banner">
                    <div class="homepage-banner-container">
                        <img src="assets/banner3.jpg" alt="bag banner">
                    </div>
                
                </div>

            <br>

            <h1 style="padding-left: 50px;color:#414934;">Shop Categories</h1>
            <br><br>
            <div class="flex-row justify-content-around ">
            
                        <div class="card index-product">
                            
                                <img src= "assets/waistbag/herschelWB.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="category.php?productCategory=waistbag" class="product-link">
                                    <h5 class="card-title">Waistbag</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card index-product">
                            
                                <img src= "assets/backpack/billabongBP_bluecanvas.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="category.php?productCategory=backpack" class="product-link">
                                    <h5 class="card-title">Backpack</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card index-product">
                            
                                <img src= "assets/totebag/billabongTB_canvasblue.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="category.php?productCategory=totebag" class="product-link">
                                    <h5 class="card-title">Totebag</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card index-product">
                            
                                <img src= "assets/handbag/CNK_Wgabinenavy.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="category.php?productCategory=handbag" class="product-link">
                                    <h5 class="card-title">Handbag</h5>
                                </a>
                            </div>
                        </div>
            
            </div>
            <br><br>
            <div class="flex-row justify-content-around ">
            
                        <div class="card index-product">
                            
                                <img src= "assets/wallet/CNK_beadstrawberry.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="category.php?productCategory=wallet" class="product-link">
                                    <h5 class="card-title">Wallet</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card index-product">
                            
                                <img src= "assets/luggage/billabongL_blackduffel.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="category.php?productCategory=luggage" class="product-link">
                                    <h5 class="card-title">Luggage</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card index-product" style="background-color:#ede1d5;border:none;">
                        </div>

                        <div class="card index-product" style="background-color:#ede1d5;border:none;">
                        </div>
            
            </div>
            <?php $conn->close(); ?>
        </div>
        <script>
            var result = '<?php echo($res); ?>'
            switch(result){
                case "NOT_LOGGED_IN" : alert("Please login to continue");
                                        triggerModalById("login-modal");
                                        break;
                case "ALREADY_ADDED" :  alert("Already added");
                                        break;
                case "SUCCESS" :    alert("Added to wishlist");
                                    break;
                case "UNSUCCESS" :   alert("Could not add"); //not used generally 
                                    break;
                case "CART_ADD" :   alert("Added to cart");
                                    break;                    
                case "CART_UPDATE" : alert("Cart updated");
                                    break;
            }   
        </script>
        <?php include 'components/footer.php' ?>
    </body>

</html>