<div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
  <table class="table w-100" style="width: 100%;">
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
      @foreach($tunggu as $data)
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$data->id_transaksi}}">Bayar <i class="fas fa-arrow-right"></i></button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>