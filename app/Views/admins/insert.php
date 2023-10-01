<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CSS link (you should include Bootstrap in your project) -->
    <link href="<?php echo base_url('css/bootstrap.min.css')?> " rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Product</h2>
        <form method="post" action="/admins/add_Prod/insertProduct" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <!-- Populate this select dropdown with category options -->
                    <option value="1">Bags</option>
                    <option value="2">Shoes</option>
                    <option value="3">Watches</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <!-- Populate this select dropdown with category options -->
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock Quantity</label>
                <input type="text" class="form-control" id="stock_quantity" name="stock_quantity" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="file" class="form-control" id="image_url" name="image_url" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

        <div class="container mt-5">
        <h2>View Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Gender</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Stock Quantity</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo $product['category_id']; ?></td>
                        <td><?php echo $product['gender']; ?></td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><?php echo $product['stock_quantity']; ?></td>
                        <td>
                            <!-- Display the product image -->
                            <img src="<?php echo base_url('uploads/' . $product['image_url']); ?>" alt="Product Image" width="100">
                        </td>
                        <td>
                            <a href="/admins/edit_Prod/<?php echo $product['product_id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="/admins/delete_Prod/<?php echo $product['product_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JavaScript link (you should include Bootstrap in your project) -->
    <script src="<?php echo base_url('js/main.js')?>"></script>
</body>
</html>
