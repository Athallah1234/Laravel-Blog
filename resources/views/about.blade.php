@extends('layout.app')

@section('title', 'About Us')

@push('styles')
<style>
body {
  font-family: 'Inter', sans-serif;
  background-color: #f8f9fa;
  color: #212529;
}

/* Hero Section */
.hero {
  background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://source.unsplash.com/1600x400/?portrait,blogger') no-repeat center center;
  background-size: cover;
  color: white;
  text-align: center;
  padding: 80px 20px;
  border-radius: 15px;
  margin-bottom: 50px;
}

/* Card */
.card {
  border: none;
  border-radius: 15px;
  transition: transform 0.3s, box-shadow 0.3s;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

/* Skills Progress Bar */
.skill {
  margin-bottom: 15px;
}

/* Sidebar */
.sidebar {
  position: sticky;
  top: 20px;
}
.sidebar .card {
  margin-bottom: 20px;
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

/* Responsive */
@media (max-width: 992px) {
  .sidebar {
    position: static;
    margin-top: 30px;
  }
}

/* Smooth scrolling */
html {
  scroll-behavior: smooth;
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero">
  <h1 class="display-4 fw-bold">Tentang Saya</h1>
</section>

<!-- Main Content with Sidebar -->
<div class="container my-5">
  <div class="row">

    <!-- Main Content -->
    <div class="col-lg-8">

      <!-- Profile Card -->
      <div class="card mb-4 p-4">
        <div class="row g-4 align-items-center">
          <div class="col-md-4 text-center">
            <img src="https://source.unsplash.com/200x200/?portrait" class="rounded-circle img-fluid" alt="Profile Image">
          </div>
          <div class="col-md-8">
            <h3 class="fw-bold">ATHALLAH RAJENDRA PUTRA JUNIARTO</h3>
            <p>Saya seorang blogger dan pengembang web yang tertarik pada teknologi, produktivitas, dan pengembangan diri. Tujuan saya adalah berbagi pengalaman dan ilmu yang bermanfaat bagi pembaca.</p>
          </div>
        </div>
      </div>

      <!-- Skills -->
      <h4 class="mt-5 mb-3">Keterampilan</h4>
      <div class="skill">
        <h6>HTML & CSS</h6>
        <div class="progress">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 95%"></div>
        </div>
      </div>
      <div class="skill">
        <h6>JavaScript</h6>
        <div class="progress">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
        </div>
      </div>
      <div class="skill">
        <h6>Laravel & PHP</h6>
        <div class="progress">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"></div>
        </div>
      </div>
      <div class="skill">
        <h6>React & Frontend Modern</h6>
        <div class="progress">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
        </div>
      </div>

      <!-- Quote -->
      <div class="card bg-light mt-5 p-4 text-center">
        <blockquote class="blockquote mb-0">
          <p>"Belajar adalah perjalanan tanpa akhir, berbagi ilmu adalah cara mempercepat perjalanan orang lain."</p>
          <footer class="blockquote-footer">ATHALLAH RAJENDRA PUTRA JUNIARTO</footer>
        </blockquote>
      </div>

    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
      <div class="sidebar">

        <!-- Contact Information -->
        <div class="card p-4 mb-4">
          <h6 class="fw-bold mb-3">Kontak & Informasi</h6>
          <p><strong>Alamat:</strong> Jl. Contoh No.123, Kota Contoh, Indonesia</p>
          <p><strong>Email:</strong> <a href="mailto:athallah@example.com">athallah@example.com</a></p>
          <p><strong>Telepon:</strong> <a href="tel:+6281234567890">+62 812-3456-7890</a></p>
          <h6 class="fw-bold mt-3">Media Sosial</h6>
          <p>
            <a href="https://facebook.com/athallah" target="_blank">Facebook</a><br>
            <a href="https://twitter.com/athallah" target="_blank">Twitter</a><br>
            <a href="https://linkedin.com/in/athallah" target="_blank">LinkedIn</a><br>
            <a href="https://github.com/athallah" target="_blank">GitHub</a>
          </p>
        </div>

      </div>
    </div>

  </div>
</div>
@endsection
