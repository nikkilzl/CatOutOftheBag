<html>
    <head>
        <title>Cat Out of The Bag</title>

        <link rel="stylesheet" href="css/global.css"/>
    </head>

    <body>

        <?php include 'element/navigation.php' ?>
        <?php 
            include 'php/connectdb.php'; 
            $a="";
            if(!isset($_SESSION['custId']) && isset($_POST['id']))
                $a = "LOGIN";
            else if(isset($_SESSION['custId']) && isset($_POST['id']))
            {
                $id = $_POST['id'];
                $cid = $_SESSION['custId'];
                if($_POST['type'] == "cart")
                {
                    include "php/addcart.php";   
                }
                
            }
            unset($_POST['id']); 
            //different id when page is refreshed
        ?>
        <div class="container">
                <br>
                <div class="home-hero-img">
                    <div class="home-hero-img-container">
                        <img src="assets/banner3.jpg" alt="bag banner">
                    </div>
                
                </div>

            <br>

            <h1 style="padding-left: 50px;color:#414934;">Shop Categories</h1>
            <br><br>
            <div class="flex-row justify-content-around ">
            
                        <div class="cardbox prodin">
                            
                                <img src= "https://i.pinimg.com/736x/59/e9/24/59e924e186778c02e8436ec2b4f7a37c.jpg" alt="waistbag" class="cardbox-img">
                            
                            <div class="cardbox-body"> 
                                <a href="categories.php?productCategory=waistbag" class="selectproduct">
                                    <h4 class="cardbox-title">Waistbag</h4>
                                </a>
                            </div>
                        </div>

                        <div class="cardbox prodin">
                            
                                <img src= "https://images.boardriders.com/global/billabong-products/all/default/large/jabk3bho_billabong,p_pjb0_frt1.jpg" alt="backpack" class="cardbox-img">
                            
                            <div class="cardbox-body"> 
                                <a href="categories.php?productCategory=backpack">
                                    <h4 class="cardbox-title">Backpack</h4>
                                </a>
                            </div>
                        </div>

                        <div class="cardbox prodin">
                            
                                <img src= "https://cdn.shopify.com/s/files/1/0490/4311/2086/products/billabong-along-the-way-tote-bag-bags-billabong-womens-386323.jpg?v=1659888788" alt="totebag" class="cardbox-img">
                            
                            <div class="cardbox-body"> 
                                <a href="categories.php?productCategory=totebag">
                                    <h4 class="cardbox-title">Totebag</h4>
                                </a>
                            </div>
                        </div>

                        <div class="cardbox prodin">
                            
                                <img src= "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTF-3v2AREflPiKxKHdOrJkq3cOFKarj2SuHEo4uiZKSLgeKCKVEirg-Wd7Yhm5XBM549evu7k1AI_AKs7rSqc3b5a24_NZXYKhP5b_dlydfrP1GygRqhHH&usqp=CAE" alt="handbag" class="cardbox-img">
                            
                            <div class="cardbox-body"> 
                                <a href="categories.php?productCategory=handbag">
                                    <h4 class="cardboxbox-title">Handbag</h4>
                                </a>
                            </div>
                        </div>
            
            </div>
            <br><br>
            <div class="flex-row justify-content-around ">
            
                        <div class="cardboxbox prodin">
                            
                                <img src= "https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw2bd90274/images/hi-res/2022-L3-CK6-10840462-13-1.jpg?sw=1152&sh=1536" alt="wallet" class="cardbox-img">
                            
                            <div class="cardbox-body"> 
                                <a href="categories.php?productCategory=wallet">
                                    <h4 class="cardbox-title">Wallet</h4>
                                </a>
                            </div>
                        </div>

                        <div class="cardbox prodin">
                            
                                <img src= "https://m.media-amazon.com/images/I/711o0aBaaxL._AC_SY879_.jpg" alt="luggage" class="cardbox-img">
                            
                            <div class="cardbox-body"> 
                                <a href="categories.php?productCategory=luggage">
                                    <h4 class="cardbox-title">Luggage</h4>
                                </a>
                            </div>
                        </div>

                        <div class="cardbox prodin" style="background-color:#ede1d5;border:none;">
                        </div>

                        <div class="cardbox prodin" style="background-color:#ede1d5;border:none;">
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