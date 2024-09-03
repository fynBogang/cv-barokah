<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit{{ $g->id }}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="edit{{ $g->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $g->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('petugas-update', $g->id) }}" method="POST" class="form-material"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group form-default">
                        <input type="text" name="name" class="form-control fill" value="{{ $g->name }}">
                        <span class="form-bar"></span>
                        <label class="float-label">Nama Petugas</label>
                    </div>

                    <div class="form-group form-default">
                        <input type="email" name="email" class="form-control fill" value="{{ $g->email }}">
                        <span class="form-bar"></span>
                        <label class="float-label">Email</label>
                    </div>

                    <div class="form-group form-default">
                        <input type="text" name="password" class="form-control fill" value="{{ $g->password }}">
                        <span class="form-bar"></span>
                        <label class="float-label">Password</label>
                    </div>

                    <div class="form-group form-default">
                        <select name="role" class="form-control fill">
                            <option>Pilih Role Petugas</option>
                            @if ($g->role == 'petugas')
                                <option value="petugas" selected>Petugas</option>
                                <option value="pelanggan">Pelanggan</option>
                            @elseif ($g->role == 'pelanggan')
                                <option value="petugas">Petugas</option>
                                <option value="pelanggan" selected>Pelanggan</option>
                            @endif
                        </select>
                    </div>
                    {{-- <div class="form-group form-default">
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                    </div> --}}
                    <div class="form-group form-default">
                        <textarea name="alamat" rows="5" cols="5" class="form-control" placeholder="Alamat">{{ $g->alamat }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
