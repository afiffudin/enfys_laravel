<!-- MODAL -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data Master</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{url('/Data-Atlet/create')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Nomer_Telepon</label>
                        <input type="number" name="Nomer_Telepon" oninput="maxNomer(this)" maxlength = "12" min="4" class="form-control" placeholder="MAX number 12 .." required/>
                    </div>
                    <div class="form-group">
                        <label>Jenis_kelamin</label>
                        <select name="jenis_kelamin" id="Jenis_kelamin" class="form-control" required="true">
                            <option value=""></option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select></div>
                    <div class="form-group">
                        <label>foto_ktp</label>
                        <input name="foto_ktp" type="file" id="foto_ktp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>nomer_ktp</label>
                        <input name="nomer_ktp" type="number" id="nomer_ktp" oninput="maxKTP(this)" maxlength="17" min="17" class="form-control" placeholder="MAX number 17 .." required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="Alamat" class="form-control" required="true"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Cabor</label>
                        <textarea name="Cabor" id="Cabor" class="form-control" required="true"></textarea>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <textarea name="email" id="email" class="form-control" required="true"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Add">
            </div>
            </form>
        </div>
    </div>
</div>

<script>
function maxNomer(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
function maxKTP(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>
<!-- CLOSE MODAL -->