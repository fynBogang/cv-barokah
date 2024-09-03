<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
    Tambah Data
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
            <div class="modal-body">
                <form action="{{ route('transaksi-tambah') }}" method="POST" class="form-material"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group form-default">
                        <input id="nama_user" type="text" name="nama_user" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Nama Pelanggan</label>
                    </div> 
                    <div class="form-group form-default">
                        <input id="nama_barang" type="text" name="nama_barang" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Nama Barang</label>
                    </div> --}}
                    <div class="form-group form-default">
                        <select name="nama_user" class="form-control fill">
                            <option>Pengguna</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-default">
                        <select name="nama_barang" class="form-control fill">
                            <option>Barang</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->nama }}">{{ $barang->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-default">
                        <input id="jmlmasuk" type="number" name="jmlmasuk" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Banyak Barang/KG</label>
                    </div>

                    {{-- <div class="form-group form-default">
                        @foreach ($barangs as $barang)
                             <input id="qt" type="number" name="qt" class="form-control">
                        @endforeach

                        <span class="form-bar"></span>
                        <label class="float-label">Banyak Barang/KG</label>
                    </div> --}}

                    <div class="form-group form-default ">
                        <input id="hargaShow" type="number" class="form-control fill" disabled>
                        <input id="harga" type="hidden" name="harga">
                        <span class="form-bar"></span>
                        <label class="float-label">Harga Barang/Rp</label>
                    </div>

                    <div class="form-group form-default">
                        <input id="waktu" type="datetime-local" name="waktu" class="form-control">
                        <span class="form-bar"></span>
                        <label class="float-label">Tanggal Transaksi</label>
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

@push('js-custom')
    <script>
        $(document).ready(function() {
            $('select[name="nama_barang"]').change(function() {
                var namaBarang = $(this).val();

                // Kirim request ke backend Laravel untuk mendapatkan harga barang
                $.ajax({
                    url: "{{ route('ambil.harga') }}", // Menggunakan helper route untuk URL
                    method: 'GET',
                    data: {
                        nama_barang: namaBarang
                    },
                    success: function(response) {
                        $('#hargaShow').val(response.harga);
                        $('#harga').val(response.harga);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
