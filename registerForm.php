<?php
include_once 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $checkEmail = "SELECT * from users where email = '$email';";

    $checkEmailResult = mysqli_query($connect, $checkEmail);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        $error[] = "User Already Exists!";
    } elseif ($password != $confirmPassword) {
        $error[] = "Password Doesn't Match!";
    } else {
        $insertUser = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password');";
        mysqli_query($connect, $insertUser);
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
            <h3>Register</h3><br>
            <?php
            if (isset($error)) {
                foreach ($error as $e) {
                    echo '<span class="error-msg">' . $e . '</span>';
                }
            }
            ?>
            <input type="text" name="name" required placeholder="Name">
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Password">
            <input type="password" name="confirmPassword" required placeholder="Confirm Password">
            <input type="submit" name="submit" value="Register now" class="form-btn">
            <p>Already Have An Account? <a href="loginForm.php">Login Now</a></p>
        </form>
    </div>
</body>

</html>