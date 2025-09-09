@extends('dashboard.layout.app')

@section('title', 'Users')

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
      .table-responsive {
        font-size: 0.85rem;
      }
      .btn-sm {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
      }
    }
  </style>
@endpush

@section('content')
  <!-- Main Content -->
  <div class="content">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4>Daftar Users</h4>
      <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary">Tambah User</a>
    </div>

    <!-- Filter Role & Status -->
    <div class="mb-3 d-flex align-items-center flex-wrap gap-3">
      <div>
        <label class="form-label me-2">Filter Role:</label>
        <select class="form-select w-auto d-inline-block" id="filterRole">
          <option value="all" selected>Semua</option>
          <option value="admin">Admin</option>
          <option value="editor">Editor</option>
          <option value="user">User</option>
        </select>
      </div>
    </div>

    <!-- Users Table -->
    <div class="card">
      <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              <th>Tanggal Bergabung</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                  <a href="{{ route('dashboard.users.show', $user) }}" class="btn btn-info btn-sm">Detail</a>
                  <a href="{{ route('dashboard.users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('dashboard.users.destroy', $user) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
