<!-- <section class="blogs" id="blogs">

    <h1 class="heading"><span>Our Blogs</span></h1>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

            <?php
            $select_blogs = "SELECT * FROM blogs;";
            $get_blogs = mysqli_query($connect, $select_blogs);
            if (mysqli_num_rows($get_blogs) > 0) {
                while ($row = mysqli_fetch_assoc($get_blogs)) {
                    echo '
                
                <div class="swiper-slide box">
                    <div class="image">
                        <img src="blog-images/' . $row['image'] . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . $row['title'] . '</h3>
                        <p>' . $row['content'] . '</p>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>
        
                ';
                }
            }
            ?>

        </div>
    </div>

</section> -->