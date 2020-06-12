<?php

include 'include/WishList.php';
session_start();
if (!isset($_SESSION["WishList"])) {
    $_SESSION["WishList"] = new WishList();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    for ($x = 0; $x < count($_SESSION["WishList"]->paintings); $x++) {
        if ($id === $_SESSION["WishList"]->paintings[$x]->paintingID) {
            if ($x === 0) {
                array_shift($_SESSION["WishList"]->paintings);
            } else {
                array_splice($_SESSION["WishList"]->paintings, $x, $x);
            }
            break;
        }
    }
} else {
    $_SESSION["WishList"] = new WishList();
}

header("Location:view-wish-list.php");
