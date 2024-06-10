<?php
include_once 'connection.php';
session_start();
?>

<header class="header">
    <div class="header-1">
        <a href="index.php" class="logo"><img src="images/Logo.png" alt=""></a>

        <!-- <form action="" class="search-form">
            <input type="search" name="" placeholder="Search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form> -->

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>


            <?php
            if (isset($_SESSION['userID'])) {
                echo '
                            <a href="wishlistview.php" class="fas fa-heart"></a>
                            <a href="cartview.php" class="fas fa-shopping-cart">
                            <span><sup>
                            ';
                $userID = $_SESSION['userID'];
                $itm_count_query = mysqli_query($connect, "SELECT * FROM cart WHERE userID ='$userID'");
                $itm_count = mysqli_num_rows($itm_count_query);
                if ($itm_count > 0) {
                    echo $itm_count;
                }
            }

            ?>
            </sup></span>
            </a>

            <a href="profile.php" class="fas fa-user">
                <?php
                if (isset($_SESSION['userID'])) {
                    echo $_SESSION['name'];
                }
                ?>
            </a>

        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="index.php#featured">Featured</a>
            <a href="index.php#arrivals">Arrivals</a>
            <a href="index.php#reviews">Reviews</a>
            <a href="allProducts.php">Products</a>

            <?php
            if (isset($_SESSION['userID'])) {

                $selectAdmin = "SELECT * FROM users WHERE userID = '$userID';";
                $adminResult = mysqli_query($connect, $selectAdmin);

                if (mysqli_num_rows($adminResult) > 0) {
                    $user = mysqli_fetch_assoc($adminResult);
                    $userEmail = $user['email'];

                    $checkEmail = "SELECT * FROM admins WHERE email = '$userEmail';";
                    $emailResult = mysqli_query($connect, $checkEmail);

                    if (mysqli_num_rows($emailResult) > 0) {
                        echo '<a href="adminPannel.php">Admin</a>';
                    }
                }
            }
            ?>

        </nav>
    </div>
</header>