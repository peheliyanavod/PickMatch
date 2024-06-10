<?php
session_start();
include_once 'connection.php';
include_once 'header2.php';

if (isset($_POST['addReview'])) {
    $review = mysqli_real_escape_string($connect, $_POST['review']);
    $stars = $_POST['stars'];
    $name = $_SESSION['name'];

    $insert = "INSERT INTO reviews( `name`,review, `stars`) VALUES ('$name','$review','$stars');";
    $result_insert = mysqli_query($connect, $insert);
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
    <section id="add-blogs">
        <div class="form-container">
            <form method="post">
                <h3>Add Reviews</h3>

                <input type="text" name="review" placeholder="Add your review here" required>
                <input type="text" name="stars" placeholder="Rate us (1 - 5)" required>

                <input type="submit" name="addReview" value="Add Review" class="form-btn">
            </form>
        </div>
    </section>
</body>

</html>