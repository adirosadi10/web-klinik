@foreach($pendaftaran as $data)
<div class="modal fade" id="delete{{$data->id_daftar}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah yakin akan menghapus data ?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="pegawai/delete/{{$data->id_daftar}}" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
@endforeach