<?php

include 'include/WishList.php';
session_start();
echo session_save_path().'/sess_'.session_id() . "\n";
if ( !isset($_SESSION["WishList"]) ) {
    $_SESSION["WishList"] = new WishList();
}

if (isset($_GET['id']) && isset($_GET['title']) && isset($_GET['imageName'])) {
    $paintingToAdd = new painting($_GET['id'], $_GET['title'], $_GET['imageName']);
    $_SESSION["WishList"]->paintings[] = ($paintingToAdd);
}

$painting = end($_SESSION["WishList"]->paintings);
echo 'PaintingID = ' . $painting->paintingID . ',  Title=' . $painting->Title . ', ImageName=' . $painting-> imageFileName;
header("Location:view-wish-list.php");

?>