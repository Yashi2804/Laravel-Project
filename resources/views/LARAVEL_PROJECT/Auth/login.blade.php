<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f7fb;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 360px;
    }
    h2 { text-align: center; color: #333; }
    input {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #4f46e5;
      color: white;
      border: none;
      border-radius: 8px;
      margin-top: 15px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background: #4338ca;
    }
    .alert {
      background: #fee2e2;
      color: #b91c1c;
      padding: 10px;
      border-radius: 6px;
      text-align: center;
      margin-bottom: 15px;
    }
    .success {
      background: #dcfce7;
      color: #15803d;
    }
    .footer-note{margin-top:8px;font-size:13px;color:var(--muted);text-align:center}
  </style>
</head>
<body>

  <div class="card">
    <h2>Login</h2>

    @if (session('error'))
      <div class="alert">{{ session('error') }}</div>
    @endif

    @if (session('success'))
      <div class="alert success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
      @csrf
      <label for="identifier">Email or Username</label>
      <input type="text" id="identifier" name="identifier" placeholder="Enter email or username" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter password" required>

      <button type="submit">Login</button>
      <div class="footer-note">Already have an account! <a href="{{route('register')}}">Sign in</a></div>
    </form>
  </div>

</body>
</html>
