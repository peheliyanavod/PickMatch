<?php
include_once 'connection.php';
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



    <!-- header section -->

    <?php
    include_once 'header.php';
    ?>

    <!-- Bottom navbar -->

    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#featured" class="fas fa-list"></a>
        <a href="#arrivals" class="fas fa-tags"></a>
        <a href="#reviews" class="fas fa-comments"></a>
        <a href="#blogs" class="fas fa-blog"></a>
    </nav>

    <!-- massage display -->
    <?php
    if (isset($_GET['msg'])) {
        $displayMsg = $_GET['msg'];
        echo "<div class='error-msg'>
        <span>" . $displayMsg . "</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    ?>

    <!-- home section -->
    <?php
    include_once 'home.php';
    ?>

    <!-- icon section -->

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-paper-plane"></i>
            <div class="content">
                <h3>Free shipping</h3>
                <p>Order over $100</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>Secure payment</h3>
                <p>100% Secure payment</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>Easy returns</h3>
                <p>10 days return</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>Call us anytime</p>
            </div>
        </div>
    </section>


    <!-- featured section -->

    <?php
    include_once 'featuredItems.php';
    ?>

    <!-- newsletter section -->

    <section class="newsletter">

        <form action="">
            <!-- <h3>subscribe for lateset updates</h3>
            <input type="email" name="" placeholder="Enter your email" id="" class="box">
            <input type="submit" value="subscribe" class="btn"> -->
        </form>

    </section>

    <!-- arrivals -->

    <?php
    include_once 'arrivals.php';
    ?>

    <!-- deal section -->

    <section class="deal">

        <div class="content">
            <i class="fa-solid fa-beat">
                <h3>Deal of the day</h3>
                <h1>Upto 50% Off</h1>
            </i>

            <p>🔥 Deal of the Day! Unmissable savings on top-notch cricket gear. Grab yours before it's gone! 🏏✨ #CricketDeal</p>
            <a href="allProducts.php#bags" class="btn">Shop Now</a>
        </div>

        <div class="image">
            <img src="images/d1.jpg" alt="">
        </div>

    </section>

    <!-- reviews section -->

    <?php
    include_once 'reviews.php';
    ?>

    <!-- footer section -->

    <?php
    include_once 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="script.js"></script>

</body>

</html>