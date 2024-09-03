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
            <form action="{{ route('barang-tambah') }}" method="POST" class="form-material"
                enctype="multipart/form-data">
                @csrf
                {{-- <div class="modal-body">
                    <div class="form-group form-default">
                        <select name="nama" class="form-control fill">
                            <option>Nama Barang</option>
                        @foreach ($barang as $g)
                        <option value="{{$g->nama}}" >{{$g->nama}}</option>
                        @endforeach
                        </select>
                    </div> --}}

                {{-- <div class="form-group form-default">
                        <input id="name" type="text" name="nama" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Nama barang</label>
                    </div> --}}

                <div class="form-group form-default">
                    <select name="nama" class="form-control fill">
                        <option>Nama Barang</option>
                        <option value="Beras Bromo">Beras Bromo</option>
                        <option value="Beras 64">Beras 64</option>
                        <option value="Katul">Katul</option>
                        <option value="Sekam">Sekam</option>
                        <option value="Padi">Padi</option>
                    </select>
                </div>

                <div class="form-group form-default">
                    <input id="jmlbarang" type="number" name="jmlbarang" class="form-control">
                    <span class="form-bar"></span>
                    <label class="float-label">Banyak Barang/KG</label>
                </div>

                <div class="form-group form-default">
                    <input id="harga" type="number" name="harga" class="form-control" (number_format)>
                    <span class="form-bar"></span>
                    <label class="float-label">Harga Barang/Rp</label>
                </div>




                {{-- <div class="form-group form-default">
                        <textarea name="alamat" rows="5" cols="5" class="form-control" placeholder="Alamat"></textarea>
                    </div> --}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan </button>
        </div>
        </form>
    </div>
</div>
</div>
