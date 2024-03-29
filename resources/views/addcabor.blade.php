<!-- MODAL -->
<div id="addcaborEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data Cabor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/Data-cabor/create" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>ID</label>
                        <input type="hidden" class="form-control" name="id" required>
                    </div>
                    <div class="form-group">
                        <label>nama_cabor</label>
                        <input type="nama_cabor" name="nama_cabor" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CLOSE MODAL -->