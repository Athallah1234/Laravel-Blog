<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verifikasi - Blog Pribadi Modern</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
      color: #212529;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Card Verification */
    .verify-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
      padding: 30px;
      background-color: white;
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    .verify-icon {
      font-size: 60px;
      color: #0d6efd;
      margin-bottom: 20px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
  </style>
</head>
<body>

  <!-- Main Content -->
  <div class="container-fluid d-flex align-items-center justify-content-center min-vh-100">
    <div class="verify-card">
      <div class="verify-icon">
        <i class="bi bi-envelope-check-fill"></i>
      </div>
      <h4 class="mb-3">Verifikasi Email Anda</h4>
      <p class="text-muted mb-4">
        Kami telah mengirimkan link verifikasi ke email Anda.
        Silakan periksa kotak masuk (atau folder spam) dan klik link untuk mengaktifkan akun.
      </p>

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

      <form method="POST" action="{{ route('verification.send') }}>
        @csrf
        <button type="submit" class="btn btn-primary w-100 mb-3">Kirim Ulang Email Verifikasi</button>
      </form>

      <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">
        Kembali ke Login
      </a>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center py-3 bg-light mt-auto">
    <div class="container">
      <p class="mb-0">&copy; 2025 Blog Pribadi. Semua hak cipta dilindungi.</p>
      <small class="text-muted">Designed with Bootstrap 5 & Inter Font</small>
    </div>
  </footer>

  <!-- Bootstrap JS & Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
