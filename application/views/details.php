<?php
// Define set_active function
function set_active($page) {
    // Get the current URI
    $current_uri = trim($_SERVER['REQUEST_URI'], '/');
    
    // Check if the current URI contains the given page
    if (strpos($current_uri, $page) !== false) {
        return 'active';
    }
    return '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Product Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo set_active('products'); ?>">
                    <a class="nav-link active" href="<?php echo base_url('products/home'); ?>">Profile</a>
                </li>
                <li class="nav-item <?php echo set_active('products/create'); ?>">
                    <a class="nav-link active" href="<?php echo base_url('products/create'); ?>">Add Product</a>
                </li>
                <li class="nav-item <?php echo set_active('user'); ?>">
                    <a class="nav-link active" href="<?php echo base_url('user/logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Product Details -->
    <div class="container mt-4">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name :<?php echo $product['name']; ?></h5>
                <p class="card-text">company_name<?php echo $product['company_name']; ?></p>
                <p class="card-text">discription: <?php echo $product['discription']; ?></p>
                <p class="card-text">price: $<?php echo $product['price']; ?></p>
                <!-- <img src="<?php //echo base_url($product['image']); ?>" alt="<?php// echo $product['name']; ?>" class="card-img-top"> -->
                <p class="card-text">availability: <?php echo $product['availability']; ?></p>
                <a href="<?php echo base_url('payment/checkout/' . $product['id']); ?>" class="btn btn-primary">Proceed to Checkout</a>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
