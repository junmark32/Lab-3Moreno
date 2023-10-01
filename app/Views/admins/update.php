<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS link (you should include Bootstrap in your project) -->
    <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <form method="post" action="/admins/add_Prod/updateProduct/<?php echo $product['product_id']; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <!-- Populate this select dropdown with category options -->
                    <option value="1" <?php echo ($product['category_id'] == 1) ? 'selected' : ''; ?>>Bags</option>
                    <option value="2" <?php echo ($product['category_id'] == 2) ? 'selected' : ''; ?>>Shoes</option>
                    <option value="3" <?php echo ($product['category_id'] == 3) ? 'selected' : ''; ?>>Watches</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <!-- Populate this select dropdown with category options -->
                    <option value="Men" <?php echo ($product['gender'] == 'Men') ? 'selected' : ''; ?>>Men</option>
                    <option value="Women" <?php echo ($product['gender'] == 'Women') ? 'selected' : ''; ?>>Women</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock Quantity</label>
                <input type="text" class="form-control" id="stock_quantity" name="stock_quantity" value="<?php echo $product['stock_quantity']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="file" class="form-control" id="image_url" name="image_url">
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <!-- Bootstrap JavaScript link (you should include Bootstrap in your project) -->
    <script src="<?php echo base_url('js/main.js') ?>"></script>
</body>
</html>
