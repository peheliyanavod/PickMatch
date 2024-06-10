<?php
include_once 'connection.php';
include_once 'header.php';


if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];

    $selectProduct = "SELECT * FROM products WHERE productID = '$productID'";
    $resultProduct = mysqli_query($connect, $selectProduct);

    $row = mysqli_fetch_assoc($resultProduct);
    $category = $row['category'];
    header("location:allProducts.php#$category");
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



    if (isset($_GET['updateName'])) {
        if (isset($_SESSION['userID'])) {

            $userID = $_SESSION['userID'];
            $selectUser = "SELECT * FROM users WHERE userID = '$userID';";

            $selectUserResult = mysqli_query($connect, $selectUser);
            $row = mysqli_fetch_assoc($selectUserResult);

            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];

            echo '
            <div class="form-container">
            <form action="" method="post">
                <h3>Edit Name</h3>
    
                <input type="text" name="name" required value="' . $name . '">
    
                <input type="submit" name="editName" value="Edit Name" class="form-btn">
    
            </form>
        </div>
            ';
        }
    }

    ?>


</body>

</html>