@extends('layout.app')

@section('title', 'Profile')

@push('styles')
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
      color: #212529;
      transition: background 0.3s, color 0.3s;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://source.unsplash.com/1600x400/?profile') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 100px 20px;
      border-radius: 15px;
      margin-bottom: 50px;
      transition: transform 0.3s;
    }
    .hero:hover { transform: scale(1.02); }

    /* Glassmorphism Card */
    .card-glass {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card-glass:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid white;
      margin-top: -75px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    /* Tabs */
    .nav-tabs .nav-link.active {
      background-color: #0d6efd;
      color: white;
      border-radius: 8px;
    }

    footer {
      background-color: #f8f9fa;
      padding: 40px 0;
    }

    footer .footer-links a {
      color: #0d6efd;
      font-weight: 600;
      text-decoration: none;
      margin: 0 12px;
      transition: color 0.3s ease, text-decoration 0.3s ease;
    }

    footer .footer-links a:hover {
      color: #0a58ca;
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      footer .footer-links {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }
    }

    html { scroll-behavior: smooth; }
  </style>
@endpush

@section('content')
  <!-- Hero Section -->
  <section class="hero">
    <h1 class="display-4 fw-bold">Halo, John Doe!</h1>
  </section>

  <!-- Profile Content -->
  <div class="container my-5">
    <div class="row">

      <!-- Main Profile Section -->
      <div class="col-lg-8">
        <div class="card-glass text-center position-relative">
          <img src="https://source.unsplash.com/150x150/?face" alt="Profile Image" class="profile-img">
          <h3 class="mt-3 fw-bold">{{ Auth::user()->name }}</h3>
          <p class="text-muted">{{ Auth::user()->email }}</p>
          <p>Seorang blogger yang menyukai teknologi, coding, dan menulis konten inspiratif.</p>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mt-4" id="profileTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button">Pengaturan Akun</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button">Keamanan</button>
          </li>
        </ul>
        <div class="tab-content card-glass mt-3" id="profileTabsContent">
          <!-- Settings Tab -->
          <div class="tab-pane fade show active" id="settings">
            <h5 class="fw-bold mb-3">Informasi Akun</h5>
            <form action="{{ route('profile.update') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Bio</label>
                <textarea class="form-control" rows="3" name="bio">{{ old('bio', $user->bio) }}</textarea>
                @error('bio') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <button class="btn btn-primary">Simpan Perubahan</button>
            </form>
          </div>
          <!-- Security Tab -->
          <div class="tab-pane fade" id="security">
            <h5 class="fw-bold mb-3">Ubah Kata Sandi</h5>
            <form action="{{ route('profile.password') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label">Kata Sandi Lama</label>
                <input type="password" class="form-control" name="current_password">
                @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Kata Sandi Baru</label>
                <input type="password" class="form-control" name="password">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Konfirmasi Kata Sandi Baru</label>
                <input type="password" class="form-control" name="password_confirmation">
              </div>
              <button class="btn btn-danger">Perbarui Kata Sandi</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="card-glass">
          <h4 class="fst-italic">Tentang Saya</h4>
          <p>Saya John, blogger yang senang berbagi artikel teknologi, tips produktivitas, dan lifestyle.</p>
        </div>

        <div class="card-glass">
          <h4 class="fst-italic">Statistik Akun</h4>
          <ul class="list-unstyled mb-0">
            <li>Artikel: 24</li>
            <li>Komentar: 158</li>
            <li>Followers: 432</li>
            <li>Following: 89</li>
          </ul>
        </div>

        <div class="card-glass">
          <h4 class="fst-italic">Newsletter</h4>
          <p>Dapatkan update artikel terbaru langsung ke email Anda.</p>
          <form>
            <div class="mb-3">
              <input type="email" class="form-control" placeholder="Email Anda">
            </div>
            <button class="btn btn-primary w-100">Daftar</button>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
