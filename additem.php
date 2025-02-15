<!-- <?php


// $connet = mysqli_connect("localhost","root","","cara_clothes");

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// if(isset($_POST['delpid'])){
// $del = $_POST['proid'];





// $q = "DELETE FROM items WHERE srn='$del'";
// mysqli_query($connet,$q);
// if(mysqli_query($connet,$q)){
//     echo "deleted";
// }
// }else{


//     $file = $_FILES['imageUrl'];
//     $filename = $file['name'];
//     $filetmpname = $file['tmp_name'];
//     $uplodplc = "ecommerce/" . $filename;

//     if (move_uploaded_file($filetmpname, $uplodplc)) {
//         // File uploaded successfully
//     } else {
//         echo "File upload failed.";
//     }

//     // $PNAME = mysqli_real_escape_string($connet, $_POST['productName']);
//     // $PPRICE = mysqli_real_escape_string($connet, $_POST['price']);
//     // $filename = mysqli_real_escape_string($connet, $filename);
//     $PNAME = $_POST['productName'];
//     $PPRICE = $_POST['price'];
//     $filename  = $file['name'];


//     $query = "INSERT INTO items (producturl, productname, price) VALUES ('$filename', '$PNAME', $PPRICE)";
//     mysqli_query($connet, $query);
// }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Responsive Product Form</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 20px;
}

.form-container {
    max-width: 400px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

label {
    margin-top: 10px;
    display: block;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    margin-top: 15px;
    background-color: #5cb85c;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #4cae4c;
}

@media (max-width: 480px) {
    .form-container {
        padding: 15px;
    }

    input, button {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="form-container">
        <form id="productForm" method="post" enctype="multipart/form-data">
            <h2>Add Product</h2>
            <label for="imageUrl">Image URL:</label>
            <input type="file" id="imageUrl" name="imageUrl" required>

            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price"  required>

            <button type="submit">add</button>
        </form>
    </div>



    <div class="form-container">
        <form id="productForm" method="post" enctype="multipart/form-data">
            <h2>delete Product</h2>
            <label for="price">product id</label>
            <input type="number" id="pid" name="proid"  required>

            <button type="submit" name="delpid">delete</button>
        </form>
    </div>
</body>
</html>

</body>
</html> -->
<?php
$connet = mysqli_connect("localhost", "root", "", "cara_clothes");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delpid'])) {
        $del = $_POST['proid'];
        $q = "DELETE FROM items WHERE srn='$del'";
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
        $query = "INSERT INTO items (producturl, productname, price) VALUES ('$filename', '$PNAME', $PPRICE)";
        
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        @media (max-width: 480px) {
            .form-container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form id="productForm" method="post" enctype="multipart/form-data">
                <h2>Add Product</h2>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
