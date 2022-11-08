<html>
    <head>
        <title>Cat Out of The Bag</title>
        
        <link rel="stylesheet" href="css/global.css"/>
        <link rel="stylesheet" href="css/nav+footer.css"/>
    </head>

    <body>

        <?php include 'element/navigation.php' ?>
        <?php 
            include 'php/connectdb.php'; 
            $res="";
            if(!isset($_SESSION['custId']) && isset($_POST['id']))
                $res = "LOGIN";
            else if(isset($_SESSION['custId']) && isset($_POST['id']))
            {
                $id = $_POST['id'];
                $uid = $_SESSION['custId'];
                if($_POST['type'] == "cart")
                {
                    include "php/addcart.php";   
                }
                
            }
            unset($_POST['id']); //don't want the product id to be the same if we reload the page
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
            
                        <div class="card productcard">
                            
                                <img src= "https://i.pinimg.com/736x/59/e9/24/59e924e186778c02e8436ec2b4f7a37c.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="categories.php?productCategory=waistbag" class="product-link">
                                    <h5 class="card-title">Waistbag</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card productcard">
                            
                                <img src= "https://images.boardriders.com/global/billabong-products/all/default/large/jabk3bho_billabong,p_pjb0_frt1.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="categories.php?productCategory=backpack" class="product-link">
                                    <h5 class="card-title">Backpack</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card productcard">
                            
                                <img src= "https://cdn.shopify.com/s/files/1/0490/4311/2086/products/billabong-along-the-way-tote-bag-bags-billabong-womens-386323.jpg?v=1659888788" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="categories.php?productCategory=totebag" class="product-link">
                                    <h5 class="card-title">Totebag</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card productcard">
                            
                                <img src= "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTF-3v2AREflPiKxKHdOrJkq3cOFKarj2SuHEo4uiZKSLgeKCKVEirg-Wd7Yhm5XBM549evu7k1AI_AKs7rSqc3b5a24_NZXYKhP5b_dlydfrP1GygRqhHH&usqp=CAE" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="categories.php?productCategory=handbag" class="product-link">
                                    <h5 class="card-title">Handbag</h5>
                                </a>
                            </div>
                        </div>
            
            </div>
            <br><br>
            <div class="flex-row justify-content-around ">
            
                        <div class="card productcard">
                            
                                <img src= "https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw2bd90274/images/hi-res/2022-L3-CK6-10840462-13-1.jpg?sw=1152&sh=1536" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="categories.php?productCategory=wallet" class="product-link">
                                    <h5 class="card-title">Wallet</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card productcard">
                            
                                <img src= "https://m.media-amazon.com/images/I/711o0aBaaxL._AC_SY879_.jpg" alt="..." class="card-img">
                            
                            <div class="card-body"> 
                                <a href="categories.php?productCategory=luggage" class="product-link">
                                    <h5 class="card-title">Luggage</h5>
                                </a>
                            </div>
                        </div>

                        <div class="card productcard" style="background-color:#ede1d5;border:none;">
                        </div>

                        <div class="card productcard" style="background-color:#ede1d5;border:none;">
                        </div>
            
            </div>
            <script src="js/quantity.js" ></script>
            <?php $conn->close(); ?>
        </div>
        <footer>
        <div class="footer-fixed">
            <p>Copyright © 2022 COTB All rights reserved</p>
            <p>Terms & Conditions | Privacy Policy</p>
        </div>
</footer>
    </body>

</html>