<html>
    <?php 
        $productCategory = $_GET['productCategory']; 
    ?>
    <head>
        <title>Category - <?php echo $productCategory; ?> | Cat Our of The Bag</title>
        <link rel="stylesheet" href="css/global.css"/>
        <link rel="stylesheet" href="css/nav+footer.css"/>
        <link rel="stylesheet" href="css/categories.css"/>
    </head>

    <body>
        
        <?php include 'element/navigation.php' ?>
        
            <div class="catpage page">
                <div class="title-container">
                    <h1><?php echo ucfirst($productCategory); ?></h1> <!-- ucfirst will uppercase the first letter-->
                </div>
                <div class="catcontent content flex-row justify-content-around">
                <?php 
                    include 'php/connectdb.php';
                    $result = mysqli_query($conn, "SELECT * FROM product WHERE category = '$productCategory'");
                    while($row= mysqli_fetch_assoc($result))
                    {  
                        echo '
                            <div class="card index-product">
                            
                                <img src= "'.$row['image'].'" class="card-img">
                            
                                <div class="card-body"> 
                                    <a href="productdetail.php?productId='. $row['productId']. '">
                                        <h4 class="card-title"> '.$row['name'].' </h4>
                                    </a>
                                    <div>
                                        <p class="card-text product-price">$'.$row['price'].'</p>
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

