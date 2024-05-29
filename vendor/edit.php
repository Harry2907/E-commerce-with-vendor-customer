<?php
session_start();
include_once("../Shared/connection.php");

if (!isset($_SESSION['userid'])) {
    die("User not logged in.");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate input data
    $pid = intval($_POST['pid']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = floatval($_POST['price']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);

    
    $updateImage = "";
    if ($_FILES['pdtimg']['tmp_name']) {
        $source_path = $_FILES['pdtimg']['tmp_name'];
        $target_path = "../Shared/images/" . basename($_FILES['pdtimg']['name']);

        if (move_uploaded_file($source_path, $target_path)) {
            $updateImage = ", impath = '$target_path'";
        } else {
            die("Failed to upload the image.");
        }
    }

    
    $sql = "UPDATE product SET name = '$name', price = $price, detail = '$detail' $updateImage WHERE pid = $pid";

    
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully.";
        header("Location: ../vendor/view.php");
    } else {
        echo "Error: " . $conn->error;
    }

} else {
    // If no form is submitted, display the edit form
    if (isset($_GET['pid'])) {
        $pid = intval($_GET['pid']);
        $sql = "SELECT * FROM product WHERE pid = $pid";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Edit Product</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                    }
                    .form-container {
                        background-color: #fff;
                        padding: 20px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        border-radius: 8px;
                        max-width: 500px;
                        width: 100%;
                    }
                    .form-container h2 {
                        margin-bottom: 20px;
                    }
                    .form-container label {
                        display: block;
                        margin-bottom: 5px;
                        font-weight: bold;
                    }
                    .form-container input[type="text"],
                    .form-container textarea {
                        width: 100%;
                        padding: 10px;
                        margin-bottom: 10px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                    }
                    .form-container img {
                        max-width: 100%;
                        margin-bottom: 10px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                    }
                    .form-container input[type="file"] {
                        margin-bottom: 20px;
                    }
                    .form-container input[type="submit"] {
                        background-color: #28a745;
                        color: #fff;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    }
                    .form-container input[type="submit"]:hover {
                        background-color: #218838;
                    }
                </style>
            </head>
            <body>
                <div class="form-container">
                    <h2>Edit Product</h2>
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
                        
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($row['price']); ?>">
                        
                        <label for="detail">Detail:</label>
                        <textarea id="detail" name="detail"><?php echo htmlspecialchars($row['detail']); ?></textarea>
                        
                        <label for="current_image">Current Image:</label>
                        <img id="current_image" src='<?php echo htmlspecialchars($row['impath']); ?>' alt='Product Image'>
                        
                        <label for="pdtimg">New Image:</label>
                        <input type="file" id="pdtimg" name="pdtimg">
                        
                        <input type="submit" value="Update Product">
                    </form>
                </div>
            </body>
            </html>
            <?php
        } else {
            echo "Product not found.";
        }
    } else {
        echo "No product ID provided.";
    }
}


$conn->close();
?>

