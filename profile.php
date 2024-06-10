<?php
session_start();
include_once 'connection.php';
include_once 'header2.php';
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

    <?php

    if (isset($_SESSION['userID'])) {

        $userID = $_SESSION['userID'];
        $selectUser = "SELECT * FROM users WHERE userID = '$userID';";

        $selectUserResult = mysqli_query($connect, $selectUser);

        if (mysqli_num_rows($selectUserResult) > 0) {
            $row = mysqli_fetch_assoc($selectUserResult);
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
        }
    } else {
        header('location:loginForm.php');
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:loginForm.php');
    }

    ?>

    <section id="profile">
        <div class="form-container">
            <form method="post">
                <h3>Profile</h3><br>

                <p>Name : <?php echo $name; ?></p>
                <p>Email : <?php echo $email; ?></p>

                <input type="submit" name="logout" value="Log Out" class="form-btn">
            </form>
        </div>
    </section>

</body>

</html>