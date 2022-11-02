<html>
    <?php 
        $productCategory = $_GET['productCategory']; 
        if(!$productCategory )
            $productCategory = 'backpack' //default value
    ?>
    <head>
        <title>Category - <?php echo ucfirst($productCategory); ?></title>
        <link rel="stylesheet" href="css/index.css"/>
        <link rel="stylesheet" href="css/nav.css"/>
        <link rel="stylesheet" href="css/footer.css"/>
        <link rel="stylesheet" href="css/category.css"/>
    </head>

    <body>
        
        <?php include 'components/nav.php' ?>
        
            <div class="category-page page">
                <div class="title-container">
                    <h1><?php echo ucfirst($productCategory); ?></h1>
                </div>
                <div class="category-content content flex-row justify-content-around">
                <?php 
                    include 'php/connect.php';
                    $result = mysqli_query($conn, "SELECT * FROM product where category = '$productCategory'");
                    while($row= mysqli_fetch_assoc($result))
                    {  
                        echo '
                            <div class="card index-product">
                            
                                <img src= "'.$row['image'].'" alt="..." class="card-img">
                            
                                <div class="card-body"> 
                                    <a href="productPage.php?productId='. $row['productId']. '" class="product-link">
                                        <h5 class="card-title"> '.$row['name'].' </h5>
                                    </a>
                                    <div>
                                        <p class="card-text product-price">$'.$row['price'].'</p>
                                    </div>
                                </div>
                            </div>' ;
                    }
                    //product id accessed by product page using get variable present in the hyperlink 
                ?>
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
                case "CART_ADD" :   alert("Added to cart");
                                    break;                    
                case "CART_UPDATE" : alert("Cart updated");
                                    break;
            }   
        </script>
        <?php include 'components/footer.php' ?>
    </body>

</html>

