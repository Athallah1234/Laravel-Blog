<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun - Blog Pribadi Modern</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
      color: #212529;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Card Register */
    .register-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
      padding: 30px;
      background-color: white;
      width: 100%;
      max-width: 500px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }

    .password-wrapper {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      bottom: -10px;
      transform: translateY(-50%);
      border: none;
      background: none;
      cursor: pointer;
      font-size: 1.1rem;
      color: #6c757d;
    }
  </style>
</head>
<body>

  <!-- Main Content -->
  <div class="container-fluid d-flex align-items-center justify-content-center min-vh-100">
    <div class="register-card">
      <h4 class="mb-4 text-center">Buat Akun Anda</h4>

      @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required>
        </div>

        <div class="mb-3 password-wrapper">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
          <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
            <i class="bi bi-eye"></i>
          </button>
        </div>

        <div class="mb-3 password-wrapper">
          <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi password" required>
          <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', this)">
            <i class="bi bi-eye"></i>
          </button>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" name="terms" id="terms" required>
          <label class="form-check-label" for="terms">
            Saya setuju dengan <a href="{{-- {{ route('terms') }} --}}" target="_blank">Syarat & Ketentuan</a>
          </label>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" name="privacy" id="privacy" required>
          <label class="form-check-label" for="privacy">
            Saya telah membaca dan menyetujui <a href="{{-- {{ route('privacy') }} --}}" target="_blank">Kebijakan Privasi</a>
          </label>
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3">Daftar</button>
      </form>

      <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center py-3 bg-light mt-auto">
    <div class="container">
      <p class="mb-0">&copy; 2025 Blog Pribadi. Semua hak cipta dilindungi.</p>
      <small class="text-muted">Designed with Bootstrap 5 & Inter Font</small>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Show/Hide Password Script -->
  <script>
    function togglePassword(inputId, button) {
      const input = document.getElementById(inputId);
      const icon = button.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
    }
  </script>

</body>
</html>
