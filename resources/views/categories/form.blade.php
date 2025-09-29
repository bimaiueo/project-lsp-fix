@extends('layouts.app')
@section('content')
<h2>Kategori Surat >> {{ $category->exists ? 'Edit' : 'Tambah' }}</h2>
<p class="text-muted">Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>
<form method="post" action="{{ $category->exists ? route('categories.update',$category) : route('categories.store') }}" class="mt-3 form-wf">
@csrf @if($category->exists) @method('PUT') @endif
  <div class="wf-row"><label>ID (Auto Increment)</label><input class="form-control" value="{{ $category->exists ? $category->id : '' }}" disabled></div>
  <div class="wf-row"><label>Nama Kategori</label><input name="name" class="form-control" value="{{ old('name',$category->name) }}" required></div>
  <div class="wf-row"><label>Judul</label><textarea name="description" class="form-control" rows="4" placeholder="Keterangan kategori">{{ old('description',$category->description) }}</textarea></div>
  <div class="mt-2"><a href="{{ route('categories.index') }}" class="btn btn-neutral me-2">&laquo;&laquo; Kembali</a><button class="btn btn-wf btn-lihat">Simpan</button></div>
</form>
@endsection
