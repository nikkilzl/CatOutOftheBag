<html>
    <?php 
        $productCategory = $_GET['productCategory']; 
    ?> <!-- start php sess right at the start to get product category from database-->
    <head>
        <title>Category | Cat Out of The Bag</title>
        <!-- to get the category for the page title-->
        <link rel="stylesheet" href="css/global.css"/>

    </head>

    <body>
        
        <?php include 'element/navigation.php' ?>
        
            <div class="catpage page">
                <div class="containertitle">
                    <h1><?php echo $productCategory ?></h1>                
</div>
                <div class="catcontent content flexrow justcontentround">
                <?php 
                    include 'php/connectdb.php';
                    $results = mysqli_query($conn, "SELECT * FROM product WHERE category = '$productCategory'");
                    while($catrow=$results->fetch_assoc())
                    {  
                        echo '
                            <div class="card index-prod">
                            
                                <img src= "'.$catrow['image'].'" class="card-img">
                            
                                <div class="card-body"> 
                                    <a href="productdetail.php?productId='. $catrow['productId']. '">
                                        <h4 class="card-title"> '.$catrow['name'].' </h4>
                                    </a>
                                    <div>
                                        <p class="card-text prod-price">$'.$catrow['price'].'</p>
                                    </div>
                                </div>
                            </div>' ;
                    }
                    //product page refer to productId using GET variable 
                ?>
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

7.1.3. Products Details Page [productdetail.php]

<html>
    <head>
        <title>Product Details | Cat Out of The Bag</title>
        <link rel="stylesheet" href="css/global.css"/>

    </head>

    <body>
    
        <?php 
            include "php/cartsess.php"; 
            include "element/navigation.php";
            include "php/connectdb.php";
            $prod = "SELECT * FROM product where productId='".$_POST['productId']."'";
            $prodresult = mysqli_query($conn, $prod);
            $productrow = $prodresult->fetch_assoc();
            
            
        ?>
            <div class="container content">
                <div class="flexrow justcontent top-content">
                    <div class="prod-img">
                        <img src="<?php echo $productrow['image']; ?>" />
                    </div>
                    <div class="prod-details">
                        <div class="prod-name"><?php echo $productrow['name']; ?></div>
                        
                        <div class="prod-price"><?php echo "$".$productrow['price']; ?></div>
                        <div class="prod-qty">
                            <div class="flexrow" style="align-items: center;">

                                <label>Quantity</label>
                                <input type="number" min="1" id="count" value="1" class="count" onkeyup="setLimit(this.value, this)" onchange = "change(this.value)" />
                            </div>
                        </div><br>
                        <div class="buttons flexrow">
                            <form method="post">
                                <input type="hidden" value="<?php echo $productrow['productId']; ?>" name="id" />
                                <input type="hidden" value="cart" name="popuptype" />
                                <input type="hidden" value="1" name="quantity" id="qty" />
                                <input type="submit" class="button btnoutline" value="Add to cart" />
                            </form>
                        </div>          
                        
                    </div>
                </div>
                <div class="desc">
                    <div class="infotitle">Product Description</div>
                    <div class="productdes">
                        <?php echo $productrow['description']  ?>
                    </div>
                    
                </div>

                <hr/>

                <!-- recommend other products from the same category-->
                <div class="prod-reco">
                    <?php echo '<h1 style="margin-top:30px; margin-bottom:30px; color:#414934;">More from '. $productrow['category'].'</h1>' ?>
                    <div class="flexrow justcontentround ">
                    <?php 
                        $recprod = "SELECT * FROM `product` WHERE category='" .$productrow["category"] . "'AND productId != '". $_GET["productId"] ."'order by productId desc limit 4";
                        $result = mysqli_query($conn, $recprod);
                        // fetch row results in associative array
                        while($productrow = mysqli_fetch_assoc($result)){
                            echo '
                            <div class="cardbox">
                                
                                    <img src= "'.$productrow['image'].'"  class="card-img">
                                
                                <div class="cardbox-content">
                                <a href="productdetail.php?productId='. $productrow['productId']. '" class="selectproduct">
                                    <h5 class="cardbox-title"> '.$productrow['name'].' </h5>
                                    </a>
                                    <div>
                                        <p class="cardbox-text prod-price">$'.$productrow['price'].'</p>
                                    </div>
                                </div>
                            </div> ' ;
                        }
                        
                    ?>
                    </div>
                </div>
                <script src="js/quantity.js" ></script>
                <?php mysqli_close($conn); ?>
            </div>
            <script>
                var popres = '<?php echo($res); ?>'
                switch(popres){
                    case "LOGIN" : alert("Please login or sign up to add to cart");
                                    activatePopup("loginpopup");
                                            break;
                    case "ADDTOCART" :   alert("Item has been added to cart");
                                        break;                    
                    case "INPUTCART" : alert("Your cart has been updated");
                                        break;
                }   
            </script>
        <footer>
        <div class="footer-fixed">
            <p>Copyright © 2022 COTB All rights reserved</p>
            <p>Terms & Conditions | Privacy Policy</p>
        </div>
</footer>
    </body>

</html>

