@extends('dashboard.layout.app')

@section('title', 'Admin Dashboard')

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

    .table th, .table td {
      vertical-align: middle;
    }

    /* Navbar admin */
    .navbar-admin {
      margin-left: 240px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      transition: margin-left 0.3s;
    }

    /* Sidebar toggle button */
    .sidebar-toggle {
      display: none;
      font-size: 1.5rem;
      cursor: pointer;
    }

    /* Overlay background */
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

    #footer {
      margin-left: 240px;
      transition: margin-left 0.3s;
    }

    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
        position: fixed;
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
      .card h3 {
        font-size: 1.5rem;
      }
      .card h6 {
        font-size: 0.9rem;
      }
      .table-responsive {
        font-size: 0.85rem;
      }
    }
  </style>
@endpush

@section('content')
  <!-- Main Content -->
  <div class="content">

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="card p-3 text-center">
          <h6>Jumlah Artikel</h6>
          <h3>{{ $totalArticles }}</h3>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card p-3 text-center">
          <h6>Jumlah Pengguna</h6>
          <h3>{{ $totalUsers }}</h3>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card p-3 text-center">
          <h6>Jumlah Kategori</h6>
          <h3>{{ $totalCategories }}</h3>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card p-3 text-center">
          <h6>Komentar</h6>
          <h3>789</h3>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card p-3 text-center">
          <h6>Total Views</h6>
          <h3>23.500</h3>
        </div>
      </div>
    </div>

    <!-- Recent Articles Table -->
    <div class="card mb-4">
      <div class="card-header fw-bold">
        Artikel Terbaru
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Penulis</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($recentArticles as $article)
              <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->user->name ?? 'Unknown' }}</td>
                <td>{{ $article->category->name ?? '-' }}</td>
                <td>{{ $article->created_at->format('d M Y') }}</td>
                <td>
                  @if($article->status === 'published')
                    <span class="badge bg-success">Published</span>
                  @else
                    <span class="badge bg-warning text-dark">Draft</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn btn-sm btn-primary">Edit</a>
                  <form action="{{ route('dashboard.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted">Belum ada artikel</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Users Table -->
    <div class="card mb-4">
      <div class="card-header fw-bold">
        Pengguna Terbaru
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Tanggal Bergabung</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($recentUsers as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d M Y') }}</td>
                <td>
                  <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center text-muted">Belum ada pengguna</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
