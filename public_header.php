<?php session_start(); ?>
    <!-- Head -->
    
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta-charset="utf-8">
        <title>Way To Online Shopping</title>

        <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- jQuery Validate JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
            integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg=="
            crossorigin="anonymous"></script>
        <script type="application/x-javascript"> addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);
            function hideURLbar() {
                window.scrollTo(0, 1);
            } </script>
        <!-- //Meta-Tags -->

        <!-- Custom-StyleSheet-Links -->
        <!-- Bootstrap-CSS -->
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
        <!-- Index-Page-CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
        <!-- Header-Slider-CSS -->
        <link rel="stylesheet" href="css/fluid_dg.css" id="fluid_dg-css" type="text/css" media="all">
        <!-- //Custom-StyleSheet-Links -->

        <!-- Font-Awesome-File-Links -->
        <!-- CSS -->
        <link rel="stylesheet" href="css/font-awesome.css" type="text/css" media="all">
        <!-- TTF -->
        <link rel="stylesheet" href="fonts/fontawesome-webfont.ttf" type="text/css" media="all">
        <!-- //Font-Awesome-File-Links -->

        <!-- Supportive-Modernizr-JavaScript -->
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <!-- Default-JavaScript -->
        <script src="js/jquery-2.2.3.js"></script>
        <script>
            function addtocart(id) {
                //alert(id);
                var qty = document.getElementById("pqty" + id).value;
                if (qty == "") {
                    alert("Choose Quantity First");
                }
                else {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            alert(xhttp.responseText);
                            window.location.reload();
                        }
                    };
                    xhttp.open("GET", "addcartitems.php?p=" + id + "&q=" + qty, true);
                    xhttp.send();
                }
            }
            function delete_cart(srno) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        window.location.reload();
                        alert(xhttp.responseText);
                    }
                };
                xhttp.open("GET", "delete_cartItem.php?q=" + srno, true);
                xhttp.send();

            }
            function details(id) {
                window.location.href = "product_details.php?q=" + id;
            }
            function enlarge_view(image) {
                var img = image.src;
                document.getElementById("image").src = img;
            }
            function change_img(img) {
                // alert(img);
                document.getElementById("image").src = img;
            }
        </script>
    </head>

    <div class="agileheader" id="agileitshome">
        <!-- Navigation -->
        <nav class="navbar navbar-default w3ls navbar-fixed-top">
            <div class="container">
                <div class="navbar-header wthree nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                            data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="index.php"><img src="images/logo/logo.png" style="width:46%"></a>
                    <ul class="w3header-cart">
                        <li class="wthreecartaits"><span class="my-cart-icon"><i class="fa fa-cart-arrow-down"
                                                                                 aria-hidden="true"></i>
                            <span class="badge badge-notify my-cart-badge"></span></span></li>
                    </ul>
                </div>
                <div id="bs-megadropdown-tabs" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                        <?php
                        include "connection.php";
                        $cat = "select * from category";
                        $cres = mysqli_query($conn, $cat);
                        while ($crow = mysqli_fetch_array($cres)) {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle w3-agile hyper"
                                   data-toggle="dropdown"><span> <?php echo strtoupper($crow[1]) ?> </span></a>
                                <ul class="dropdown-menu aits-w3 multi multi1">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div
                                            class="col-sm-10 w3layouts-nav-agile w3layouts-mens-nav-agileits w3layouts-mens-nav-agileits-1">
                                            <ul class="multi-column-dropdown">
                                                <li class="heading">Sub Categories</li>
                                                <?php
                                                $sub_cat = "select * from sub_category where cat_id=$crow[0]";
                                                $sc_res = mysqli_query($conn, $sub_cat);
                                                while ($sc_row = mysqli_fetch_array($sc_res)) {
                                                    ?>
                                                    <li>
                                                        <a href="productsviasubcategories.php?sc=<?php echo $sc_row[0] ?>&c=<?php echo $sc_row[3] ?>"><i
                                                                class="fa fa-angle-right"
                                                                aria-hidden="true"></i><?php echo $sc_row[1] ?></a>
                                                    </li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>

                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="wthreesearch">
                            <form action="search.php" method="post">
                                <input type="search" name="srchTxt" placeholder="Search for a Product" required="">
                                <button type="submit" class="btn btn-default search" aria-label="Left Align">
                                    <i class="fa fa-search" aria-hidden="true"></i> Search
                                </button>
                            </form>
                        </li>
                        <li class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <?php if (isset($_SESSION['cart'])) $count = count($_SESSION['cart']); else $count = 0; ?>
                        <li class="wthreecartaits wthreecartaits2 cart"><a href="user_login.php"
                                                                           style="font-size: 20px;margin: 8px 0 0;padding: 10px 10px;">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Cart (<?php echo $count ?>)</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <!-- //Navigation -->
        <!-- Header-Top-Bar-(Hidden) -->
        <div class="agileheader-topbar">
            <div class="container">
                <div class="col-sm-1" style="background: #000; text-align: center"><span style="color:#fff">Latest Deals</span> </div>
                <div class="col-md-7">
                    <marquee direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                                <?php
                                include "connection.php";
                                $deals = "select * from deals order by deals_id limit 0,5";
                                $deals_res = mysqli_query($conn, $deals);
                                while ($row = mysqli_fetch_array($deals_res)) {
                                    echo "<span style='margin-right:20%;color:red;'>$row[1] <a href='deals.php' style='color:black;cursor:pointer;padding-left:2%'>Read More..</a> </span>";
                                }
                                ?>
                    </marquee>
                </div>
                <div class="col-md-3 agileheader-topbar-grid agileheader-topbar-grid2">
                    <ul>
                        <li><a class="popup-with-zoom-anim" href="#small-dialog1">Login</a></li>
                        <li><a class="popup-with-zoom-anim" href="#small-dialog2">Sign Up</a></li>
                        <li><a href="aboutus.php">About</a></li>
                        <li><a href="contactus.php">Contact</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- Popup-Box -->
            <div id="popup1">
                <div id="small-dialog1" class="mfp-hide agileinfo">
                    <div class="pop_up">
                        <form action="user_login_action.php" method="post">
                            <h3>USER LOGIN</h3>
                            <input type="text" Name="mail" placeholder="Email" required="">
                            <input type="password" Name="password" placeholder="Password" required="">
                            <ul class="tick w3layouts agileinfo">
                                <li>
                                    <input type="checkbox" id="brand1" value="">
                                    <label for="brand1"><span></span>Remember me</label>
                                </li>
                                <li>
                                    <a href="#">Forgot Password?</a>
                                </li>
                            </ul>
                            <div class="send-button wthree agileits">
                                <input type="submit" value="LOGIN">
                            </div>
                        </form>
                    </div>
                </div>
                <div id="small-dialog2" class="mfp-hide agileinfo">
                    <div class="pop_up">
                        <form action="user_action.php" method="post">
                            <h3>USER SIGN UP</h3>
                            <input type="text" Name="name" placeholder="Full Name" required="">
                            <input type="text" Name="mail" placeholder="Email" required="">
                            <input type="password" Name="password" placeholder="Password" required="">
                            <input type="password" Name="cpassword" placeholder="Confirm Password" required="">
                            <input type="text" Name="mobile_no" placeholder="Mobile Number" required="">
                            <input type="radio" Name="gender" value="Male" id="male"><label for="male">Male</label>
                            <input type="radio" Name="gender" value="Female" id="female"><label
                                for="female">Female</label>
                            <br>
                            <div class="send-button wthree agileits">
                                <input type="submit" value="SIGN UP">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- //Popup-Box -->

        </div>
        <!-- //Header-Top-Bar-(Hidden) -->
    </div>
    <!-- //Header -->
