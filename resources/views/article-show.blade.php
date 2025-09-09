@extends('layout.app')

@section('title', $article->title)

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
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://source.unsplash.com/1600x400/?article,technology') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 80px 20px;
      border-radius: 15px;
      margin-bottom: 50px;
    }

    img.hero-image {
      max-height: 300px;
      width: 100%;
      object-fit: cover;
      border-radius: 15px;
      margin-bottom: 20px;
    }

    /* Article Content */
    .article-content img {
      max-width: 100%;
      border-radius: 10px;
      margin: 20px 0;
    }
    .article-content blockquote {
      border-left: 5px solid #007bff;
      padding-left: 15px;
      color: #555;
      font-style: italic;
      margin: 20px 0;
    }
    .article-content pre {
      background: #f1f1f1;
      padding: 15px;
      border-radius: 10px;
      overflow-x: auto;
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

    /* Comments */
    .comment {
      margin-bottom: 20px;
    }
    .comment .avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 15px;
    }
    .comment .avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .comment-body {
      background: rgba(255,255,255,0.8);
      padding: 15px;
      border-radius: 15px;
      flex: 1;
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
    <h1 class="display-4 fw-bold">{{ $article->title }}</h1>
    <!-- Tags Section -->
    @if($article->tags)
      <div class="tag-cloud my-2">
        @foreach(explode(',', $article->tags) as $tag)
          <a href="{{ route('articles.tag', trim($tag)) }}">{{ trim($tag) }}</a>
        @endforeach
      </div>
    @endif
    <p class="lead text-white">Kategori: <a href="" class="text-decoration-none text-white">{{ $article->category->name }}</a> | {{ $article->created_at->format('d M Y') }} | Penulis: {{ $article->user->name }}</p>
  </section>

  <!-- Main Content -->
  <div class="container my-5">
    <div class="row">

      <!-- Article Content -->
      <div class="col-lg-8">
        <article class="article-content">
          <img src="{{ $article->thumbnail ? asset('storage/' . $article->thumbnail) : 'https://source.unsplash.com/800x400/?technology' }}" alt="{{ $article->title }}" class="hero-image">
          {!! $article->content !!}
        </article>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        @include('partials.sidebar')
      </div>

    </div>
  </div>
@endsection
