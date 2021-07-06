<div class="modal fade" id="logout">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        <div class="modal-body">
          <p>Apakah yakin akan log out ?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Log Out</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>