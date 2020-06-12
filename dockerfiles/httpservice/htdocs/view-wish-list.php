<?php

//include 'include/config.php';
include 'functions.php';


$conn = getDB();
//your code for connecting to database, etc. goese here


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment 1 - Page 1</title>



        <link href="css/reset.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/topbar.css" rel="stylesheet">
        <link href="css/Wishlist.css" rel="stylesheet">
         
          <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Spicy+Rice&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        
    </head>
    <body>

        <?php include 'include/art-header.php';?>
        <main style="overflow:auto;">
          <h2>Wish List Items</h2>
            
                <table width="500" style="overflow: auto">
                    <tr>
                        <td style="font-weight: bold;">Image</td>
                        <td style="font-weight: bold;">Title</td>
                        <td style="font-weight: bold;">Action</td>
                    </tr>
                    <?php 
                    foreach($_SESSION['paintings']as $i){
                    ?>
                    <tr>
                        <td><img src="images/square-medium/<?php echo "$i[2]" ?>.jpg"></td>
                        <td><a class = "title" href="single-painting.php?id=<?php echo $i[0];?>"><?php echo$i[1];?></a></td>
                        <td><a class ="removeLinkStyle" href="remove-wish-list.php?id=<?php echo $i[0]?>">Remove</a>
                        </td>
                    </tr>
                     <?php } ?>
                    <tr><td> </td></tr><tr><td> </td></tr>
                    <tr>
                        <br/>
                        <td><a class ="removeLinkStyle" href="remove-wish-list.php?id=-1">Remove All Items</a>
                        </td>
                    </tr>
                </table>
         
        

        </main>
    </body>
</html>
