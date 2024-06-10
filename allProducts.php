<?php
include_once 'connection.php';
include_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PickMatch</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="allProducts" id="allProducts">
<!-- ......................................................... -->
    <!-- massage display -->
    <?php
    if (isset($_GET['msg'])) {
        $displayMsg = $_GET['msg'];
        echo "<div class='error-msg'>
        <span>" . $displayMsg . "</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    // echo "displayMsg";
    ?>
<!-- ......................................................... -->
        <h1 class="heading"><span>PickMatch - All Products</span></h1>

        <div class="page-div">

            <?php
            $select_products = "SELECT * FROM products;";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="box">
                    <div class="icons">
                    <a href="wishlistadd.php?productID2=' . $productID . '" class="fas fa-heart"></a>
                        <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="product-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['productName'] . '</h3>
                        <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                        <a href="cartadd.php?productID2=' . $productID . '" class="btn">Add to Cart</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>


        </div>

    </section>

    <section class="allProducts" id="bats">

        <h1 class="heading"><span>Bats</span></h1>

        <div class="page-div">

            <?php
            $select_products = "SELECT * FROM products WHERE category='bats';";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="box">
                    <div class="icons">
                        <a href="wishlistadd.php?productID2=' . $productID . '" class="fas fa-heart"></a>
                        <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="product-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['productName'] . '</h3>
                        <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                        <a href="cartadd.php?productID2=' . $productID . '" class="btn">Add to Cart</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>


        </div>

    </section>

    <section class="allProducts" id="balls">

        <h1 class="heading"><span>Balls</span></h1>

        <div class="page-div">

            <?php
            $select_products = "SELECT * FROM products WHERE category='balls';";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="box">
                    <div class="icons">
                    <a href="wishlistadd.php?productID2=' . $productID . '" class="fas fa-heart"></a>
                        <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="product-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['productName'] . '</h3>
                        <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                        <a href="cartadd.php?productID2=' . $productID . '" class="btn">Add to Cart</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>


        </div>

    </section>

    <section class="allProducts" id="gloves">

        <h1 class="heading"><span>Gloves</span></h1>

        <div class="page-div">

            <?php
            $select_products = "SELECT * FROM products WHERE category='gloves';";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="box">
                    <div class="icons">
                    <a href="wishlistadd.php?productID2=' . $productID . '" class="fas fa-heart"></a>
                        <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="product-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['productName'] . '</h3>
                        <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                        <a href="cartadd.php?productID2=' . $productID . '" class="btn">Add to Cart</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>


        </div>

    </section>

    <section class="allProducts" id="helmets">

        <h1 class="heading"><span>Helmets</span></h1>

        <div class="page-div">

            <?php
            $select_products = "SELECT * FROM products WHERE category='helmets';";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="box">
                    <div class="icons">
                    <a href="wishlistadd.php?productID2=' . $productID . '" class="fas fa-heart"></a>
                        <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="product-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['productName'] . '</h3>
                        <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                        <a href="cartadd.php?productID2=' . $productID . '" class="btn">Add to Cart</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>


        </div>

    </section>

    <section class="allProducts" id="pads">

        <h1 class="heading"><span>Pads</span></h1>

        <div class="page-div">

            <?php
            $select_products = "SELECT * FROM products WHERE category='pads';";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="box">
                    <div class="icons">
                    <a href="wishlistadd.php?productID2=' . $productID . '" class="fas fa-heart"></a>
                        <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="product-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['productName'] . '</h3>
                        <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                        <a href="cartadd.php?productID2=' . $productID . '" class="btn">Add to Cart</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>


        </div>

    </section>

    <section class="allProducts" id="bags">

        <h1 class="heading"><span>Bags</span></h1>

        <div class="page-div">

            <?php
            $select_products = "SELECT * FROM products WHERE category='bags';";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="box">
                    <div class="icons">
                    <a href="wishlistadd.php?productID2=' . $productID . '" class="fas fa-heart"></a>
                        <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="product-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['productName'] . '</h3>
                        <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                        <a href="cartadd.php?productID2=' . $productID . '" class="btn">Add to Cart</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>


        </div>

    </section>

    <section class="allProducts" id="shoes">

        <h1 class="heading"><span>Shoes</span></h1>

        <div class="page-div">

            <?php
            $select_products = "SELECT * FROM products WHERE category='shoes';";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="box">
                    <div class="icons">
                    <a href="wishlistadd.php?productID2=' . $productID . '" class="fas fa-heart"></a>
                        <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="product-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['productName'] . '</h3>
                        <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                        <a href="cartadd.php?productID2=' . $productID . '" class="btn">Add to Cart</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>


        </div>

    </section>
</body>

</html>