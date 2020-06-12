<?php
//include 'include/config.php';
include 'functions.php';
$conn = getDB();
$paintingID = _get('id');
$sql = "Select Paintings.PaintingID, Paintings.ArtistID, Paintings.GalleryID, Paintings.ImageFileName, Paintings.Title, Paintings.ShapeID, Paintings.MuseumLink, Paintings.Description,Paintings.YearOfWork, Paintings.Width,Paintings.Height,Paintings.MSRP,Paintings.Medium, Artists.FirstName, Artists.LastName, Galleries.GalleryName, Galleries.GalleryCity,Galleries.GalleryNativeName, Galleries.GalleryCountry, Genres.GenreName, Subjects.SubjectName FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID INNER JOIN Galleries ON Paintings.GalleryID = Galleries.GalleryID INNER JOIN PaintingGenres ON Paintings.PaintingID = PaintingGenres.PaintingID INNER JOIN Genres ON Genres.GenreID = PaintingGenres.GenreID INNER JOIN PaintingSubjects ON PaintingSubjects.PaintingID = Paintings.PaintingID INNER JOIN Subjects ON Subjects.SubjectID = PaintingSubjects.SubjectID WHERE Paintings.PaintingID = ".$paintingID;
$result = runQuery($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--
    <link href="css/assign1.css" rel="stylesheet">
    <link href="css/topbar.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
-->
    
         <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Spicy+Rice&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <?php include 'include/art-header.php';?>
        
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                 <h1 style="font-size:27px; font-family: 'Spicy Rice',cursive;"><?php echo $row["Title"];?></h1>
                 <h2 style="font-size:15px;">By <a style="font-size:15px; font-family: 'Spicy Rice',cursive;" href="#">Louise Elisabeth Lebrun</a></h2>
            </div>
        </div>    
        <div class="row">
            
            <div class="col-lg-5">
                <div class="card">
                <img class="smileyface" src="images/medium/<?php echo $row["ImageFileName"];?>.jpg" alt="<?php /* Title  */ echo $row["Title"];?>" height="600" width="450">
                </div>
            </div>
            <div class="col-lg-7">
                 <p><?php echo $row["Description"];?></p>
                <h4 class="text-danger">$<?php echo $row["MSRP"];?></h4>
                
                 <button class="btn btn-secondary" onClick="window.location.href= 'addToWishList.php?id=<?php echo $row["PaintingID"];?>&title=<?php echo urlencode($row["Title"]);?>&image=<?php echo $row["ImageFileName"];?>'">Add to Wish List</button> 
                
                <button class="btn btn-outline-primary btn-xs">Add to Shopping Cart</button>
                
                <br/>
                <br/>
                <div class="card">
                    <div class="card-header">Product Details</div>
                    <div class="card-body">
                    <table class="table">
                                    <tr>
                                        <th>Date:</th>
                                        <td><?php echo $row["YearOfWork"];?></td>
                                    </tr>
                                    <tr>
                                        <th>Medium:</th>
                                        <td><?php echo $row["Medium"];?></td>
                                    </tr>  
                                    <tr>
                                        <th>Dimensions:</th>
                                        <td><?php echo $row["Width"];?>cm x <?php echo $row["Height"];?>cm</td>
                                    </tr> 
                                    <tr>
                                        <th>Home:</th>
                                        <td><a href="#"><?php echo $row["GalleryName"];?></a> ,<a href="#"><?php echo $row["GalleryCity"];?></a> ,<a href="#"><?php echo $row["GalleryCountry"];?></a></td>
                                    </tr>  
                                    <tr>
                                        <th>Genres:</th>
                                        <td><a href="#"><?php echo $row["GenreName"];?></a></td>
                                    </tr> 
                                    <tr>
                                        <th>Subjects:</th>
                                        <td> <a href="#"><?php echo $row["SubjectName"];?></td>
                                    </tr>     
                        </table>
                    </div>
                </div>
                
                
            </div>
        </div>
        
        
        <div class="row">
        <div class="col-lg-12">
             <h1 style="font-size:32px; font-family: 'Spicy Rice',cursive;"><br/>Similar Products</h1>
            <hr/>
            </div>
            </div>
        <div class="card-deck">     
            <div class="card align-items-center py-4">
                <img src="images/square-medium/116010.jpg" alt="Artist Holding a Thistle" height="132" width="132"><br/>
                <a class="card-text" href="#">Artist Holding a Thistle</a><br/>
                <table>
                    <tr><td><button class="btn btn-outline-secondary btn-xs">View</button>
                        </td>
                    <td><button class="btn btn-outline-secondary btn-xs">Wish</button>
                        </td>
                        <td><button class="btn btn-outline-secondary btn-xs">Cart</button>
                        </td>
                    </tr>
                  
                </table>
                
            </div>
            
            <div class="card align-items-center py-4">
                <img src="images/square-medium/120010.jpg" alt="Portrait of Eleanor of Toledo" height="132" width="132"><br/>
                <a class="card-text" href="#">Portrait of Eleanor of Toledo</a><br/>
              <table>
                    <tr><td><button class="btn btn-outline-secondary btn-xs">View</button>
                        </td>
                    <td><button class="btn btn-outline-secondary btn-xs">Wish</button>
                        </td>
                        <td><button class="btn btn-outline-secondary btn-xs">Cart</button>
                        </td>
                    </tr>
                  
                </table>
            </div>
            
           <div class="card align-items-center py-4">
                <img src="images/square-medium/107010.jpg" alt="Madame de Pompadour" height="132" width="132"><br/>
                <a class="card-text" href="#">Madame de Pompadour</a><br/>
               <table>
                    <tr><td><button class="btn btn-outline-secondary btn-xs">View</button>
                        </td>
                    <td><button class="btn btn-outline-secondary btn-xs">Wish</button>
                        </td>
                        <td><button class="btn btn-outline-secondary btn-xs">Cart</button>
                        </td>
                    </tr>
                  
                </table>
            </div>
            
            <div class="card align-items-center py-4">
                <img src="images/square-medium/106020.jpg" alt="Girld with a Pearl Earring" height="132" width="132"><br/>
                <a class="card-text" href="#">Girld with a Pearl Earring</a><br/>
              <table>
                    <tr><td><button class="btn btn-outline-secondary btn-xs">View</button>
                        </td>
                    <td><button class="btn btn-outline-secondary btn-xs">Wish</button>
                        </td>
                        <td><button class="btn btn-outline-secondary btn-xs">Cart</button>
                        </td>
                    </tr>
                  
                </table>
            </div>
         
            
        </div>
            
              <br/>
         <p class="text-light text-capitalize text-center bg-dark">All images are copyright to their owners. This is just a hypothetical sites @ 2014 Copyright Art Store
            </p>
        
       
        
    </div>
   

</body>
</html>
