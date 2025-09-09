@extends('dashboard.layout.app')

@section('title', 'Create Article')

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
      .form-label, .form-control, .btn {
        font-size: 0.85rem;
      }
    }
  </style>
@endpush

@section('content')
  <!-- Main Content -->
  <div class="content">

    <div class="card">
      <div class="card-header fw-bold">
        Tambah Artikel Baru
      </div>
      <div class="card-body">
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
        <form action="{{ route('dashboard.articles.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul artikel" required>
          </div>

          <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-select" id="category_id" name="category_id" required>
              <option value="" selected>Pilih kategori</option>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
              <option value="draft" selected>Draft</option>
              <option value="published">Published</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail Artikel</label>
            <input class="form-control" type="file" id="thumbnail" name="thumbnail" accept="image/*">
          </div>

          <div class="mb-3">
            <label for="content" class="form-label">Konten Artikel</label>
            <textarea class="form-control" id="content" name="content" rows="8" placeholder="Tulis konten artikel di sini..." required></textarea>
          </div>

          <div class="mb-3">
            <label for="tags">Tags (pisahkan dengan koma)</label>
            <input type="text" name="tags" class="form-control">
          </div>

          <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-2">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan Artikel</button>
          </div>
        </form>
      </div>
    </div>

  </div>
@endsection

@push('scripts')
  <!-- CKEditor 4 CDN -->
  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'content' );
  </script>
@endpush
