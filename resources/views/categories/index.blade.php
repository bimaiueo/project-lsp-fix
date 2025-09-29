@extends('layouts.app')
@section('content')
<h2>Kategori Surat</h2>
<p class="text-muted">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
<form class="search-bar mb-3" method="get">
  <label for="q">Cari kategori:</label>
  <div class="search-wrap"><span class="search-icon">🔍</span>
    <input id="q" class="form-control search-input" type="search" name="q" value="{{ $q }}" placeholder="search">
  </div>
  <button class="btn btn-search">Cari!</button>
</form>
<div class="table-responsive">
<table class="table table-wireframe align-middle">
  <thead><tr><th>ID Kategori</th><th>Nama Kategori</th><th>Keterangan</th><th>Aksi</th></tr></thead>
  <tbody>
  @forelse($categories as $c)
    <tr><td>{{ $c->id }}</td><td>{{ $c->name }}</td><td>{{ $c->description }}</td>
      <td class="d-flex gap-2 flex-wrap">
        <form method="post" action="{{ route('categories.destroy',$c) }}" onsubmit="return confirm('Hapus kategori ini?')">@csrf @method('DELETE')
          <button class="btn btn-wf btn-hapus btn-sm">Hapus</button></form>
        <a class="btn btn-wf btn-lihat btn-sm" href="{{ route('categories.edit',$c) }}">Edit</a>
      </td></tr>
  @empty <tr><td colspan="4" class="text-center text-muted">Belum ada kategori.</td></tr> @endforelse
  </tbody>
</table></div>
<div class="mt-2"><a href="{{ route('categories.create') }}" class="btn btn-add">[ + ] Tambah Kategori Baru…</a></div>
{{ $categories->links() }}
@endsection
