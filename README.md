<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>E-commerce Platform</title>
</head>
<body>
  <h1>E-commerce Platform with Vendor and Customer Modules</h1>

  <p>This project is a basic PHP-based e-commerce platform designed to demonstrate core functionalities for both vendors and customers. It includes user authentication, product management, and order processing.</p>

  <h2>🔧 Features</h2>

  <h3>🔐 Authentication</h3>
  <ul>
    <li>Sign up and login for customers and vendors</li>
    <li>Session-based login with logout functionality</li>
  </ul>

  <h3>🛒 Customer Panel</h3>
  <ul>
    <li>Browse products by category</li>
    <li>Add products to cart</li>
    <li>Place orders</li>
  </ul>

  <h3>🧾 Vendor Panel</h3>
  <ul>
    <li>Add, update, or remove products</li>
    <li>View customer orders</li>
  </ul>

  <h3>🖼️ UI and Design</h3>
  <ul>
    <li>Simple and intuitive front-end using HTML, CSS</li>
    <li>Image assets for products and design</li>
  </ul>

  <h2>🗂️ Project Structure</h2>

  <pre>
E-commerce-with-vendor-customer-master/
│
├── Shared/                  # Common files and resources
│   ├── connection.php       # Database connection
│   ├── login.php, signup.php# Auth logic
│   ├── styles.css           # Styling
│   └── images/              # UI images
│
├── Customer/                # Customer dashboard and logic
├── Vendor/                  # Vendor dashboard and logic
├── Admin/                   # Optional admin panel (if present)
└── README.md                # Project documentation
  </pre>

  <h2>⚙️ Requirements</h2>
  <ul>
    <li>PHP 7.x or later</li>
    <li>MySQL</li>
    <li>Web server (XAMPP, WAMP, or similar)</li>
  </ul>

  <h2>🚀 Getting Started</h2>
  <ol>
    <li>Clone the repository:</li>
    <pre><code>git clone https://github.com/yourusername/e-commerce-vendor-customer.git</code></pre>

    <li>Place it in your web server’s root directory (e.g., <code>htdocs</code> for XAMPP).</li>
    <li>Import the provided SQL database into your MySQL server.</li>
    <li>Start Apache and MySQL from your control panel.</li>
    <li>Access the project via:</li>
    <pre><code>http://localhost/E-commerce-with-vendor-customer-master/Shared/login.html</code></pre>
  </ol>
</body>
</html>
