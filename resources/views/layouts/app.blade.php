<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arsip Surat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/wireframe.css') }}">
</head>
<body>
  <div class="container my-3">
    <div class="main-grid">
      <aside class="sidebar p-3">
        <h5 class="mb-4">Menu</h5>
        <ul class="nav flex-column gap-1">
          <li class="nav-item"><a class="nav-link" href="{{ route('letters.index') }}">⭐ Arsip</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">⚙️ Kategori Surat</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">ℹ️ About</a></li>
        </ul>
      </aside>
      <main class="content p-4">
        @if(session('ok'))<div class="alert alert-success">{{ session('ok') }}</div>@endif
        @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        @yield('content')
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body></html>