<?php
session_start();
include_once 'connection.php';
include_once 'header2.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $checkEmail = "SELECT * from admins where email = '$email';";

    $checkEmailResult = mysqli_query($connect, $checkEmail);

    if (mysqli_num_rows($checkEmailResult) > 0) {

        $error[] = "Admin Already Exists!";
    } elseif ($password != $confirmPassword) {
        $error[] = "Password Does Not Match!";
    } else {

        $insertAdmin = "INSERT INTO admins (name,email,password) VALUES ('$name','$email','$password');";

        mysqli_query($connect, $insertAdmin);

        $insertUser = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password');";

        mysqli_query($connect, $insertUser);
    }
}

if (isset($_POST['add'])) {
    $productName = $_POST['productName'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['img']['name'];
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $imageLoc = 'product-images/' . $image;
    $temp_image = $_FILES['img']['tmp_name'];

    $insert = "INSERT INTO `products`(`productName`,`category`, `quantity`, `price`, `image`, `description`) VALUES ('$productName','$category','$quantity','$price','$image','$description');";
    $result_insert = mysqli_query($connect, $insert);

    if ($result_insert) {
        move_uploaded_file($temp_image, $imageLoc);
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

    <?php

    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        $selectSuperAdmin = "SELECT * FROM superAdmin WHERE userID = '$userID';";

        $superAdminResult = mysqli_query($connect, $selectSuperAdmin);

        if (mysqli_num_rows($superAdminResult) > 0) {
            echo '
                    
    <section id="add-admin">
        <div class="form-container">
            <form action="" method="post">
                <h3>Add Admins</h3>
                ';
    ?>
            <?php
            if (isset($error)) {
                foreach ($error as $e) {
                    echo '<span class="error-msg">' . $e . '</span>';
                }
            }
            ?><?php

                echo '

                <input type="text" name="name" required placeholder="Name">
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Password">
                <input type="password" name="confirmPassword" required placeholder="Confirm Password">

                <input type="submit" name="submit" value="Add" class="form-btn">
            </form>
        </div>
    </section>                   
                    ';
            }
        }
                ?>

            <section id="add-product">
                <div class="form-container">
                    <form enctype="multipart/form-data" method="post">
                        <h3>Add Products</h3>

                        <input type="text" name="productName" placeholder="Product Name" required>

                        <select name="category" id="category" required>
                            <option value="" selected disabled>Category</option>
                            <option value="bats">Bats</option>
                            <option value="balls">Balls</option>
                            <option value="helmets">Helmets</option>
                            <option value="pads">Pads</option>
                            <option value="bags">Bags</option>
                            <option value="gloves">Gloves</option>
                            <option value="shoes">Shoes</option>
                        </select>

                        <input type="text" name="price" placeholder="Price" required>
                        <input type="text" name="quantity" placeholder="Quantity" required>
                        <input type="file" name="img" accept="image/png,image/jpg,image/jpeg" required>
                        <input type="text" name="description" placeholder="Description" required>

                        <input type="submit" name="add" value="Add" class="form-btn">
                    </form>
                </div>
            </section>

</body>

</html>