@extends('layout.app')

@section('title', 'List Article')

@push('styles')
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
      color: #212529;
      scroll-behavior: smooth;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://source.unsplash.com/1600x400/?articles,technology') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 80px 20px;
      border-radius: 15px;
      margin-bottom: 50px;
    }

    /* Cards */
    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s;
    }
    .card-img-top:hover {
      transform: scale(1.05);
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

    .tag-cloud a {
      display: inline-block;
      background: #007bff;
      color: white;
      border-radius: 15px;
      padding: 5px 10px;
      margin: 3px;
      font-size: 0.85rem;
      transition: transform 0.2s;
      text-decoration: none;
    }
    .tag-cloud a:hover {
      transform: scale(1.1);
      text-decoration: none;
    }

    /* Pagination */
    .pagination .page-link {
      border-radius: 50% !important;
      margin: 0 3px;
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

    /* Smooth scrolling */
    html {
      scroll-behavior: smooth;
    }
  </style>
@endpush

@section('content')
  <!-- Hero Section -->
  <section class="hero">
    <h1 class="display-4 fw-bold">Articles</h1>
  </section>

  <!-- Main Content -->
  <div class="container my-5">
    <div class="row">

      <!-- Articles Grid -->
      <div class="col-lg-8">
        <div class="row g-4">

          <!-- Article Card Example -->
          @forelse($articles as $article)
            <div class="col-md-6">
              <div class="card shadow-sm">
                <img src="{{ asset('storage/' . $article->thumbnail) ?? 'https://source.unsplash.com/400x200/?technology' }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $article->title }}</h5>
                  <p class="text-muted mb-1">Kategori: {{ $article->category->name }} | {{ $article->created_at->format('d M Y') }}</p>
                  <p class="card-text">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                  <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          @empty
            <p>Tidak ada article tersedia.</p>
          @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
          {{ $articles->links('pagination::bootstrap-5') }}
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        @include('partials.sidebar')
      </div>

    </div>
  </div>
@endsection
