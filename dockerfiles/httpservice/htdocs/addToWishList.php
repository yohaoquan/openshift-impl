<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_SESSION['paintings']))
{
    $paintings = $_SESSION['paintings'];
    }
else
{
    $paintings = array();
}

$id = $_GET['id'];
$title = $_GET['title'];
$image = $_GET['image'];


$info = array();

$key = array_search($paintings,$info);

if($key==NULL){
    array_push($info,$id,$title,$image);
    array_push($paintings,$info);
}else{
    echo 0;
}



$_SESSION['paintings'] = $paintings;
//echo $paintings[0];
header("Location: view-wish-list.php");

?>
