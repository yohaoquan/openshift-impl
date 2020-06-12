<?php

//<link href="css/topbar.css" rel="stylesheet">
session_start();
if(isset($_SESSION['paintings']))
{
    $paintings = $_SESSION['paintings'];
    }
else
{
    $paintings = array();
}
$count = count($paintings);
$_SESSION['count'] = $count;

      ?>

    <head>
        
    <div class="container">
        <nav class="navbar navbar-expand bg-dark" role="navigation">
            <div class="container-fluid row">
            <div class="text-muted col-md-5">
                Welcome to <strong>Art Store</strong>,<a class="text-light" href="#"> Login </a>or<a class="text-light" href="#"> Create new account</a>
            </div>
            
            <div class="text-muted col-md-7 d-flex flex-row-reverse">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link text-muted" href="#">My Account</a></li>
                    <li class="nav-item"><a class="nav-link text-muted" href="view-wish-list.php"><span class="oi oi-heart" title="heart" aria-hidden="true"></span> Wish List [<?php echo $count?>]</a></li>
                     <li class="nav-item"><a class="nav-link text-muted" href="#"><span class="oi oi-cart" title="cart" aria-hidden="true"></span> Shopping Cart</a></li>
                     <li class="nav-item"><a class="nav-link text-muted" href="#"><span class="oi oi-arrow-right" title="arrow-right" aria-hidden="true"></span> Checkout</a></li>
                    
                </ul>
            </div>
        </div>
        </nav>  
    </div>
    
       
        
    <div class="container">
        <div class="row">
            
                <div class="col-lg-8">
                
                <div class="navbar-header">
                    <h1 style="font-size:70px; font-family: 'Gochi Hand', cursive;">Art Store</h1>
                </div>
                    </div>
                <div class="col-lg-4 mt-3">
                    <form role="search">
                        <div class="form-group ">
                            <table>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control form-control-lg" placeholder="Search">
                                    </td>
                                    <td>
                                          <button type="submit" class="btn btn-outline-secondary navbar-right btn-lg "><span class="oi oi-magnifying-glass" title="magnifying-glass" aria-hidden="true"></span></button>
                                    </td>
                                </tr>
                            </table>
                            
                          
                        </div>
                        
                    </form>
                </div>
            
        </div>   
    </div>
        
    <div class="container">
        <nav class="navbar navbar-expand bg-light" role="navigation">
            <div class="container-fluid row">
       
            
            <div class="text-muted col-md-5">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link text-muted" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-muted" href="view-wish-list.php">About us</a></li>
                     <li class="nav-item"><a class="nav-link text-muted" href="browse-paintings.php">Art Works</a></li>
                     <li class="nav-item"><a class="nav-link text-muted" href="#">Artist</a></li>
                    <li class="dropdown"><a class="dropdown-toggle nav-link text-muted" href="#">Specials</a></li>
                </ul>
            </div>
        </div>
        </nav>  
    </div>
        
    <br/>
<!--
     <div class="Top">
            <div class="topbar">
                    <a href="#">My Account</a>
                    <a href="view-wish-list.php">Wish list</a>
                    <a href="#">Shoping Cart</a>
                    <a href="#">Checkout</a>
            </div>
        
            
            <h1 class="ArtStore">Art Store</h1>
            
             
            <div class="middlebar">
                    <a href="#">Home</a>
                    <a href="#">About Us</a>
                    <a href="browse-paintings.php">Art Works</a>
                    <a href="#">Artists</a>
            </div>
        </div>
     
-->
     
      </head>
     
   