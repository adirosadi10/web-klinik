<div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
  <table class="table" style="width: 100%;">
    <thead>
      <tr>
        <th>No.</th>
        <th>Tgl. Transaksi</th>
        <th>No Transaksi</th>
        <th>No ID</th>
        <th>Nama Pasien</th>
        <th>Alamat</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach($selesai as $data)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$data->tgl_transaksi}}</td>
        <td>{{$data->id_transaksi}}</td>
        <td>{{$data->no_id}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->alamat}}</td>
        <td>
          <?php
          echo "Rp " . number_format($data->total, 0, ',', '.');
          ?></td>
        <td>
          SELESAI
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>