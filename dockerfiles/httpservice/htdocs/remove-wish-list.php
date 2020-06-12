<?php
session_start();

//if(isset($_SESSION['paintings']))
//{    
//    $paintings = $_SESSION['paintings'];
//}
//else
//{
//    $paintings = array();
//}
$paintings = $_SESSION['paintings'];

$id = $_GET['id'];
echo $id;
if ($id==-1){
    unset($paintings);
    $paintings = array();
}else{
    for($i =0; $i <= count($paintings); $i++){ 
        for($j =0; $j <= $i; $j++){
            if($paintings[$i][0] == $id){
                unset($paintings[$i]);
            }
        }
}
}


//echo $key;
//unset($paintings[])

$_SESSION['paintings'] = $paintings;
//echo $paintings[0];
header("Location: view-wish-list.php");

?>
