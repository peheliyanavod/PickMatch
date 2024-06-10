<?php
include_once 'connection.php';
include_once 'header.php';
if (isset($_GET['remove'])) {
    $removeid = $_GET['remove'];
    mysqli_query($connect, "DELETE FROM wishlist WHERE productID = $removeid");
    $displayMsg = 'Product removed from the whishlist Successfully!';//////////////////////////////////////////////

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="wishlist">
        <!-- ......................................................... -->
    <?php
    // $displayMsg = $_GET['msg'];
    if (isset($displayMsg)) {
        echo "<div class='error-msg'>
        <span>" . $displayMsg . "</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    ?>
<!-- ......................................................... -->
<!-- ......................................................... -->
    <!-- massage display -->
    <?php
    if (isset($_GET['msg'])) {
        $displayMsg = $_GET['msg'];
        echo "<div class='error-msg'>
        <span>" . $displayMsg . "</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    // echo "displayMsg";
    ?>
<!-- ......................................................... -->
        <table>
            <?php
            $wsql = "SELECT * FROM wishlist where userid = $userID";
            $wishlistQuery = mysqli_query($connect, $wsql);
            if (mysqli_num_rows($wishlistQuery) > 0) {
                echo '
                <h1 class="heading">My Wishlist</h1>
                <thead>
                        <th>No</th>
                        <th>Product Image</th>
                        <th>Product Details</th>
                        <th>Action</th>
                    </thead>
                    <tbody>';
                $i = 1;

                while ($row = mysqli_fetch_assoc($wishlistQuery)) {
                    $productID = $row['productID'];
                    $wishPdcDetails = mysqli_query($connect, "SELECT * FROM products WHERE productID = '$productID' ;");
                    $fetch_wish = mysqli_fetch_assoc($wishPdcDetails);
            ?>
                    <tbody>
                        <td><?php echo $i++; ?></td>
                        <td><img class="tableImage" src="product-images/<?php echo $fetch_wish['image']; ?>" alt="photo"></td>
                        <td>
                            <div>
                                <p><?php echo $fetch_wish['productName']; ?></p>
                                <p><?php echo $fetch_wish['description']; ?></p>
                                <p><?php echo $fetch_wish['price']; ?></p>
                            </div>
                        </td>
                        <td>
                            <p><a href="wishlistview.php?remove=<?php echo $productID; ?> " onclick="return confirm('Are you sure want to delete this item')" class="btn">Remove</a></p>
                            <p><a href="cartadd.php?product_id=<?php echo $productID; ?>" class="btn">Add to cart</a></p><?php //this should point to wishlistview page not to the index.php 
                                                                                                                        ?>
                        </td>
                    </tbody>
            <?php }
            } else {
                echo '<h1 class="heading">Whishlist is Empty</h1>';
            }


            ?>
        </table>
    </section>
</body>

</html>