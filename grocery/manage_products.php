<?php
session_start();
include 'connect.php';

// Ensure user is logged in and is an employee
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'employee') {
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    mysqli_query($conn, "INSERT INTO products (name, description, price, stock) VALUES ('$name', '$description', '$price', '$stock')");
    header('Location: manage_products.php'); // Redirect to refresh the page
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];
    mysqli_query($conn, "DELETE FROM products WHERE id = '$product_id'");
    header('Location: manage_products.php'); // Redirect to refresh the page
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $new_price = $_POST['new_price'];
    $new_stock = $_POST['new_stock'];

    mysqli_query($conn, "UPDATE products SET price = '$new_price', stock = '$new_stock' WHERE id = '$product_id'");
    header('Location: manage_products.php'); // Redirect to refresh the page
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <h2>Manage Products</h2>

        <form method="POST" class="form-inline mb-4">
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

        <form method="POST" class="mb-3">
            <h4>Add Product</h4>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Stock:</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
            <button type="submit" name="add_product" class="btn btn-success">Add Product</button>
        </form>

        <h4>Existing Products</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Update Price & Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <input type="number" step="0.01" name="new_price" class="form-control d-inline" value="<?php echo $row['price']; ?>" style="width: 100px;" required>
                            <input type="number" name="new_stock" class="form-control d-inline" value="<?php echo $row['stock']; ?>" style="width: 100px;" required>
                            <button type="submit" name="update_product" class="btn btn-warning">Update</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete_product" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="employee_home.php" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>
