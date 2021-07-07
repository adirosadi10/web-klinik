@extends('layouts/user/template')
@section('title', 'Transaksi ')
@section('content')
<div class="card">
  <div class="row mt-4">
    <nav class="w-100">
      <div class="nav nav-tabs" id="product-tab" role="tablist">
        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Menunggu Pembayaran</a>
        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Lunas</a>
      </div>
    </nav>
    <div class="tab-content w-100 p-3" id="nav-tabContent">
      @include('transaksi/tunda')
      @include('transaksi/lunas')
    </div>
  </div>
</div>
@include('transaksi/bayar')
@endsection
@section('script')
<script>
  function kurang() {
    var dbil1 = document.getElementById('total').value
    var dbil2 = document.getElementById('bayar').value
    var result = parseFloat(dbil2) - parseFloat(dbil1);
    if (!isNaN(result)) {
      document.getElementById('kembali').value = result;
    }
  }
</script>
<script>
  function valid() {
    if (document.getElementById('kembali').value < 0) {
      alert('Pembayaran kurang !!!!')
      document.getElementById('submit').type = "button";
    } else {
      document.getElementById('submit').type = "submit";
    }
  }
</script>
@endsection