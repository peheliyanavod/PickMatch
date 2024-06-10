<section class="arrivals" id="arrivals">

    <h1 class="heading"><span>New Arrivals 2023</span></h1>

    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">

            <?php
            $select_products = "SELECT * FROM products;";
            $get_product = mysqli_query($connect, $select_products);
            if (mysqli_num_rows($get_product) > 0) {
                while ($row = mysqli_fetch_assoc($get_product)) {
                    $product_id = $row['productID'];
                    echo '
                
            <a href="update.php?productID=' . $product_id . '" class="swiper-slide box">
            <div class="image">
                <img src="product-images/' . $row['image'] . '" alt="">
            </div>
            <div class="content">
                <h3>' . $row['productName'] . '</h3>
                <div class="price">Rs.' . $row['price'] . '<span>Rs.' . ($row['price'] + $row['price'] * 0.2) . '</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </a> 
        
                ';
                }
            }
            ?>

        </div>
    </div>

</section>