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
            <form action="{{ route('barang-update', $g->id) }}" method="POST" class="form-material"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group form-default">
                        <input type="text" name="nama" class="form-control fill" value="{{ $g->nama }}">
                        <span class="form-bar"></span>
                        <label class="float-label">Nama Barang</label>
                    </div>
                    <div class="form-group form-default">
                        <input id="text" type="text" name="qt" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Banyak Barang/KG</label>
                    </div>

                    <div class="form-group form-default">
                        <input id="text" type="text" name="harga" class="form-control fill" value="{{$g->harga}}">
                        <span class="form-bar"></span>
                        <label class="float-label">Harga Barang/Rp</label>
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
