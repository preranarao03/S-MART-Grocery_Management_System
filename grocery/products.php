<!DOCTYPE html>
<html>
<head>
<title>Grocery Store - Online Shopping</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom CSS -->
<style>
    body {
        background-color: #f4f8f4;
        font-size: 100%;
        font-family: 'Open Sans', sans-serif;
    }
    .agileits_header {
        background-color: #28a745;
        padding: 10px 0;
    }
    .agileits_header .button {
        background-color: #fff;
        border: 1px solid #28a745;
        color: #28a745;
        padding: 8px 15px;
        border-radius: 4px;
        margin-left: 10px;
    }
    .agileits_header .button:hover {
        background-color: #28a745;
        color: #fff;
    }
    .logo_products .w3ls_logo_products_left h1 a {
        color: #28a745;
        text-decoration: none;
        font-size: 36px;
        font-weight: 700;
    }
    .logo_products .w3ls_logo_products_left h1 a span {
        color: #6c757d;
    }
    .products-breadcrumb {
        background-color: #e9f7ef;
        padding: 10px 0;
    }
    .products-breadcrumb ul {
        list-style: none;
        padding: 0;
    }
    .products-breadcrumb ul li h4 {
        color: #28a745;
        font-weight: 600;
    }
    .table thead {
        background-color: #28a745;
        color: #fff;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-primary {
        background-color: #28a745;
        border: none;
    }
    .btn-primary:hover {
        background-color: #218838;
    }
    .w3l_header_right ul {
        list-style: none;
        padding: 0;
    }
    .w3l_header_right ul li {
        display: inline-block;
        margin-right: 15px;
    }
    .w3l_header_right ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
    }
    .fixed {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }
</style>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){        
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
</head>
    
<body>
<!-- header -->
    <div class="agileits_header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="product_list_header">  
                <form action="#" method="post" class="last">
                    <fieldset>
                        <input type="hidden" name="cmd" value="_cart" />
                        <input type="hidden" name="display" value="1" />
                        <a href="show_cart.php"><input type="button" value="View your cart" class="button" /></a>
                        <a href="index.php"><input type="button" value="Home" class="button" /></a>
                    </fieldset>
                </form>
            </div>
            <div class="w3l_header_right">
                <ul>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
<!-- script-for sticky-nav -->
    <script>
    $(document).ready(function() {
         var navoffeset=$(".agileits_header").offset().top;
         $(window).scroll(function(){
            var scrollpos=$(window).scrollTop(); 
            if(scrollpos >=navoffeset){
                $(".agileits_header").addClass("fixed");
            }else{
                $(".agileits_header").removeClass("fixed");
            }
         });
         
    });
    </script>
<!-- //script-for sticky-nav -->
    <div class="logo_products">
        <div class="container">
            <div class="w3ls_logo_products_left">
                <h1><a href="index.php"><span>Grocery</span> Store</a></h1>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //header -->
<!-- products-breadcrumb -->
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><h4>All Products</h4></li>
            </ul>
        </div>
    </div>
    <div class="container mt-4">
    <?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM products");
   
   echo '<table class="table table-bordered table-striped">';
   echo "<thead class='thead-dark'>";
   echo "<tr>";
   echo "<th scope='col'>Product ID</th>";
   echo "<th scope='col'>Category</th>";
   echo "<th scope='col'>Item Name</th>";
   echo "<th scope='col'>Cost</th>";
   echo "<th scope='col'>Available</th>";
   echo "<th scope='col'>Cart</th>";
   echo "</tr>";
   echo "</thead>";
   echo "<tbody>";
   while ($row = mysqli_fetch_array ($query)) {
      echo "<tr>";
      echo "<td>" . $row["ID"] . "</td>";
      echo "<td>" . $row["category"] . "</td>";
      echo "<td>" . $row["Item_name"] . "</td>";
      echo "<td>$" . $row["cost"] . "</td>";
      echo "<td>Y</td>";
      echo "<td><form action='add_to_cart.php' method='post' enctype='multipart/form-data'>
        <input type='hidden' name='cpid' value='" . $row["ID"] . "'/>
        <input type='hidden' name='ccost' value='" . $row["cost"] . "'/>
        <input type='submit' name='submit' value='ADD' class='btn btn-primary'/>
    </form></td>";
      echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
?>
    </div>
<!-- //products-breadcrumb -->
<!-- banner -->
    
</body>
</html>
