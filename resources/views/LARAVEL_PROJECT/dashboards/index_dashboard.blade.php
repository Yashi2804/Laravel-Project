 <!-- @php
@include('LARAVEL_PROJECT.layout-Files.main_layout');
@endphp  -->
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: absolute;
            justify-content: center;
            align-items: center;
            height: 80vh;
            background: #f3f4f6;
        }
        h1{
            text-align: center;
            color: #1f2937;
        }
        p{
            text-align: center;
            color: #374151;
            font-size: 18px;
        }

    </style>
</head>
<body>
    <div>
        <h1>Welcome to LearnX</h1>
        <p>Your gateway to learning and knowledge.</p>
        <img src="Assests/img.jpg" alt="Learning Image" style="width:100%; border-radius:20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);">
    </div>

</body>
<footer style="text-align: center; padding: 10px; background-color: #1f2937; color: white; position: relative; bottom: 0; width: 100%;">
    &copy; 2025 LearnX. All rights reserved.<br>
    &copy; Designed by Avanish Rajput.<br>
    &copy; Contact:avanishrajput2082017@gmail.com
</footer>
</html>