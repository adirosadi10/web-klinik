<div class="row">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nama Obat</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($detail as $data)
        <tr>
          <td>{{$data->nama_obat}}</td>
          <td>{{$data->harga}}</td>
          <td>{{$data->jumlah}}</td>
          <td>{{$data->harga*$data->jumlah}}</td>
          <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_detail}}"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>
      @foreach($total as $data)<?php $total = $data->total; ?>@endforeach
      @foreach($periksa as $data)<?php $tarif = $data->tarif ?>@endforeach
      <tfoot>
        <tr>
          <th colspan="2"></th>
          <th>Biaya Jasa</th>
          <th><?php
              echo "Rp " . number_format($tarif, 0, ',', '.');
              ?></th>
        </tr>
        <tr>
          <th colspan="2"></th>
          <th>Subtotal</th>
          <th>
            <?php
            echo "Rp " . number_format($total, 0, ',', '.');
            ?>
          </th>
        </tr>
        <tr>
          <th colspan="2"></th>
          <th>Total Bayar</th>
          <th>
            <?php
            $totalBayar = $total + $tarif;
            echo "Rp " . number_format($totalBayar, 0, ',', '.');
            ?>
          </th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
<div class="row">
  <form method="POST" action="{{route('simpanTransaksi')}}">
    @method('POST')
    @csrf
    <input hidden name="total" type="text" value="<?= $totalBayar ?>">
    <input hidden name="id" type="text" value="<?= $id ?>">
    <button type="submit" class="btn btn-sm btn-success" style="width: 100%;">Tambah</button>
  </form>
</div>