@extends('layouts.app')
@section('content')
<h2 class="mb-1">Arsip Surat</h2>
<p class="text-muted">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
<form class="search-bar mb-3" method="get">
  <label for="q">Cari surat:</label>
  <div class="search-wrap"><span class="search-icon">🔍</span>
    <input id="q" class="form-control search-input" type="search" name="q" value="{{ $q }}" placeholder="search">
  </div>
  <button class="btn btn-search ms-1">Cari!</button>
</form>
<div class="table-responsive">
<table class="table table-wireframe align-middle">
  <thead><tr><th>Nomor Surat</th><th>Kategori</th><th>Judul</th><th>Waktu Pengarsipan</th><th>Aksi</th></tr></thead>
  <tbody>
  @forelse($letters as $l)
    <tr id="row-{{ $l->id }}">
      <td>{{ $l->nomor_surat }}</td><td>{{ $l->category->name }}</td>
      <td>{{ $l->judul }}</td><td>{{ optional($l->archived_at)->format('Y-m-d H:i') }}</td>
      <td class="d-flex gap-2 flex-wrap">
        <form id="del-{{ $l->id }}" method="post" action="{{ route('letters.destroy',$l) }}">@csrf @method('DELETE')
          <button type="button" class="btn btn-wf btn-hapus btn-sm" onclick="confirmDelete({{ $l->id }})">Hapus</button>
        </form>
        <a class="btn btn-wf btn-unduh btn-sm" href="{{ route('letters.download',$l) }}">Unduh</a>
        <a class="btn btn-wf btn-lihat btn-sm" href="{{ route('letters.show',$l) }}">Lihat >></a>
      </td>
    </tr>
  @empty
    <tr><td colspan="5" class="text-center text-muted">Belum ada data.</td></tr>
  @endforelse
  </tbody>
</table>
</div>
<div class="mt-2"><a href="{{ route('letters.create') }}" class="btn btn-arsip">Arsipkan Surat..</a></div>
{{ $letters->links() }}
<div class="modal fade" id="confirmModal" tabindex="-1"><div class="modal-dialog modal-dialog-centered">
  <div class="modal-content wf-modal"><div class="modal-header">Alert</div>
    <div class="modal-body">Apakah Anda yakin ingin menghapus arsip surat ini?</div>
    <div class="modal-footer"><button type="button" class="btn btn-neutral" data-bs-dismiss="modal">Batal</button>
      <button type="button" class="btn btn-neutral" id="yaBtn">Ya!</button></div>
  </div></div></div>
@endsection
@push('scripts')
<script>
let currentId=null;
function confirmDelete(id){ currentId=id; new bootstrap.Modal('#confirmModal').show(); }
document.addEventListener('DOMContentLoaded',()=>{
  const ya=document.getElementById('yaBtn');
  if(ya){ ya.addEventListener('click',()=>{ if(currentId){ document.getElementById('del-'+currentId).submit(); } }); }
});
</script>
@endpush
