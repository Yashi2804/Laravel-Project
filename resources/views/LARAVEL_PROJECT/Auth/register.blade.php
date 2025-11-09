<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register — Create Account</title>
  <style>
    :root{
      --bg:#f4f7fb;
      --card:#ffffff;
      --accent:#10b981;
      --muted:#6b7280;
      --danger:#ef4444;
      --radius:12px;
      --shadow:0 8px 30px rgba(11,15,28,0.06);
      font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    *{box-sizing:border-box}
    body{
      margin:0;
      background:linear-gradient(180deg,#ecfdf5 0%,var(--bg) 100%);
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:24px;
      color:#0f172a;
    }

    .card{
      width:100%;
      max-width:460px;
      background:var(--card);
      border-radius:var(--radius);
      box-shadow:var(--shadow);
      padding:28px;
    }

    h1{font-size:22px;margin:0 0 8px}
    p.lead{margin:0 0 18px;color:var(--muted);font-size:14px}

    form{display:flex;flex-direction:column;gap:12px}

    .field{display:flex;flex-direction:column;gap:8px}

    label{font-size:13px;color:var(--muted)}

    input[type="text"],input[type="password"],input[type="email"]{
      width:100%;
      padding:12px 14px;
      border-radius:10px;
      border:1px solid #e6e9ef;
      font-size:15px;
      outline:none;
      transition:box-shadow 120ms,border-color 120ms;
      background:transparent;
    }

    input:focus{box-shadow:0 0 0 4px rgba(16,185,129,0.1);border-color:var(--accent)}

    .btn{
      appearance:none;border:0;padding:11px 14px;border-radius:10px;background:var(--accent);color:white;font-weight:600;cursor:pointer;font-size:15px
    }

    .btn.secondary{background:#e6e9ef;color:#0f172a}

    .error{color:var(--danger);font-size:13px}

    .footer-note{margin-top:8px;font-size:13px;color:var(--muted);text-align:center}

    @media(max-width:420px){.card{padding:20px}}
  </style>
</head>
<body>
  <main class="card" role="main">
    <h1>Create Account</h1>
    <p class="lead">Sign up with your details to get started.</p>

    <form id="registerForm" method="post" action="{{route('register.submit')}}" novalidate>
        @csrf
      <div class="field">
        <label for="name">Full Name</label>
        <input id="name" name="fname" type="text" placeholder="John Doe" required />
        <div id="nameError" class="error" style="display:none"></div>
      </div>

      <div class="field">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="email" placeholder="you@example.com" required />
        <div id="emailError" class="error" style="display:none"></div>
      </div>

      <div class="field">
        <label for="username">User ID</label>
        <input id="username" name="username" type="text" placeholder="username123" required />
        <div id="usernameError" class="error" style="display:none"></div>
      </div>

      <div class="field">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Enter a password" required minlength="6" />
        <div id="passwordError" class="error" style="display:none"></div>
      </div>

      <div class="field">
        <label for="confirmPassword">Confirm Password</label>
        <<input type="password" name="password_confirmation" placeholder="Confirm Password">

        <div id="confirmError" class="error" style="display:none"></div>
      </div>

      <div>
        <button class="btn" type="submit">Register</button>
      </div>

      <div class="footer-note">Already have an account? <a href="#">Log in</a></div>
    </form>
  </main>

  <script>
    const form = document.getElementById('registerForm');
    const nameInput = document.getElementById('name');
    const email = document.getElementById('email');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');

    const errs = {
      name: document.getElementById('nameError'),
      email: document.getElementById('emailError'),
      username: document.getElementById('usernameError'),
      password: document.getElementById('passwordError'),
      confirm: document.getElementById('confirmError')
    };

    function isValidEmail(v){return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)}

    form.addEventListener('submit', e => {
      e.preventDefault();
      Object.values(errs).forEach(el=>el.style.display='none');
      let valid=true;

      if(nameInput.value.trim().length<2){errs.name.textContent='Please enter your full name.';errs.name.style.display='block';valid=false;}
      if(!isValidEmail(email.value)){errs.email.textContent='Please enter a valid email.';errs.email.style.display='block';valid=false;}
      if(username.value.trim().length<3){errs.username.textContent='User ID must be at least 3 characters.';errs.username.style.display='block';valid=false;}
      if(password.value.length<6){errs.password.textContent='Password must be at least 6 characters.';errs.password.style.display='block';valid=false;}
      if(password.value!==confirmPassword.value){errs.confirm.textContent='Passwords do not match.';errs.confirm.style.display='block';valid=false;}

      if(!valid)return;

      alert('Registration successful! Data ready to send to server.');
      
    });



const form = document.getElementById('registerForm');
form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(form);
  const res = await fetch('{{ route("register.submit") }}', {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: formData
  });

  const data = await res.json();

  if (data.status === 'success') {
    alert('🎉 Registration successful!');
    window.location.href = '/dashboard';
  } else {
    alert('❌ ' + (data.message || 'Registration failed.'));
  }
});
  </script>
</body>
</html>