<section class="featured" id="featured">

    <h1 class="heading"><span>Featured items</span></h1>

    <div class="swiper featured-slider">
        <div class="swiper-wrapper">

            <?php
            $select_products = "SELECT * FROM products;";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $productID = $row['productID'];
                    echo '
                <div class="swiper-slide box">
                <div class="icons">
                    <a href="update.php?productID=' . $productID . '" class="fas fa-search"></a>
                    <a href="wishlistadd.php?productID=' . $productID . '" class="fas fa-heart"></a>
                    <a href="productDetails.php?productID=' . $productID . '" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="product-images/' . $row['image'] . '" alt="">
                </div>
                <div class="content">
                    <h3>' . $row['productName'] . '</h3>
                    <div class="price">Rs.' . $row['price'] . ' <span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</div>
                    <a href="cartadd.php?productID=' . $productID . '" class="btn">Add to Cart</a>
                </div>
            </div>
        
                ';
                }
            }
            ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>