@extends('layouts/user/template')
@section('title', 'Form Laporan Periodik')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="callout callout-info">
        <div class="row">
          <div class="col-6">
            <input type="date" name="tgl" id="tgl">
            <a href="" target="_blank" onclick="this.href='/cetak-harian/'+document.getElementById('tgl').value" class="btn btn-primary">
              Cetak
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection