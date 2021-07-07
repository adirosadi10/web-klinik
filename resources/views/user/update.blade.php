@foreach($user as $data)
<div class="modal fade" id="edit{{$data->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Obat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateUser','id')}}">
          @method('POST')
          @csrf
          <input type="text" name="id" required value="{{$data->id}}" hidden>
          <input type="text" name="level" required value="{{$data->level}}" hidden>
          <input type="text" name="password" required value="{{$data->password}}" hidden>
          <input type="text" name="remember_token" required value="{{$data->remember_token}}" hidden>
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" name="name" class="form-control" id="inputkode" placeholder="Username ..." value="{{$data->name}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" value="{{$data->email}}" name="email" class="form-control" id="inputnama" placeholder="Email ..." required>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach