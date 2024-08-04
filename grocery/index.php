<!DOCTYPE html>
<html>
<head>
    <title>S-MART - Online Shopping</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="S-MART Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.11.1.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic'
        rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
            });
        });
    </script>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #A2CA71;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .agileits_header {
            background-color: #013220;
            border-bottom: 1px solid #eaeaea;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .product_list_header a {
            color: #fff;
            margin-right: 15px;
            text-decoration: none;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .product_list_header a:hover {
            background-color: #4CAF50;
            color: #fff;
        }

        .logo_products {
            background-color: #fff;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 40px;
            z-index: 999;
            border-bottom: 1px solid #eaeaea;
            text-align: center;
        }

        .logo_products h1 {
            margin: 0;
        }

        .logo_products h1 a {
            color: #1A5319;
            text-decoration: none;
            font-size: 32px;
            font-weight: bold;
        }

        .banner {
            padding: 170px 0;
            background: url('images/2.jpg') no-repeat center center;
            background-size: cover;
            color: #fff;
            text-align: center;
            margin-top: 120px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: row;
        }

        .banner h2 {
            font-size: 48px;
            margin: 0 20px 10px;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 5px;
        }

        .tagline {
            font-size: 24px;
            color: #ffffff;
            margin-top: 10px;
        }

        .offer {
            position: relative;
            font-size: 24px;
            color: #ffffff;
            background-color: #1A5319;
            padding: 30px 40px;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
            margin: 0 20px;
            transform: rotate(-10deg);
            display: inline-block;
        }

        .offer:hover {
            background-color: #ff9800;
            color: #013220;
            transform: rotate(0deg);
        }

        .offer::before,
        .offer::after {
            content: '';
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
        }

        .offer::before {
            border-width: 20px 20px 0 0;
            border-color: #1A5319 transparent transparent transparent;
            top: -20px;
            left: 0;
            transform: rotate(-45deg);
        }

        .offer::after {
            border-width: 0 0 20px 20px;
            border-color: transparent transparent #1A5319 transparent;
            bottom: -20px;
            right: 0;
            transform: rotate(-45deg);
        }

        .offer:hover::before {
            border-color: #ff9800 transparent transparent transparent;
        }

        .offer:hover::after {
            border-color: transparent transparent #ff9800 transparent;
        }

        .w3l_banner_nav_left {
            background-color: #fff;
            padding: 20px;
            width: 25%;
            float: left;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .navbar-nav li a {
            color: #333;
            font-size: 16px;
            text-transform: capitalize;
            padding: 10px;
            display: block;
            transition: background-color 0.3s ease;
        }

        .navbar-nav li a:hover {
            background-color: #4CAF50;
            color: #fff;
        }

        .w3l_banner_nav_right {
            width: 70%;
            float: right;
            padding: 20px;
            margin-top: 20px;
            position: relative;
        }

        .slider .flexslider {
            margin: 0 auto;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .w3l_banner_nav_right_banner1 {
            background: url('images/pic.jpg') no-repeat center center;
            background-size: cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            padding: 40px;
            box-sizing: border-box;
        }

        .w3l_banner_nav_right_banner1 h3 {
            font-size: 36px;
            color: #fff;
            margin-bottom: 20px;
        }

        .more {
            margin-top: 20px;
            text-align: center;
        }

        .more a {
            color: #fff;
            background-color: #ff9800;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .more a:hover {
            background-color: #ff5722;
        }

        h1 {
            color: #333;
            font-weight: 600;
            margin: 20px 0;
            text-align: center;
        }

        .search-container {
            display: flex;
            justify-content: space-around;
            align-items: stretch;
            margin-top: 40px;
            gap: 20px;
            flex-wrap: wrap;
        }

        .search-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }

        .clearfix {
            clear: both;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
    </style>
</head>

<body>
    <!-- header -->
    <div class="agileits_header">
        <div class="product_list_header">
            <a href="show_cart.php">View your cart</a>
            <a href="index1.html">Logout</a>
        </div>
    </div>
    <!-- logo -->
    <div class="logo_products">
        <div class="container">
            <h1><a href="products.php">S-MART</a></h1>
        </div>
    </div>
    <!-- banner -->
    <div class="banner">
        <div class="offer">Great Offers!</div>
        <div>
            <h2>Welcome to Our Online Grocery Store</h2>
            <div class="tagline">Ghar baithey, sabzi mandi ka maza!</div>
        </div>
        <div class="offer">40% Off!</div>
    </div>

    <div class="container">
        <div class="w3l_banner_nav_left">
            <nav class="navbar nav_bottom">
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                        data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav nav_1">
                        <li><a href="products.php">All Products</a></li>
                        <li><a href="show_cart.php">My Cart</a></li>
                        <li><a href="cos_transaction.php">Transaction History</a></li>
                        <li><a href="#search_products_itname">Search by Item Name</a></li>
                        <li><a href="#search_products_range">Search by Price Range</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="w3l_banner_nav_right">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="w3l_banner_nav_right_banner1">
                                <h3>Special <span>Summer</span> Sale</h3>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <div class="more">
                <a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
            </div>

            <div class="search-container">
                <div class="search-form" id="search_products_itname">
                    <form action="search_products_itname.php" method="post">
                        <input type="text" name="sitem_name" placeholder="Item Name" />
                        <input type="submit" name="submit" value="Search by Item Name" />
                    </form>
                </div>

                <div class="search-form" id="search_products_range">
                    <form action="search_products_range.php" method="post">
                        <input type="number" name="sitem_price_st" placeholder="Start Price" />
                        <input type="number" name="sitem_price_end" placeholder="End Price" />
                        <input type="submit" name="submit" value="Search by Price Range" />
                    </form>
                </div>
            </div>

            <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
            <script defer src="js/jquery.flexslider.js"></script>
            <script type="text/javascript">
                $(window).load(function () {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function (slider) {
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>
        </div>
        <div class="clearfix"></div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
</body>
</html>
