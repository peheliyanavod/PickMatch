<?php
include_once 'connection.php';
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkUser = "SELECT * FROM users WHERE email = '$email' AND password = '$password';";
    $checkUserResult = mysqli_query($connect, $checkUser);

    if (mysqli_num_rows($checkUserResult) > 0) {
        $row = mysqli_fetch_assoc($checkUserResult);
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['name'] = $row['name'];
        header('location:index.php');
    } else {
        $error[] = 'Incorrect Username Or Password!';
    }
}

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
    <header class="header">
        <div class="header-1">
            <a href="index.php" class="logo"><img src="images/Logo.png" alt=""></a>
        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="index.php">Home</a>
            </nav>
        </div>
    </header>

    <div class="form-container">
        <form action="" method="post">
        <?php
    if (isset($_GET['msg'])) {
        $displayMsg = $_GET['msg'];
        echo "<div class='error-msg'>
        <span>" . $displayMsg . "</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    ?>
            <h3>Login</h3><br>
            <?php
            if (isset($error)) {
                foreach ($error as $e) {
                    echo '<span class="error-msg">' . $e . '</span>';
                }
            }
            ?> 
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Password">
            <input type="submit" name="submit" value="Log In" class="form-btn">
            <p>Don't Have An Account? <a href="registerForm.php">Register Now</a></p>
        </form>
    </div>


</body>

</html>