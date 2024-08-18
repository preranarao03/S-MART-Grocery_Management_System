<?php
session_start();
include 'connect.php';

// Ensure the user is logged in and is a customer
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'customer') {
    header('Location: login.php');
    exit();
}

// Initialize variables for search and sorting
$search_query = "";
$sort_order = "";

// Handle search and sorting
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        $search_query = $_POST['search_query'];
    }
    if (isset($_POST['sort_order'])) {
        $sort_order = $_POST['sort_order'];
    }
}

// Build the query
$query = "SELECT * FROM products WHERE name LIKE '%$search_query%'";
if ($sort_order == "price_asc") {
    $query .= " ORDER BY price ASC";
} elseif ($sort_order == "price_desc") {
    $query .= " ORDER BY price DESC";
} elseif ($sort_order == "name_asc") {
    $query .= " ORDER BY name ASC";
} elseif ($sort_order == "name_desc") {
    $query .= " ORDER BY name DESC";
}

$result = mysqli_query($conn, $query);

// Get current cart quantities
$cart_result = mysqli_query($conn, "SELECT product_id, quantity FROM cart WHERE user_id='{$_SESSION['user_id']}'");
$cart_quantities = [];
while ($cart_row = mysqli_fetch_assoc($cart_result)) {
    $cart_quantities[$cart_row['product_id']] = $cart_row['quantity'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <h2>All Products</h2>

        <form method="POST" class="form-inline">
            <input type="text" name="search_query" class="form-control mb-2 mr-sm-2" placeholder="Search Products" value="<?php echo $search_query; ?>">
            <button type="submit" name="search" class="btn btn-primary mb-2">Search</button>

            <select name="sort_order" class="form-control mb-2 ml-sm-2">
                <option value="">Sort By</option>
                <option value="price_asc" <?php if ($sort_order == "price_asc") echo "selected"; ?>>Price: Low to High</option>
                <option value="price_desc" <?php if ($sort_order == "price_desc") echo "selected"; ?>>Price: High to Low</option>
                <option value="name_asc" <?php if ($sort_order == "name_asc") echo "selected"; ?>>Name: A to Z</option>
                <option value="name_desc" <?php if ($sort_order == "name_desc") echo "selected"; ?>>Name: Z to A</option>
            </select>
            <button type="submit" class="btn btn-secondary mb-2 ml-sm-2">Sort</button>
        </form>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Quantity in Cart</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): 
                    $product_id = $row['id'];
                    $quantity_in_cart = isset($cart_quantities[$product_id]) ? $cart_quantities[$product_id] : 0;
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td id="quantity_<?php echo $product_id; ?>"><?php echo $quantity_in_cart; ?></td>
                    <td>
                        <button onclick="addToCart(<?php echo $product_id; ?>)" class="btn btn-primary">+</button>
                        <button id="minus_<?php echo $product_id; ?>" onclick="removeFromCart(<?php echo $product_id; ?>)" class="btn btn-danger" <?php if ($quantity_in_cart == 0) echo 'disabled'; ?>>-</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="customer_home.php" class="btn btn-secondary">Back to Dashboard</a>
        <a href="cart.php" class="btn btn-info">Go to My Cart</a>
        <a href="order_history.php" class="btn btn-info">View Order History</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script>
        function addToCart(product_id) {
            $.ajax({
                type: "POST",
                url: "add_to_cart.php",
                data: { product_id: product_id },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        $('#quantity_' + product_id).text(data.quantity);
                        $('#minus_' + product_id).prop('disabled', false); // Enable the minus button
                    } else if (data.status === 'out_of_stock') {
                        alert('Out of stock!');
                    }
                }
            });
            return false; // Prevent the form from submitting the traditional way
        }

        function removeFromCart(product_id) {
            console.log('removeFromCart called with product_id:', product_id);
            $.ajax({
                type: "POST",
                url: "update_cart.php",
                data: { product_id: product_id },
                success: function(response) {
                    console.log('AJAX success:', response);
                    var data = JSON.parse(response);
                    console.log('Parsed response:', data);
                    if (data.status === 'success') {
                        $('#quantity_' + product_id).text(data.quantity);
                        if (data.quantity == 0) {
                            $('#minus_' + product_id).prop('disabled', true); // Disable the minus button if quantity is zero
                        }
                    } else if (data.status === 'removed') {
                        $('#quantity_' + product_id).text(0);
                        $('#minus_' + product_id).prop('disabled', true); // Disable the minus button if the item is removed
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error: ' + status + error);
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
</body>
</html>
