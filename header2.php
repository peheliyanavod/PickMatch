<header class="header">
    <div class="header-1">
        <a href="index.php" class="logo"><img src="images/Logo.png" alt=""></a>

        <div class="icons">
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


            <?php

            if (isset($_SESSION['userID'])) {
                $userID = $_SESSION['userID'];

                $selectAdmin = "SELECT * FROM users WHERE userID = '$userID';";

                $adminResult = mysqli_query($connect, $selectAdmin);

                if (mysqli_num_rows($adminResult) > 0) {
                    $user = mysqli_fetch_assoc($adminResult);
                    $userEmail = $user['email'];

                    $checkEmail = "SELECT * FROM admins WHERE email = '$userEmail';";
                    $emailResult = mysqli_query($connect, $checkEmail);

                    if (mysqli_num_rows($emailResult) > 0) {

                        echo '<a href="adminPannel.php">Admin</a>
                                    <a href="stock.php">Stock</a>
                            ';
                    }
                }
            }
            ?>
        </nav>
    </div>
</header>