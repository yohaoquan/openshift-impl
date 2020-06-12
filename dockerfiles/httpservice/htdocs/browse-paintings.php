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


<!--

        <link href="css/reset.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/topbar.css" rel="stylesheet">
-->
          <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Spicy+Rice&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css"
          integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous"/>
        
    </head>
    <body>

        <?php include 'include/art-header.php';?>
        <main style="overflow:auto;">
        
        <div class="container">
            
            <div class="row">
                <div class="col-lg-4">
                     
            <section class="leftsection" style="width=600px;  margin-right:100px;">
                <form class="ui form" method="get" action="browse-paintings.php">
                    <h3>Filters</h3>

                    <div >
                        <table>
                        <tr>
                            <td>
                                 <label style=" padding-right:22px;">Artist</label>
                            </td>
                            <td>
                            <select class="custom-select  " name="artist">
                            <option value='0'>Select Artist</option>  
                            <?php  
                            $query = "SELECT ArtistID, FirstName, LastName FROM Artists ORDER BY LastName";
                            $result = runQuery($conn,$query);
                            if(mysqli_num_rows >= 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value= $row[ArtistID] >$row[LastName] </option>";
                                }
                            }

                            ?>
                        </select>
                            </td>
                            </tr>
                        </table>
                       
                        
                    </div>  
                    <br/>
                    
                    <div >
                        <table>
                        <tr>
                            <td>
                            <label>Museum</label>
                            </td>
                            <td>
                            <select class="custom-select" name="museum">
                            <option value='0'>Select Museum</option>  
                            <?php  
                            // retrieve the list of galleries name  from database and use
			    // them as the values for <option> elements
                          $query = "SELECT GalleryID,GalleryName FROM Galleries ORDER BY GalleryName";
                            $result = runQuery($conn,$query);
                            if(mysqli_num_rows >= 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value= $row[GalleryID] >$row[GalleryName]</option>";
                                }
                            }
                            ?>
                        </select>
                            </td>
                            </tr>
                        </table>
                        
                        
                    </div> 
                    <br/>
                    <div >
                        <table>
                            <tr>
                            <td>
                                 <label style="padding-right:14px;">Shape</label>
                                </td>
                                <td>
                                <select class="custom-select" name="shape">
                            <option value='0'>Select Shape</option>  

                            <?php  

                            // retrieve the different shapes from database and use
			    // them as the values for <option> elements
                                $query = "SELECT ShapeID,ShapeName FROM Shapes ORDER BY ShapeName";
                            $result = runQuery($conn,$query);
                            if(mysqli_num_rows >= 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value= $row[ShapeID] > $row[ShapeName]</option>";
                                }
                            }
                            ?>

                        </select>
                                </td>
                            </tr>
                        </table>
                       
                        
                    </div>   
                    <p> &nbsp; &nbsp;  &nbsp;   &nbsp; </p>
                    <button class="btn btn-primary btn-lg" type="submit" id="buttons" name="submit"> Filter  </button>    

                </form>    </section>

                </div>
                
                <div class="col-lg-8">
                     <section class="rightsection" >
                <h1>Paintings</h1>
                <h3 style="font-size:20px;">All Paintings [Top 20]</h3>
                <ul id="paintingsList">

                    <?php  

		    	// you need to have a while loop here that goes over the result of a query
			//depending on the question you are working on
                    
                    $artist = _get("artist");
                    $museum = _get("museum");
                    $shape = _get("shape");
                    $AP = " ";
                    if($artist != 0 && $museum ==0 && $shape ==0)
                    {
                        $AP = " WHERE Artists.ArtistID = ".$artist." ";
                    }else if($artist == 0 && $museum !=0 && $shape ==0)
                    {
                        $AP = " WHERE Paintings.GalleryID = ".$museum." ";
                    }else if($artist == 0 && $museum ==0 && $shape !=0)
                    {
                        $AP = " WHERE Paintings.ShapeID = ".$shape." ";
                    }else if($artist != 0 && $museum !=0 && $shape ==0)
                    {
                        $AP = " WHERE Artists.ArtistID = ".$artist." AND Paintings.GalleryID = ".$museum." ";
                    }else if($artist == 0 && $museum !=0 && $shape !=0)
                    {
                         $AP = " WHERE Paintings.GalleryID = ".$museum." AND Paintings.ShapeID = ".$shape." ";
                    }else if($artist != 0 && $museum !=0 && $shape !=0){
                         $AP = " WHERE Artists.ArtistID = ".$artist." AND  Paintings.GalleryID = ".$museum." AND Paintings.ShapeID = ".$shape." ";
                    }else if($artist == 0 && $museum == 0 && $shape == 0){
                         $AP = " ";
                    }
                        
                    $query = "SELECT Artists.FirstName,Artists.LastName, Paintings.PaintingID, Paintings.ImageFileName,Paintings.Title, Paintings.Excerpt, Paintings.MSRP FROM Paintings INNER JOIN Artists ON Artists.ArtistID = Paintings.ArtistID".$AP."limit 20";
                    
                   
                    
                    
                    $result = runQuery($conn,$query);
                    //if(mysqli_num_rows >= 0){
                    while($row = mysqli_fetch_assoc($result)){		
		    ?>

                    <li class="item">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="figure">

                            <a href="single-painting.php?id=<?php  /* you need the 'PaintingID' here */ 
                                     echo $row["PaintingID"];
                                     ?>">
                                <img src="images/square-medium/<?php /* you need the 'ImageFileName' here */
                                     echo $row["ImageFileName"];
                                          ?>.jpg">
                            </a>
                        </div>
                        </div>
                        <div class="col-lg-5">
                         <div class="itemright">
                            <a href="single-painting.php?id=<?php /* you need the 'PaintingID' here */ 
                                     echo $row["PaintingID"];?>">
                                <?php /* Title  */ echo $row["Title"];?></a>

                            <div><span><?php /* FirstName and LastName */
                                echo $row["FirstName"]," ", $row["LastName"];
                                ?></span></div>        


                            <div>
                                <p><?php /* Excerpt */ echo $row["Excerpt"];?></p>
                            </div>

                            <div class="meta">     
                                <strong>$<?php /*  MSRP */ echo $row["MSRP"];?></strong>        
                            </div>        
                             <br/>
                            <div class="extra" >
                                <table>
                                    <tr>
                                        <td>
                                        <a type="button" class="btn btn-primary btn-lg" href="cart.php?id=<?php echo $row[PaintingID];?>"><span class="oi oi-cart" title="cart" aria-hidden="true"></span></a>
                                        </td>
                                        <td>
                                        <a type="button" class="btn btn-primary btn-lg" href="addToWishList.php?id=<?php echo $row["PaintingID"];?>&title=<?php echo urlencode($row["Title"]);?>&image=<?php echo $row["ImageFileName"];?>"> <i><span class="oi oi-heart" title="heart" aria-hidden="true"></span></i>
                                </a>      
                                        </td>
                                    </tr>
                                </table>
                                
                                    <span> &nbsp; &nbsp; &nbsp;    </span>
                                
                                    
                                
                                <p>&nbsp;</p>
                            </div>       

                        </div> 
                        </div>
                    </div>
                        
                            
                    </li>

                    <?php
		    } 
                   // }
		    ?>

                </ul>
            </section>
                    
                    
                </div>
            </div>
            <p class="text-light text-capitalize text-center bg-dark">All images are copyright to their owners. This is just a hypothetical sites @ 2014 Copyright Art Store
            </p>
        </div>   
        </main>
        
    </body>
</html>
