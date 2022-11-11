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
