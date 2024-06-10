<section class="reviews" id="reviews">

    <h1 class="heading"><span>Client's Reviews</span></h1>

    <div class="swiper reviews-slider">
        <div class="swiper-wrapper">


            <?php


            $select_blogs = "SELECT * FROM reviews;";
            $get_blogs = mysqli_query($connect, $select_blogs);
            if (mysqli_num_rows($get_blogs) > 0) {
                while ($row = mysqli_fetch_assoc($get_blogs)) {

                    $i = 0;
                    $stars = 0;

                    $name = $row['name'];
                    $review = $row['review'];
                    $stars = $row['stars'];

                    echo '
                    <div class="swiper-slide box">
                    <img src="images/user.jpeg" alt="">
                    <h3>' . $name . '</h3>
                    <p>' . $review . '</p>
                
                

                ';

                    echo '
    
                <div class="stars">';

                    while ($i < $stars) {
                        echo '
                    <i class="fas fa-star"></i>
                    ';
                        $i++;
                    }
                    echo
                    '</div>
                    </div>
                    ';
                }
            }
            ?>


        </div>
    </div>

</section>