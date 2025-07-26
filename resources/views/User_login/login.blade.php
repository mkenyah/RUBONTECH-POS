<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .password-toggle {
      position: absolute;
      right: 15px;
      top: 38px;
      cursor: pointer;
      z-index: 2;
    }
  </style>
</head>
<body>

<section class="vh-100" style="background-color: #fafafa;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-3-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-3">Sign in</h3>
            <i id="user" class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 74px; color: rgb(8, 8, 236);"></i>

            {{-- Flash messages --}}
            @if(session('error'))
              <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
              </div>
            @endif

            @if(session('success'))
              <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
              </div>
            @endif

            <!-- Laravel Login Form -->
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-outline mb-4 text-start">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control form-control-lg" value="{{ old('username') }}" required autofocus>
                @error('username')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-outline mb-4 text-start position-relative">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg" required>
                <i class="fa fa-eye password-toggle" id="togglePassword" style="top: 48px; font-size: 20px; color:blue"></i>

                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <button class="btn btn-primary btn-lg btn-block w-100" type="submit">Login</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto-dismiss flash messages after 3 seconds -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const flash = document.getElementById('flash-message');
    if (flash) {
      setTimeout(() => {
        flash.classList.remove('show');
        flash.classList.add('fade');
        setTimeout(() => flash.remove(), 500);
      }, 3000);
    }

    // Toggle password visibility
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    toggle.addEventListener('click', () => {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      toggle.classList.toggle('fa-eye');
      toggle.classList.toggle('fa-eye-slash');
    });
  });
</script>

</body>
</html>
