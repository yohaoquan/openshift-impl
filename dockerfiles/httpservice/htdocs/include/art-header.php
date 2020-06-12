<?php
if (!isset($_SESSION["WishList"])) {
    $_SESSION["WishList"] = new WishList();
}
echo '
<div class="topNav">
            <nav>
                <a href="#">My Account</a>
                <a href="view-wish-list.php">Wish List ('.count($_SESSION["WishList"]->paintings).')</a>
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
                <a href="/browse-paintings.php">Art Works</a>
                <a href="#">Artists</a>
            </nav>
        </div>
'
?>