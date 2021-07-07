@foreach($pendaftaran as $data)
<div class="modal fade" id="edit{{$data->id_daftar}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Proses Pendaftaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateDataPendaftaran','id')}}">
          @method('POST')
          @csrf
          <p>Pendaftaran akan di proses ?</p>
          <input name="id_daftar" value="{{$data->id_daftar}}" hidden>
          <input name="tgl_daftar" value="{{$data->tgl_daftar}}" hidden>
          <input name="no_id" value="{{$data->no_id}}" hidden>
          <input value="{{$data->nama}}" name="nama" hidden>
          <input value="{{$data->jk}}" name="jk" hidden>
          <input value="{{$data->tmp_lahir}}" name="tmp_lahir" hidden>
          <input value="{{$data->tgl_lahir}}" name="tgl_lahir" hidden />
          <input value="{{$data->alamat}}" name="alamat" hidden />
          <input value="{{$data->no_hp}}" name="no_hp" hidden>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Proses</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach