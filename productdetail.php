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
            $query = "SELECT * FROM product where productId='".$_GET['productId']."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            
            
        ?>
            <div class="container content">
                <div class="flex-row justify-content-between top-content">
                    <div class="prod-img">
                        <img src="<?php echo $row['image']; ?>" />
                    </div>
                    <div class="prod-details">
                        <div class="prod-name"><?php echo $row['name']; ?></div>
                        
                        <div class="prod-price"><?php echo "$".$row['price']; ?></div>
                        <div class="prod-qty">
                            <div class="flex-row" style="align-items: center;">

                                <label class="input-group-text">Quantity</label>
                                <input type="number" min="1" id="count" value="1" class="count" onkeyup="setLimit(this.value, this)" onchange = "change(this.value)" />
                            </div>
                        </div><br>
                        <div class="buttons flex-row">
                            <form method="post">
                                <input type="hidden" value="<?php echo $row['productId']; ?>" name="id" />
                                <input type="hidden" value="cart" name="type" />
                                <input type="hidden" value="1" name="quantity" id="qty" />
                                <input type="submit" class="btn btn-outline-primary" value="Add to cart" />
                            </form>
                        </div>          
                        
                    </div>
                </div>
                <div class="description">
                    <div class="infotitle">Product Description</div>
                    <div class="productdes">
                        <?php echo nl2br($row['description']);    //nl2br gives a line break ?>
                    </div>
                    
                </div>

                <hr/>

                <!-- recommend other products from the same category-->
                <div class="prod-reco">
                    <?php echo '<h1 style="margin-top:30px; margin-bottom:30px; color:#414934;">More from '. $row['category'].'</h1>' ?>
                    <div class="flex-row justify-content-around ">
                    <?php 
                        $query = "SELECT * FROM `product` WHERE category='" .$row["category"] . "'AND productId != '". $_GET["productId"] ."'order by productId desc limit 4";
                        $result = $conn->query($query);
                        // fetch row results in associative array
                        while($row = $result->fetch_assoc()){
                            echo '
                            <div class="card productcard">
                                
                                    <img src= "'.$row['image'].'"  class="card-img">
                                
                                <div class="card-body">
                                <a href="productdetail.php?productId='. $row['productId']. '" class="selectproduct">
                                    <h5 class="card-title"> '.$row['name'].' </h5>
                                    </a>
                                    <div>
                                        <p class="card-text prod-price">$'.$row['price'].'</p>
                                    </div>
                                </div>
                            </div> ' ;
                        }
                        
                    ?>
                    </div>
                </div>
                <script src="js/quantity.js" ></script>
                <?php $conn->close(); ?>
            </div>
            <script>
                var result = '<?php echo($res); ?>'
                switch(result){
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

