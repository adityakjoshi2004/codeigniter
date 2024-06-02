<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Create Product</h1>
        <form action="<?php echo base_url('products/create'); ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="discription">Discription:</label>
                <textarea class="form-control" name="discription" id="discription"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index">go back</a>
        </form>
    </div>
</body>
</html>
