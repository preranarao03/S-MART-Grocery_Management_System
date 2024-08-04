<!DOCTYPE html>
<html>
<head>
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<!-- header -->
	<div class="agileits_header">
		
		
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                     <a href="A_add_product.php"><input type="button" value="add Item" class="button" /></a> 
					 <a href="A_delete_product.php"><input type="button" value="delete Item" class="button" /></a> 
					 <!-- <a href="stock.php"><input type="button" value="check stock" class="button" /></a> -->
					<a href="index1.html"><input type="button" value="Logout" class="button" /></a>
                </fieldset>
            </form>
		</div>
		<div class="clearfix"> </div>
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
				<h1><a href="index.html"><span></span>S-MART</a></h1>
			</div>
			
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="#products_edit"><h3>Products Database</h3></a></li>
						<li><a href="#customer"><h3>Customer</h3></a></li>
						<li><a href="#add_employee"><h3>Add Employee</h3></a></li>
						<li><a href="#All_transactions"><h3>All Transactions</h3></a></li>
						<li><a href="#search_products_itname"><h3>Search for Products Based on Item Name</h3></a></li>
						<li><a href="#search_products_range"><h3>Search for Products Based on Item Price Range</h3></a></li>
						<li><a href="#search_products_itsort"><h3>Sort Products based on price</h3></a></li>
						
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="#" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="#" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>upto <i>50%</i> off.</h3>
								<div class="more">
									<a href="#" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
	
<!-- top-brands -->
	
<!-- //top-brands -->
<!-- fresh-vegetables -->
<center><h1> PRODUCTS</h1></center>
	<div id="products_edit">
		<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM products");
   
   
      echo "<center>";
      ?><form>
 		<br/>
		<input type="text" value="ID"/>
 		<input type="text"  value="category" name="Acategory"/>
 		<input type="text"  value="Item_name" name="AItem_name"/>
 		<input type="text"  value="cost" name="Acost"/>
 		<input type="text"  value="no_of_items" name="Ano_of_items"/>
      	<input type="submit" name="submit" value="update Item"/>
    </form>
	<?php echo "</td>";
      echo "</tr>";

 while ($row = mysqli_fetch_array ($query)) {
      ?><form action="A_update_products.php" method="post">

		<input type="number" placeholder="<?php echo $row["ID"];?>" value="<?php echo $row["ID"];?>" name="Acid"/>
 		<input type="text" placeholder="<?php echo $row["category"];?>" value="<?php echo $row["category"];?>" name="Acategory"/>
 		<input type="text" placeholder="<?php echo $row["Item_name"];?>" value="<?php echo $row["Item_name"];?>" name="AItem_name"/>
 		<input type="number" placeholder="<?php echo $row["cost"];?>" value="<?php echo $row["cost"];?>" name="Acost"/>
 		<input type="number" placeholder="<?php echo $row["no_of_items"];?>" value="<?php echo $row["no_of_items"];?>" name="Ano_of_items"/>
		<input type="hidden" name="cpid" value='<?php echo $row["ID"];?>'/>
      	<input type="submit" name="submit" value="update Item"/>
    </form>
	  <?php echo "</td>";
      echo "</tr>";
  }

  echo "</table>";
  echo "</center>";
?>
	</div>

<br><br><br><center><h1>Customer List</h1></center>
<div id="customer">
		<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM customer");
   
   
            echo "<center>";
      ?><form>
 		<br/>
		<input type="text" value="ID"/>
 		<input type="text"  value="user name" />
 		<input type="text"  value="password" />
 		<input type="text"  value="phone_no" />
 		<input type="text"  value="Time_of_join" />
		<!-- <input type="submit" name="submit" value="update"/> -->
        </form>
	<?php echo "</td>";
      echo "</tr>";

 while ($row = mysqli_fetch_array ($query)) {
      
      ?><form action="A_update_customer.php" method="post">
 		
 		<input type="number" placeholder="<?php echo $row["ID"];?>" value="<?php echo $row["ID"];?>" name="Cid"/>
		<input type="text" placeholder="<?php echo $row["user"];?>" value="<?php echo $row["user"];?>" name="Cname"/>
 		<input type="text" placeholder="<?php echo $row["password"];?>" value="<?php echo $row["password"];?>" name="Cpassword"/>
 		<input type="number" placeholder="<?php echo $row["phone_no"];?>" value="<?php echo $row["phone_no"];?>" name="C_phone_number"/>
		<input type="text" placeholder="<?php echo $row["Time_of_join"];?>" value="<?php echo $row["Time_of_join"];?>" name="Ctime"/>
		     	<!-- <input type="submit" name="submit" value="Update"/> -->
    </form>
      <?php echo "</td>";
      echo "</tr>";


  }
    

  
  echo "</table>";
  echo "</center>";
?>
	</div>
<br><br><br><center><h1>Employee List</h1></center>
		<div id="add_employee">
		<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM employee");
   
		echo "<center>";
        ?><form>
 		<br/>
		<input type="text" value="ID"/>
 		<input type="text"  value="user name" />
 		<input type="text"  value="phone_no" />
 		<input type="text"  value="Time_of_join" />
		<!-- <input type="submit" name="submit" value="update"/> -->
        </form>
	<?php echo "</td>";
      echo "</tr>";

 while ($row = mysqli_fetch_array ($query)) {
      ?>
	  <form action="A_update_emp.php" method="post">
 	<!--	<input type="text" placeholder="<?php echo $row["e_password"];?>" value="<?php echo $row["e_password"];?>" name="Apassword"/>   -->
			<input type="number" placeholder="<?php echo $row["eid"];?>" value="<?php echo $row["eid"];?>" name="A_eid"/>
			<input type="text" placeholder="<?php echo $row["e_username"];?>" value="<?php echo $row["e_username"];?>" name="A_name"/>
			<input type="number" placeholder="<?php echo $row["e_phone_no"];?>" value="<?php echo $row["e_phone_no"];?>" name="A_phno"/>
			<input type="text" placeholder="<?php echo $row["e_date_join"];?>" value="<?php echo $row["e_date_join"];?>" name="A_time"/>
			<!-- <input type="submit" name="submit" value="Update"/> -->
    </form>
      <?php echo "</td>";
      echo "</tr>";


  }

  echo "<tr>";
      echo "<td colspan='4'>";
      ?><form action="add_employee.php" method="post">
 		<br/>
 		<input type="text" placeholder="Username" name="e_username"/>
 		<input type="text" placeholder="Password" name="e_password"/>
 		<input type="number" placeholder="Phone Number" name="e_phone_no"/>
      	<input type="submit" name="submit" value="Add Employee"/>
    </form>
      <?php echo "</td>";
      
      echo "</tr>";
  echo "</table>";
  echo "</center>";
?>
	</div>
<br><br><br><center><h1>All transactions</h1></center>

	<div id="All_transactions">
		<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM purchase");
   
   $Cart_total=0;
		echo "<center>";
        ?><form>
 		<br/>
		<input type="text" value="Cust ID"/>
		<input type="text" value="Prod ID"/>
 		<input type="text"  value="No of items"/>
 		<input type="text"  value="cost" />
 		<input type="text"  value="Date of Purchase" />
		</form>
	<?php echo "</td>";
      echo "</tr>";
 while ($row = mysqli_fetch_array ($query)) {
    
	  ?>
	  <form>
 			<input type="number" placeholder="<?php echo $row["pcid"];?>" value="<?php echo $row["pcid"];?>" name="A_pcid"/>
			<input type="number" placeholder="<?php echo $row["ppid"];?>" value="<?php echo $row["ppid"];?>" name="A_ppid"/>
			<input type="number" placeholder="<?php echo $row["no_of_items"];?>" value="<?php echo $row["no_of_items"];?>" name="A_no_of_items"/>
			<input type="number" placeholder="<?php echo $row["cost_of_items"];?>" value="<?php echo $row["cost_of_items"];?>" name="A_pcost_of_items"/>
			<input type="text" placeholder="<?php echo $row["date_time"];?>" value="<?php echo $row["date_time"];?>" name="A_time"/>
	    </form>
      <?php echo "</td>";
      echo "</tr>";

  }
  echo "<tr>";
  
  echo "</table>";
  echo "</center>";

?>
	</div>
<br><br><br><center><h1>SEARCH</h1></center>

<div id="search_products_range">
		<?php
  $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM products");
   
   
      echo "<center>";
      ?><table cellpadding="5" cellspacing="5">
      	<?php
      ?><form action="search_products_range.php" method="post"><br/>
		<input type="number"   name="sitem_price_st"/>
		<input type="number"   name="sitem_price_end"/>
      	<input type="submit" name="submit" value="Search For products Based on Item Price Range"/>
    </form>
      <?php echo "</td>";
      echo "</tr>";

  echo "<tr>";
      echo "<td colspan='4'>";
      ?>
      <?php echo "</td>";
      
      echo "</tr>";
  echo "</table>";
  echo "</center>";
?>
	</div>

<div id="search_products_itname">
		<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM products");
   
   
      echo "<center>";
      ?><table cellpadding="5" cellspacing="5">
      	<?php
      ?><form action="search_products_itname.php" method="post"><br/>
		<input type="text"   name="sitem_name"/>
      	<input type="submit" name="submit" value="Search For products Based on Item name"/>
    </form>
      <?php echo "</td>";
      echo "</tr>";

  echo "<tr>";
      echo "<td colspan='4'>";
      ?>
      <?php echo "</td>";
      
      echo "</tr>";
  echo "</table>";
  echo "</center>";
?>
	</div>



	<div id="search_products_itsort">
		<?php
  $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"SELECT * FROM products");
   
   
      echo "<center>";
      ?><table cellpadding="5" cellspacing="5">
      	<?php
      ?><form action="search_products_itsort.php" method="post"><br/>
      	<input type="submit" name="submit" value="Sort products Based on Item Price"/>
    </form>
      <?php echo "</td>";
      echo "</tr>";

  echo "<tr>";
      echo "<td colspan='4'>";
      ?>
      <?php echo "</td>";
      
      echo "</tr>";
  echo "</table>";
  echo "</center>";
?>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

</body>
</html>
