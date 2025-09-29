@extends('layouts.app')
@section('content')
<h2 class="mb-2">About</h2>
<div class="about-card">
  <img src="{{ asset('img/foto-bima.jpg') }}" alt="Foto" class="about-photo">
  <div>
    <div class="about-head">Aplikasi ini dibuat oleh:</div>
    <div class="about-rows">
      <div class="cell">Nama</div><div class="cell">:</div><div class="cell">Bima Wahyu Mubarok</div>
      <div class="cell">Prodi</div><div class="cell">:</div><div class="cell">D3-MI PSDKU Kediri</div>
      <div class="cell">NIM</div><div class="cell">:</div><div class="cell">2231730073</div>
      <div class="cell">Tanggal dibuat</div><div class="cell">:</div><div class="cell">15 September 2025</div>
    </div>
  </div>
</div>
@endsection
