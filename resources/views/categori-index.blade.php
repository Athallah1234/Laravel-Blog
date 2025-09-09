@extends('layout.app')

@section('title', 'List Category')

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
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://source.unsplash.com/1600x400/?categories,technology') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 80px 20px;
      border-radius: 15px;
      margin-bottom: 50px;
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

    html { scroll-behavior: smooth; }
  </style>
@endpush

@section('content')
  <!-- Hero Section -->
  <section class="hero">
    <h1 class="display-4 fw-bold">Categories</h1>
  </section>

  <div class="container my-5">
    <div class="row">
      @forelse($categories as $category)
        <div class="col-md-4 mb-3">
          <div class="card p-3">
            <h5 class="card-title">
              <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
            </h5>
          </div>
        </div>
      @empty
        <p>Tidak ada kategori tersedia.</p>
      @endforelse
    </div>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center mt-4">
    {{ $categories->links('pagination::bootstrap-5') }}
  </div>
@endsection
