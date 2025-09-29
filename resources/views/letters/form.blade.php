@extends('layouts.app')
@section('content')
<h2>Arsip Surat >> Unggah</h2>
<p class="text-muted mb-3">Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br><span class="d-block">Catatan:</span></p>
<ul><li>Gunakan file berformat PDF</li></ul>
<form method="post" action="{{ route('letters.store') }}" enctype="multipart/form-data" class="form-wf">@csrf
  <div class="wf-row"><label>Nomor Surat</label><input name="nomor_surat" class="form-control" required></div>
  <div class="wf-row"><label>Kategori</label><select name="category_id" class="form-select" required>
    <option value="">-- pilih --</option>@foreach($categories as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach
  </select></div>
  <div class="wf-row"><label>Judul</label><input name="judul" class="form-control" required></div>
  <div class="wf-row"><label>File Surat (PDF)</label><input type="file" name="file" class="form-control" accept="application/pdf" required></div>
  <div class="mt-2"><a href="{{ route('letters.index') }}" class="btn btn-neutral me-2">&laquo;&laquo; Kembali</a>
  <button class="btn btn-wf btn-lihat">Simpan</button></div>
</form>
@endsection
