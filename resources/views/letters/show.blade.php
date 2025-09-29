@extends('layouts.app')
@section('content')
<h2>Arsip Surat >> Lihat</h2>
<div class="mb-2">
  <div><strong>Nomor:</strong> {{ $letter->nomor_surat }}</div>
  <div><strong>Kategori:</strong> {{ $letter->category->name }}</div>
  <div><strong>Judul:</strong> {{ $letter->judul }}</div>
  <div><strong>Waktu Unggah:</strong> {{ optional($letter->archived_at)->format('Y-m-d H:i') }}</div>
</div>
<div class="viewer-frame"><div class="viewer-grid">
  <div class="side"></div>
  <iframe class="pdf-frame" src="{{ Storage::url($letter->file_path) }}#toolbar=1" title="Preview Surat"></iframe>
  <div class="side"></div>
</div></div>
<div class="mt-3 d-flex gap-2 flex-wrap">
  <a href="{{ route('letters.index') }}" class="btn btn-neutral">&laquo; Kembali</a>
  <a class="btn btn-wf btn-unduh" href="{{ route('letters.download',$letter) }}">Unduh</a>
  <form class="d-flex align-items-center gap-2" method="post" action="{{ route('letters.update',$letter) }}" enctype="multipart/form-data">
    @csrf @method('PUT') <input type="file" name="file" accept="application/pdf" class="form-control form-control-sm" required>
    <button class="btn btn-neutral btn-sm">Edit/Ganti File</button>
  </form>
</div>
@endsection
