<html>
    <?php 
        $productCategory = $_GET['productCategory']; 
    ?>
    <head>
        <title>Category - <?php echo $productCategory; ?></title>
        <link rel="stylesheet" href="css/global.css"/>
        <link rel="stylesheet" href="css/nav+footer.css"/>
        <link rel="stylesheet" href="css/categories.css"/>
    </head>

    <body>
        
        <?php include 'element/navigation.php' ?>
        
            <div class="category-page page">
                <div class="title-container">
                    <h1><?php echo ucfirst($productCategory); ?></h1>
                </div>
                <div class="category-content content flex-row justify-content-around">
                <?php 
                    include 'php/connectdb.php';
                    $result = mysqli_query($conn, "SELECT * FROM product where category = '$productCategory'");
                    while($row= mysqli_fetch_assoc($result))
                    {  
                        echo '
                            <div class="card index-product">
                            
                                <img src= "'.$row['image'].'" alt="..." class="card-img">
                            
                                <div class="card-body"> 
                                    <a href="productdetail.php?productId='. $row['productId']. '" class="product-link">
                                        <h5 class="card-title"> '.$row['name'].' </h5>
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

