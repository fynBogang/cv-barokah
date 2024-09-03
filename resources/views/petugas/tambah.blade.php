<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
    Tambah +
</button>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('petugas-tambah') }}" method="POST" class="form-material"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group form-default">
                        <input id="name" type="text" name="name" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Nama </label>
                    </div>

                    <div class="form-group form-default">
                        <input id="email" type="email" name="email" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Email </label>
                    </div>

                    <div class="form-group form-default">
                        <input id="password" type="password" name="password" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Password</label>
                    </div>

                    <div class="form-group form-default">
                        <select name="role" class="form-control fill">
                            <option>Role User</option>
                            <option value="petugas">Petugas</option>
                            <option value="pelanggan">pelanggan</option>
                        </select>
                    </div>

                    <div class="form-group form-default">
                        <textarea name="alamat" rows="5" cols="5" class="form-control" placeholder="Alamat"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
