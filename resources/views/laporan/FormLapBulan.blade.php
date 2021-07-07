@extends('layouts/user/template')

@section('title', 'Form Laporan Periodik')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="callout callout-info">
        <div class="row">
          <div class="col-6">
            <input type="date" name="awal" id="awal">
            <input type="date" name="akhir" id="akhir">
            <a href="" target="_blank" onclick="this.href='/cetak-bulanan/'+document.getElementById('awal').value+'/'+document.getElementById('akhir').value" class="btn btn-primary">
              Cetak
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection