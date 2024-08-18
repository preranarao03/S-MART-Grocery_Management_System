
<?php
session_start();
include 'connect.php';

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$search_results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search_type = $_POST['search_type'];
    $search_value = $_POST['search_value'];

    if ($search_type == 'name') {
        $result = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%$search_value%'");
    } elseif ($search_type == 'price') {
        $price_range = explode('-', $search_value);
        $min_price = (float) $price_range[0];
        $max_price = (float) $price_range[1];
        $result = mysqli_query($conn, "SELECT * FROM products WHERE price BETWEEN $min_price AND $max_price");
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $search_results[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Search Products</h2>
        <form method="POST" class="mb-3">
            <div class="form-group">
                <label>Search By:</label>
                <select name="search_type" class="form-control" required>
                    <option value="name">Item Name</option>
                    <option value="price">Price Range (e.g., 10-50)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Enter Value:</label>
                <input type="text" name="search_value" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php if (!empty($search_results)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($search_results as $product): ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['stock']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <p>No products found matching your search criteria.</p>
        <?php endif; ?>
    </div>
</body>
</html>
