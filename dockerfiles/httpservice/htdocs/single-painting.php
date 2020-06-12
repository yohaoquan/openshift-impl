<?php
// include 'include/config.php';
include 'functions.php';


$db = getDB();
$PaintingID = $_GET['id'];
$query = "SELECT Artists.*, Paintings.*, PaintingSubjects.*, Subjects.*, PaintingGenres.*, Genres.*, Shapes.*, Galleries.* FROM Artists, Paintings, PaintingSubjects, Subjects, PaintingGenres, Genres, Shapes, Galleries WHERE Artists.ArtistID = Paintings.ArtistID AND Paintings.PaintingID = PaintingSubjects.PaintingID AND PaintingSubjects.SubjectID = Subjects.SubjectID AND Paintings.PaintingID = PaintingGenres.PaintingID AND PaintingGenres.GenreID = Genres.GenreID AND Paintings.ShapeID = Shapes.ShapeID AND Paintings.GalleryID = Galleries.GalleryID AND Paintings.PaintingID = {$PaintingID} LIMIT 1";
$result = runQuery($db, $query);
if (mysqli_num_rows($result) == 0) {
    echo 'Painting Not Found.';
    return;
}
$row = mysqli_fetch_array($result)
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

        <div class="content">
            <h2>
                <?php echo $row['Title'] ?>
            </h2>
            <p>
                By <a href="#"><?php echo "{$row["FirstName"]} {$row["LastName"]}" ?></a>
            </p>
            <img class="main_img" src="images/medium/<?php echo $row["ImageFileName"]?>.jpg" alt="Painting" />
            <div class="main_content">
                <p>
                <?php echo $row["Excerpt"] ?>
                </p>
                <h3 class="price">$<?php echo $row["MSRP"] ?></h3>
                <div class="content">
                    <button class="main_btn">Add to Wishlist</button>
                    <button class="main_btn">Add to Shopping Cart</button>
                </div>

                <h3>
                    Product Details
                </h3>
                <HR />
                <p class="property_names">
                    Date:<br />
                    Medium:<br />
                    Dimensions:<br />
                    Home:<br />
                    Genres:<br />
                    Subjects:<br />
                </p>
                <p class="property_values">
                    <?php echo $row["YearOfWork"] ?><br />
                    <?php echo $row["Medium"] ?><br />
                    <?php echo $row["Width"]?>cm x <?php echo $row["Height"] ?>cm<br />
                    <a href="#"><?php echo $row["GalleryName"]?></a><br />
                    <a href="#"><?php echo $row["GenreName"]?></a><br />
                    <a href="#"><?php echo $row["SubjectName"]?></a><br />
                </p>
            </div>

            <h3>
                Similar Products
            </h3>
            <HR />
            <div class="similarP">
                <img src="images/square-medium/116010.jpg" alt="Artist Holding a Thistle" /><br />
                <a href="#">Artist Holding a Thistle</a><br />
                <button>View</button>
                <button>Wish</button>
                <button>Cart</button>
            </div>
            <div class="similarP">
                <img src="images/square-medium/120010.jpg" alt="Portrait of Eleanor of Toledo" /><br />
                <a href="#">Portrait of Eleanor of Toledo</a><br />
                <button>View</button>
                <button>Wish</button>
                <button>Cart</button>
            </div>
            <div class="similarP">
                <img src="images/square-medium/107010.jpg" alt="Madame de Pompadour" /><br />
                <a href="#">Madame de Pompadour</a><br />
                <button>View</button>
                <button>Wish</button>
                <button>Cart</button>
            </div>
            <div class="similarP">
                <img src="images/square-medium/106020.jpg" alt="Girld with a Pearl Earring" /><br />
                <a href="#">Girld with a Pearl Earring</a><br />
                <button>View</button>
                <button>Wish</button>
                <button>Cart</button>
            </div>
        </div>

        <div class="bottomBar">
            <p> All Images are copyright to their owners. This is just a hypothetical site © 2020 Copyright Art store</p>
        </div>
    </div>

</body>
</html>
