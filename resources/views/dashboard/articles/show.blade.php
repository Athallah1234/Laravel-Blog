@extends('dashboard.layout.app')

@section('title', $article->title)

@push('styles')
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
    }

    /* Sidebar */
    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: #fff;
      padding-top: 20px;
      position: fixed;
      width: 220px;
      transition: transform 0.3s ease-in-out;
      z-index: 999;
    }

    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      border-radius: 5px;
      margin-bottom: 5px;
      transition: background 0.3s, color 0.3s;
    }

    .sidebar .sidebar-link {
      color: #adb5bd;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      border-radius: 5px;
      margin-bottom: 5px;
      transition: background 0.3s, color 0.3s;
    }

    .sidebar a:hover, .sidebar a.active {
      background-color: #495057;
      color: #fff;
    }

    .sidebar .sidebar-link:hover, .sidebar .sidebar-link:active {
      color: #adb5bd;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      border-radius: 5px;
      margin-bottom: 5px;
      transition: background 0.3s, color 0.3s;
    }

    .content {
      margin-left: 240px;
      padding: 40px 20px;
      transition: margin-left 0.3s;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.05);
    }

    .navbar-admin {
      margin-left: 240px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      transition: margin-left 0.3s;
    }

    .sidebar-toggle {
      display: none;
      font-size: 1.5rem;
      cursor: pointer;
    }

    .sidebar-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 100vw;
      background-color: rgba(0,0,0,0.5);
      z-index: 998;
    }

    .article-thumbnail {
      max-width: 100%;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    #footer {
      margin-left: 240px;
      transition: margin-left 0.3s;
    }

    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.show {
        transform: translateX(0);
      }
      .content {
        margin-left: 0;
        padding: 20px 10px;
      }
      .navbar-admin {
        margin-left: 0;
      }
      .sidebar-toggle {
        display: inline-block;
      }
      .sidebar-overlay.show {
        display: block;
      }
      #footer {
        margin-left: 0;
        padding: 20px 10px;
      }
    }

    @media (max-width: 576px) {
      .btn {
        font-size: 0.85rem;
        padding: 0.25rem 0.5rem;
      }
    }
  </style>
@endpush

@section('content')
  <!-- Main Content -->
  <div class="content">

    <div class="card mb-4">
      <div class="card-header fw-bold">
        {{ $article->title }}
      </div>
      <div class="card-body">
        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail Artikel" class="article-thumbnail">

        <dl class="row">
          <dt class="col-sm-3">Slug</dt>
          <dd class="col-sm-9">{{ $article->slug }}</dd>

          <dt class="col-sm-3">Kategori</dt>
          <dd class="col-sm-9">{{ $article->category->name }}</dd>

          <dt class="col-sm-3">Penulis</dt>
          <dd class="col-sm-9">{{ $article->user->name }}</dd>

          <dt class="col-sm-3">Status</dt>
          <dd class="col-sm-9">
            @if ($article->status == "published")
              <span class="badge bg-success">Published</span>
            @else
              <span class="badge bg-danger">Draft</span>
            @endif
          </dd>

          <dt class="col-sm-3">Tanggal</dt>
          <dd class="col-sm-9">{{ $article->created_at }}</dd>
        </dl>

        <hr>

        <h5>Konten Artikel</h5>
        <p>
          {!! $article->content !!}
        </p>

        <div class="mt-4">
          <a href="{{ route('dashboard.articles.edit', $article) }}" class="btn btn-primary me-2">Edit Artikel</a>
          <a href="{{ route('dashboard.articles.index') }}" class="btn btn-danger">Kembali</a>
        </div>
      </div>
    </div>

  </div>
@endsection
