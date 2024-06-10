<?php
include_once 'connection.php';
session_start();
if (isset($_SESSION['userID'])) {
    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];
        $userID = $_SESSION['userID'];

        $sqlcheckWish = "SELECT * FROM wishlist WHERE userID = $userID and productID = $productID";
        $checkwish = mysqli_query($connect, $sqlcheckWish);
        if (mysqli_num_rows($checkwish) == 0) {
            $sqlAdwish = "INSERT INTO wishlist (productID,userID) VALUES ($productID,'$userID')";
            $addwish = mysqli_query($connect, $sqlAdwish);
            $displayMsg = 'Added To whishlist Successfully!';/////////////////////////////////////////
        } elseif (mysqli_num_rows($checkwish) > 0) {
            $displayMsg = "You Already added this product into the whishlist..!"; ////////////////////
        }
        header('location:index.php?msg='.$displayMsg.'#featured');//////////////////////
    }
    if (isset($_GET['productID2'])) {
        $productID = $_GET['productID2'];
        $userID = $_SESSION['userID'];

        $sqlcheckWish = "SELECT * FROM wishlist WHERE userID = $userID and productID = $productID";
        $checkwish = mysqli_query($connect, $sqlcheckWish);
        if (mysqli_num_rows($checkwish) == 0) {
            $sqlAdwish = "INSERT INTO wishlist (productID,userID) VALUES ($productID,'$userID')";
            $addwish = mysqli_query($connect, $sqlAdwish);
            $displayMsg = 'Added To whishlist Successfully!';/////////////////////////////////////////
        } elseif (mysqli_num_rows($checkwish) > 0) {
            $displayMsg = "You Already added this product into the whishlist..!"; ///////////////////////////
        }
        header('location:allProducts.php?msg='.$displayMsg.'');////////////////////////////////////
    }
} else {
    $displayMsg = 'Please login to the system!';
    header('location:loginForm.php?msg='.$displayMsg.'');
}
