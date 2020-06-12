<?php
// include 'include/config.php';
include 'functions.php';
include 'include/WishList.php';
session_start();
if (!isset($_SESSION["WishList"])) {
    $_SESSION["WishList"] = new WishList();
}
$paintings = $_SESSION["WishList"]->paintings

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/assign1.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <?php include_once 'include/art-header.php' ?>

        <div class="content">
            <h2>
                Wish-List Items
            </h2>
            <table style="width:100%">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($paintings as $painting) { ?>
                    <tr>
                        <td><img src="images/square-medium/<?php echo $painting->imageFileName ?>.jpg" </td> <td><a href="single-painting.php?id=<?php echo $painting->paintingID ?>"><?php echo $painting->Title ?></td>
                        <td><a class="removeLinkStyle" href="remove-wish-list.php?id=<?php echo $painting->paintingID ?>">Remove</a></td>
                    </tr>
                <?php } ?>
            </table>
            <br>

            <a class="removeLinkStyle" href="remove-wish-list.php">Remove All Items from wish list</a>




        </div>

        <div class="bottomBar">
            <p> All Images are copyright to their owners. This is just a hypothetical site © 2020 Copyright Art store</p>
        </div>
    </div>

</body>

</html>