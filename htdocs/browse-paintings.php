<?php

// include 'include/config.php';
include 'functions.php';


$db = getDB();


$query = 'SELECT Paintings.Title, Paintings.PaintingID, Paintings.ImageFileName, Artists.FirstName, Artists.LastName, Paintings.Excerpt, Paintings.MSRP from Paintings, Artists WHERE Paintings.ArtistID = Artists.ArtistID ';

if (isset($_GET['artist']) && $_GET['artist'] != 0) {
    $select1 = $_GET['artist'];
    $query .= "AND Paintings.ArtistID = ";
    $query .= $select1;
    $query .= " ";
}
if (isset($_GET['museum']) && $_GET['museum'] != 0) {
    $select1 = $_GET['museum'];
    $query .= "AND Paintings.GalleryID = ";
    $query .= $select1;
    $query .= " ";
}
if (isset($_GET['shape']) && $_GET['shape'] != 0) {
    $select1 = $_GET['shape'];
    $query .= "AND Paintings.ShapeID = ";
    $query .= $select1;
    $query .= " ";
}

$query .=  "LIMIT 20";

$rightresult = runQuery($db, $query);
//your code for connecting to database, etc. goese here
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1 - Page 1</title>

    <link href="css/reset.css" rel="stylesheet">
    <link href="css/assign1.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">



</head>

<body>
    <div class="container">
        <div class="topNav">
            <nav>
                <a href="#">My Account</a>
                <a href="#">Wish List</a>
                <a href="#">Shopping Cart</a>
                <a href="#">Checkout</a>
            </nav>
        </div>

        <section class="title">
            <h1>Art Store</h1>
        </section>

        <div class="midNav">
            <nav>
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Art Works</a>
                <a href="#">Artists</a>
            </nav>
        </div>
        <main style="overflow:auto; margin-bottom:20px;">

            <section class="leftsection" style="width=600px;  margin-right:100px;">
                <form class="ui form" method="get" action="browse-paintings.php">
                    <h3>Filters</h3>

                    <div>
                        <label style=" padding-right:22px;">Artist</label>
                        <select name="artist">
                            <option value='0'>Select Artist</option>
                            <?php
                            $query = 'select ArtistID, FirstName, LastName from Artists';
                            $result = runQuery($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='{$row["ArtistID"]}'>{$row["FirstName"]} {$row["LastName"]}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Museum</label>
                        <select name="museum">
                            <option value='0'>Select Museum</option>
                            <?php
                            $query = 'select GalleryID, GalleryName from Galleries';
                            $result = runQuery($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='{$row["GalleryID"]}'>{$row["GalleryName"]}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label style="padding-right:14px;">Shape</label>
                        <select name="shape">
                            <option value='0'>Select Shape</option>

                            <?php
                            $query = 'select ShapeID, ShapeName from Shapes';
                            $result = runQuery($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='{$row["ShapeID"]}'>{$row["ShapeName"]}</option>";
                            }
                            mysqli_free_result($result);
                            ?>

                        </select>
                    </div>
                    <p> &nbsp; &nbsp; &nbsp; &nbsp; </p>
                    <button type="submit" id="buttons"> Filter </button>

                </form>
            </section>


            <section class="rightsection">
                <h1>Paintings</h1>
                <h3>All Paintings [Top 20]</h3>
                <ul id="paintingsList">

                    <?php

                    while ($row = mysqli_fetch_array($rightresult)) {


                    ?>

                        <li class="item">

                            <div class="figure">

                                <a href="single-painting.php?id=<?php echo $row['PaintingID'] ?>">
                                    <img src="images/square-medium/<?php echo $row['ImageFileName'] ?>.jpg">
                                </a>
                            </div>
                            <div class="itemright">
                                <a href="single-painting.php?id=<?php echo $row['PaintingID'] ?>">
                                    <?php echo $row['Title'] ?></a>

                                <div><span><?php echo "{$row["FirstName"]} {$row["LastName"]}" ?></span></div>


                                <div class="description">
                                    <p><?php echo $row["Excerpt"] ?></p>
                                </div>

                                <div class="meta">
                                    <strong>$<?php echo $row["MSRP"] ?></strong>
                                </div>

                                <div class="extra">
                                    <a class="favorites" href="cart.php?id=<?php echo $row['PaintingID'] ?>">Add to Shopping Cart</a>
                                    <span> &nbsp; &nbsp; &nbsp; </span>
                                    <a class="favorites" href="favorites.php?id=<?php echo $row['PaintingID'] ?>"> Add to Wish List</a>
                                    <p>&nbsp;</p>
                                </div>

                            </div>
                        </li>

                    <?php
                    }
                    mysqli_free_result($rightresult);
                    ?>

                </ul>
            </section>

        </main>
        <div class="bottomBar">
            <p> All Images are copyright to their owners. This is just a hypothetical site © 2020 Copyright Art store</p>
        </div>
    </div>
</body>

</html>