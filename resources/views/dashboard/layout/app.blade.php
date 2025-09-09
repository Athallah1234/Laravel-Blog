<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - Dashboard NetioraBlog</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  @stack('styles')
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <h4 class="text-center fw-bold mb-4">Admin Panel</h4>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('dashboard.articles.index') }}" class="{{ request()->routeIs('dashboard.articles.*') ? 'active' : '' }}">Articles</a>
    <a href="{{ route('dashboard.categories.index') }}" class="{{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">Categories</a>
    <a href="{{ route('dashboard.users.index') }}" class="{{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">Users</a>
    <a href="#">Comments</a>
    <a href="#">Settings</a>
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
      @csrf
      <button type="submit" class="sidebar-link text-start border-0 bg-transparent">
        Logout
      </button>
    </form>
  </div>

  <!-- Overlay for mobile -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <!-- Navbar Admin -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-admin px-4">
    <div class="container-fluid">
      <span class="sidebar-toggle me-3" id="sidebarToggle">&#9776;</span>
      <span class="navbar-brand fw-bold">Dashboard</span>
      <div class="ms-auto">
        <span class="fw-bold">Admin</span>
      </div>
    </div>
  </nav>

  @yield('content')

  <!-- Footer -->
  <footer class="text-center py-4 bg-light mt-auto" id="footer">
    <div class="container">
      <p class="mb-0">&copy; 2025 Dashboard. Semua hak cipta dilindungi.</p>
      <small class="text-muted">Designed with Bootstrap 5 & Inter Font</small>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Sidebar Toggle Script -->
  @stack('scripts')
  <script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.add('show');
      overlay.classList.add('show');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.remove('show');
      overlay.classList.remove('show');
    });
  </script>
</body>
</html>
