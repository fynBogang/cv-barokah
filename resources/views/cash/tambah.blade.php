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
            <form action="{{ route('cash-tambah') }}" method="POST" class="form-material"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    {{-- <div class="form-group form-default">
                        <input type="text" class="form-control fill"
                            id="nama_petugas" disabled>
                        <span class="form-bar"></span>
                        <label class="float-label">Petugas</label>
                    </div> --}}

                    <div class="form-group form-default">
                        <select id="nama_petugas" class="form-control fill">
                            <label class="float-label">Nama User</label>
                            @foreach ($cash as $c)
                                <option value="{{ $c->userFK->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-default">
                        <input type="hidden" name="barang_id" id="barang_id" required>
                        <select id="nama_barang" class="form-control fill">
                            <label class="float-label">Nama Barang</label>
                            @foreach ($cash as $c)
                                <option value="{{ $c->id }}">{{ $c->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-default">
                        <input id="jmlmasuk" type="number" name="jmlmasuk" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Banyak Barang</label>
                    </div>

                    {{-- <div class="form-group form-default">
                        <select name="nama" class="form-control fill">
                            <label class="float-label">Banyak barang</label>
                        @foreach ($cbar as $c)
                        <option value="{{$c->id}}" >{{$c->qt}}</option>
                        @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group form-default">
                        <select id="harga" name="harga" class="form-control fill">
                            <label class="float-label">Harga barang</label>
                            @foreach ($cash as $c)
                                <option value="{{ $c->id }}">{{ $c->harga }}</option>
                            @endforeach
                        </select>
                    </div>



                    {{-- <div class="form-group form-default">
                        <input id="name" type="text" name="name" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Nama barang</label>
                    </div> --}}

                    {{-- <div class="form-group form-default">
                        <select name="jenis" class="form-control fill">
                            <option>Pilih Jenis Beras</option>
                            <option value="bromo">Bromo</option>
                            <option value="64">64</option>
                        </select>
                    </div> --}}

                    {{-- <div class="form-group form-default">
                        <input id="text" type="text" name="qt" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Banyak Barang/KG</label>
                    </div> --}}

                    <div class="form-group form-default">
                        <input id="text" type="text" name="total" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Total harga</label>
                    </div>
                    <div class="form-group form-default">
                        <input type="text" name="waktu" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Waktu Transaksi</label>
                    </div>




                    {{-- <div class="form-group form-default">
                        <textarea name="alamat" rows="5" cols="5" class="form-control" placeholder="Alamat"></textarea>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" id="tombolSimpan" class="btn btn-primary">Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js-custom')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('barang-show') }}",
                data: {
                    barang_id: Barandid,
                },
                success: function(data) {
                    $('#nama_petugas').val(data.nama_petugas)
                    $('#barang_id').val(data.barang_id)
                    $('#nama_barang').val(data.nama_barang)
                    $('#jmlbarang').val(data.jmlbarang)
                    $('#harga').val(data.harga)
                    $("#tombolSimpan").attr("type", "submit");
                }
            })
        });
    </script>
@endpush
