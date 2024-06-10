<?php
include_once 'connection.php';
include_once 'header.php';

if (isset($_GET['remove'])) {
    $removeid = $_GET['remove'];
    $removeQuery = mysqli_query($connect, "DELETE FROM products WHERE productID = $removeid");
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

    <section class="cart">
        <table>
            <?php
            $userID = $_SESSION['userID'];

            $select_of_product = mysqli_query($connect, "SELECT * FROM products ");
            if (mysqli_num_rows($select_of_product) > 0) {
                echo '
                <h1 class="heading">Stock</h1>
                <thead>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>';

                while ($fetch_prdt = mysqli_fetch_assoc($select_of_product)) {

                    $productID = $fetch_prdt['productID'];
            ?>
                    <tr>
                        <td><?php echo $fetch_prdt['productID']; ?> </td>
                        <td><?php echo $fetch_prdt['productName']; ?> </td>
                        <td><img class="tableImage" src="product-images/<?php echo $fetch_prdt['image']; ?> "></td>
                        <td><?php echo $fetch_prdt['description']; ?> </td>
                        <td><?php echo 'Rs.'.$fetch_prdt['price']; ?> </td>
                        <td><?php echo $fetch_prdt['quantity']; ?> </td>
                        <td>
                            <a href="stock.php?remove=<?php echo $productID; ?> " onclick="return confirm('Are you sure want to delete this item')" class="cartRemove"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>

                <?php
                }
                ?>

                </tbody>
        </table>

    <?php
                echo '<div class="heading">
        </div>
        <div class="purchase">
    </div>';
            } else {
                echo '<h1 class="heading">Cart is Empty</h1>';
            }
    ?>


    </section>
</body>

</html>