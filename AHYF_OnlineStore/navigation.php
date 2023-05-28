<?php
                $active_page = basename($_SERVER['PHP_SELF'], ".php");
                function check_title ($page_title) {
                    global $active_page;
                    if ($page_title == $active_page) {
                        return "class=\"active\"";
                    }
                }
        ?>
<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <h1>All Your Healthy Food!</h1>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                       </ul>
                   </div>

                   <div class = "navigation">
                        <ul>
                            <li><a <?php check_title("Home") ?> href="index.php">Home</a></li></li>
                            <li><a <?php check_title("Product")?> href="product.php">Shop All Products</a></li></li>
                            <!-- <li><a <?php check_title("Catalog")?> href="catalog.php">Catalogues</a></li></li> -->
                            <li><a <?php check_title("Contact")?> href="contact.php">Contact Us</a></li></li>
                        </ul>
                   </div>
               </div>
</nav>