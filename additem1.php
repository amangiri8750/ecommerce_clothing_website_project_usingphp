<?php
$connet = mysqli_connect("localhost", "root", "", "cara_clothes");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delpid'])) {
        $del = $_POST['proid'];
        $q = "DELETE FROM items1 WHERE srn='$del'";
        
        if (mysqli_query($connet, $q)) {
            echo "<div class='alert alert-success'>Product deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting product.</div>";
        }
    } else {
        $file = $_FILES['imageUrl'];
        $filename = $file['name'];
        $filetmpname = $file['tmp_name'];
        $uplodplc = "ecommerce/" . $filename;

        if (move_uploaded_file($filetmpname, $uplodplc)) {
            // File uploaded successfully
        } else {
            echo "<div class='alert alert-danger'>File upload failed.</div>";
        }

        $PNAME = $_POST['productName'];
        $PPRICE = $_POST['price'];

        $query = "INSERT INTO items1 (producturl, productname, price) VALUES ('$filename', '$PNAME', $PPRICE)";
        
        if (mysqli_query($connet, $query)) {
            echo "<div class='alert alert-success'>Product added successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding product.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Management</title>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form id="productForm" method="post" enctype="multipart/form-data">
                <h2>Add New Arrivals</h2>
                <div class="mb-3">
                    <label for="imageUrl" class="form-label">Image URL:</label>
                    <input type="file" id="imageUrl" name="imageUrl" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name:</label>
                    <input type="text" id="productName" name="productName" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Add Product</button>
            </form>
        </div>

        <div class="form-container mt-4">
            <form id="deleteForm" method="post">
                <h2>Delete Product</h2>
                <div class="mb-3">
                    <label for="pid" class="form-label">Product ID:</label>
                    <input type="number" id="pid" name="proid" class="form-control" required>
                </div>
                <button type="submit" name="delpid" class="btn btn-danger">Delete Product</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
