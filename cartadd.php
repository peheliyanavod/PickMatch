<?php
session_start();
include_once 'connection.php';

if (isset($_GET['productID'])) {

    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        $productID = $_GET['productID'];
        $select_products = "SELECT * FROM products WHERE productID  = $productID;";
        $get_product = mysqli_query($connect, $select_products);
        $row = mysqli_fetch_assoc($get_product);
        $productName = $row['productName'];
        $image = $row['image'];
        $price = $row['price'];
        $quantity = $row['quantity'];

        if ($quantity < 1) {
            $displayMsg = 'Out Of Stock!';
            header('location:index.php?msg=' . $displayMsg . '');
        } else {
            $sqlcheckCart = "SELECT * FROM cart WHERE productID = $productID and userID = $userID";
            $checkcart = mysqli_query($connect, $sqlcheckCart);
            if (mysqli_num_rows($checkcart) == 0) {
                $sqlAdcart = "INSERT INTO cart (productID,userID,productName,image,price) VALUES ('$productID','$userID','$productName','$image','$price')";
                $addCart = mysqli_query($connect, $sqlAdcart);
            } else {
                $rowQty = mysqli_fetch_assoc($checkcart);
                $pQty = $rowQty['quantity'];
                $pQty++;
                $updateCart = mysqli_query($connect, "UPDATE cart SET quantity = $pQty WHERE productID = $productID");
            }
            mysqli_query($connect, "UPDATE products SET quantity = $quantity-1 WHERE productID = $productID");

            $displayMsg = 'Added To Cart Successfully!';
            header('location:index.php?msg=' . $displayMsg . '');
        }
    } else {
        $displayMsg = 'Please Log Into The System!';
        header('location:loginForm.php?msg=' . $displayMsg . '');
    }
}

if (isset($_GET['product_id'])) {
    $productID = $_GET['product_id'];
    $select_products = "SELECT * FROM products WHERE productID  = $productID;";
    $get_product = mysqli_query($connect, $select_products);
    $row = mysqli_fetch_assoc($get_product);
    $productName = $row['productName'];
    $image = $row['image'];
    $price = $row['price'];
    $userID = $_SESSION['userID'];
    $quantity = $row['quantity'];

    if ($quantity < 1) {
        $displayMsg = 'Out Of Stock!';
        header('location:index.php?msg=' . $displayMsg . '');
    } else {
        $sqlcheckCart = "SELECT * FROM cart WHERE productID = $productID";
        $checkcart = mysqli_query($connect, $sqlcheckCart);
        if (mysqli_num_rows($checkcart) == 0) {
            $sqlAdcart = "INSERT INTO cart (productID,userID,productName,image,price) VALUES ('$productID','$userID','$productName','$image','$price')";
            $addCart = mysqli_query($connect, $sqlAdcart);
            mysqli_query($connect, "DELETE FROM wishlist WHERE productID = $productID");
            $displayMsg = 'Product Removed From The Whishlist!';
            header('location:wishlistview.php?msg=' . $displayMsg . '');
        } elseif (mysqli_num_rows($checkcart) > 0) {
            $rowQty = mysqli_fetch_assoc($checkcart);
            $pQty = $rowQty['quantity'];
            $pQty++;
            $updateCart = mysqli_query($connect, "UPDATE cart SET quantity = $pQty WHERE productID = $productID");
            mysqli_query($connect, "DELETE FROM wishlist WHERE productID = $productID");
            mysqli_query($connect, "UPDATE products SET quantity = $quantity-1 WHERE productID = $productID");
            $displayMsg = 'Added To Cart Successfully!';
        }
        header('location:wishlistview.php?msg=' . $displayMsg . '');
    }
}

if (isset($_GET['productID2'])) {

    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        $productID = $_GET['productID2'];
        $select_products = "SELECT * FROM products WHERE productID  = $productID;";
        $get_product = mysqli_query($connect, $select_products);
        $row = mysqli_fetch_assoc($get_product);
        $productName = $row['productName'];
        $image = $row['image'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $category = $row['category'];

        if ($quantity < 1) {
            $displayMsg = 'Out Of Stock!';
            header('location:index.php?msg=' . $displayMsg . '');
        } else {
            $sqlcheckCart = "SELECT * FROM cart WHERE productID = $productID and userID = $userID";
            $checkcart = mysqli_query($connect, $sqlcheckCart);
            if (mysqli_num_rows($checkcart) == 0) {
                $sqlAdcart = "INSERT INTO cart (productID,userID,productName,image,price) VALUES ('$productID','$userID','$productName','$image','$price')";
                $addCart = mysqli_query($connect, $sqlAdcart);
            } else {
                $rowQty = mysqli_fetch_assoc($checkcart);
                $pQty = $rowQty['quantity'];
                $pQty++;
                $updateCart = mysqli_query($connect, "UPDATE cart SET quantity = $pQty WHERE productID = $productID");
            }
            mysqli_query($connect, "UPDATE products SET quantity = $quantity-1 WHERE productID = $productID");
            $displayMsg = 'Added To Cart Successfully!';

            header("location:allProducts.php?msg=" . $displayMsg . "");
        }
    } else {

        $displayMsg = 'Please Log Into The System!';
        header("location:loginForm.php?msg=" . $displayMsg . "");
    }
}

if (isset($_GET['productID3'])) {

    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        $productID = $_GET['productID3'];
        $select_products = "SELECT * FROM products WHERE productID  = $productID;";
        $get_product = mysqli_query($connect, $select_products);
        $row = mysqli_fetch_assoc($get_product);
        $productName = $row['productName'];
        $image = $row['image'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $category = $row['category'];

        if ($quantity < 1) {
            $displayMsg = 'Out Of Stock!';
            header('location:index.php?msg=' . $displayMsg . '');
        } else {

            $sqlcheckCart = "SELECT * FROM cart WHERE productID = $productID and userID = $userID";
            $checkcart = mysqli_query($connect, $sqlcheckCart);
            if (mysqli_num_rows($checkcart) == 0) {
                $sqlAdcart = "INSERT INTO cart (productID,userID,productName,image,price) VALUES ('$productID','$userID','$productName','$image','$price')";
                $addCart = mysqli_query($connect, $sqlAdcart);
            } else {
                $rowQty = mysqli_fetch_assoc($checkcart);
                $pQty = $rowQty['quantity'];
                $pQty++;
                $updateCart = mysqli_query($connect, "UPDATE cart SET quantity = $pQty WHERE productID = $productID");
            }
            mysqli_query($connect, "UPDATE products SET quantity = $quantity-1 WHERE productID = $productID");
            $displayMsg = 'Added To Cart Successfully!';

            header("location:index.php?msg=" . $displayMsg . "");
        }
    } else {

        $displayMsg = 'Please Log Into The System!';
        header("location:loginForm.php?msg=" . $displayMsg . "");
    }
}
