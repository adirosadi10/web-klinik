@foreach($tindakan as $data)
<div class="modal fade" id="edit{{$data->id_tindakan}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data tindakan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateDataTindakan','id')}}">
          @method('POST')
          @csrf
          <input type="text" name="id_tindakan" class="form-control" value="{{$data->id_tindakan}}" hidden>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Tindakan</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->tindakan}}" name="tindakan" class="form-control" id="inputnama" placeholder=" Tindakan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Tarif</label>
            <div class="col-sm-9">
              <input type="number" value="{{$data->tarif}}" name="tarif" class="form-control" id="inputkode" placeholder="Tarif ..." required>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach