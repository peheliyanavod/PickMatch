<?php
include_once 'connection.php';
include_once 'header.php';

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
    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];
        $selectProduct = "SELECT * FROM products where productID=$productID";
        $productDetails = mysqli_query($connect, $selectProduct);

        while ($details = mysqli_fetch_assoc($productDetails)) {
    ?>
            <section class="product">
                <div class="product-container">
                    <h1><?php echo $details['productName']; ?></h1>
                    <img src="product-images/<?php echo $details['image']; ?> ">
                    <h2><?php echo 'Rs.'.$details['price']; ?></h2>
                    <h2><?php echo $details['description']; ?></h2>
                    <a href="cartadd.php?productID3=<?php echo $productID ?>" class="btn">Add To Cart</a>
                </div>
            </section>


    <?php
        }
    }
    ?>




</body>

</html>