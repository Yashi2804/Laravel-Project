<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LearnX - Navbar</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: #1f2937; 
      color: #fff;
    }

    .navbar .logo {
      font-size: 24px;
      font-weight: bold;
      color: #38bdf8; 
    }

    .navbar ul {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    .navbar ul li {
      display: inline;
    }

    .navbar ul li a {
      text-decoration: none;
      color: #f9fafb;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .navbar ul li a:hover {
      color: #38bdf8;
    }


    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        align-items: flex-start;
      }

      .navbar ul {
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="logo">LearnX</div>
    <ul>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
    </ul>
  </nav>
</body>
</html>