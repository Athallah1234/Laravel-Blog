@extends('layout.app')

@section('title', 'Contact')

@push('styles')
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
      color: #212529;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://source.unsplash.com/1600x400/?contact,office') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 80px 20px;
      border-radius: 15px;
      margin-bottom: 50px;
    }

    /* Contact Form Card */
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    }

    /* Sidebar */
    .sidebar {
      background: rgba(255,255,255,0.8);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    /* Contact Info */
    .contact-info i {
      color: #007bff;
      margin-right: 10px;
    }

    /* Footer */
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
    <h1 class="display-4 fw-bold">Kontak Saya</h1>
  </section>

  <!-- Main Content -->
  <div class="container my-5">
    <div class="row">

      <!-- Contact Form -->
      <div class="col-lg-8">
        <div class="card p-4 mb-4">
          <h4 class="mb-4">Kirim Pesan</h4>
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" placeholder="Nama Anda" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email Anda" required>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subjek</label>
              <input type="text" class="form-control" id="subject" placeholder="Subjek Pesan" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Pesan</label>
              <textarea class="form-control" id="message" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
          </form>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="sidebar mb-4">
          <h4 class="fst-italic">Informasi Kontak</h4>
          <p class="contact-info"><i class="bi bi-envelope-fill"></i> email@blogpribadi.com</p>
          <p class="contact-info"><i class="bi bi-telephone-fill"></i> +62 812 3456 7890</p>
          <p class="contact-info"><i class="bi bi-geo-alt-fill"></i> Jakarta, Indonesia</p>
          <p class="contact-info"><i class="bi bi-clock-fill"></i> Senin - Jumat, 09:00 - 17:00</p>
        </div>
      </div>

    </div>
  </div>
@endsection
