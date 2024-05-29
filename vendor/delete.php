<?php
session_start();
include_once("../Shared/connection.php");


if (!isset($_SESSION['userid'])) {
    die("User not logged in.");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $pid = intval($_POST['pid']);

   
    $sql = "DELETE FROM product WHERE pid = $pid";

    
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully.";
        header("location:../vendor/view.php");
    } else {
        echo "Error: " . $conn->error;
    }

} else {
    
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
                <title>Delete Product</title>
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
                        text-align: center;
                    }
                    .form-container h2 {
                        margin-bottom: 20px;
                    }
                    .form-container img {
                        max-width: 100%;
                        margin-bottom: 10px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                    }
                    .form-container input[type="submit"] {
                        background-color: #dc3545;
                        color: #fff;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        margin: 5px;
                    }
                    .form-container input[type="submit"]:hover {
                        background-color: #c82333;
                    }
                    .form-container a {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #6c757d;
                        color: #fff;
                        text-decoration: none;
                        border-radius: 4px;
                        margin: 5px;
                    }
                    .form-container a:hover {
                        background-color: #5a6268;
                    }
                </style>
            </head>
            <body>
                <div class="form-container">
                    <h2>Delete Product</h2>
                    <p>Are you sure you want to delete the following product?</p>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
                    <p><strong>Price:</strong> <?php echo htmlspecialchars($row['price']); ?></p>
                    <p><strong>Detail:</strong> <?php echo htmlspecialchars($row['detail']); ?></p>
                    <img src='<?php echo htmlspecialchars($row['impath']); ?>' alt='Product Image'><br>
                    <form action="delete.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                        <input type="submit" value="Delete Product">
                        <a href="products.php">Cancel</a>
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
