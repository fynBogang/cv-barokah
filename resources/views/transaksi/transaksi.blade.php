@extends('index')
@section('isi-content')
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body button-page">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 id="infoSetting">Transaksi Pemasukan</h5>
                                    <span id="infoDetail">Data Transaksi
                                    </span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    {{-- <a href="/export" class="btn btn-success">Export</a> --}}
                                    @if (Auth::user()->role == 'petugas')
                                        @include('transaksi.tambah')
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="tableMonitoring">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Nama Barang</th>
                                                    <th>Banyak Barang/KG</th>
                                                    <th>Harga Barang/Rp</th>
                                                    <th>Total Harga/Rp</th>
                                                    <th>Tanggal Transaksi</th>
                                                    @if (Auth::user()->role == 'petugas')
                                                        <th>Aksi</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaksi as $g)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $g->nama_user }}</td>
                                                        <td>{{ $g->nama_barang }}</td>
                                                        <td>{{ $g->jmlmasuk }}</td>
                                                        <td>IDR. {{ number_format($g->harga) }}</td>
                                                        <td>IDR. {{ number_format($g->harga * $g->jmlmasuk) }}</td>
                                                        <td>{{ $g->waktu }}</td>
                                                        {{-- <td> <img src="{{ asset('images/petugas/' . $g->gambar) }}"
                                                                class="img-fluid img-thumbnail" width="200px"> </td> --}}
                                                        @if (Auth::user()->role == 'petugas')
                                                            <td>
                                                                {{-- @include('transaksi.edit') --}}
                                                                <button class="btn btn-danger"
                                                                    onclick="if (confirm('Hapus Data {{ $g->nama_user }}?')){document.getElementById('destroy{{ $g->id }}').submit();}
                                                                else{event.stopPropagation(); event.preventDefault();};">
                                                                    Hapus
                                                                </button>

                                                                <form id="destroy{{ $g->id }}"
                                                                    action="{{ route('transaksi-destroy', $g->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                                            </td>
                                                        @endif

                                                    </tr>
                                                @endforeach
                                                <h5 class="total">Total Pemasukan IDR.
                                                    {{ number_format($total_pemasukan) }}</h5>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                {{-- <div class="card-block table-border-style">
                                    
                                    @if (Auth::user()->role == 'petugas')
                                        @include('transaksi.tbarang')
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="tableMonitoring">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Nama Barang</th>
                                                    <th>Banyak Barang/KG</th>
                                                    <th>Harga Barang/Rp</th>
                                                    <th>Total Harga/Rp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaksi as $g)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $g->nama_user }}</td>
                                                        <td>{{ $g->nama_barang }}</td>
                                                        <td>{{ $g->qt }}</td>
                                                        <td>IDR. {{ number_format($g->harga) }}</td>
                                                        <td>IDR. {{ number_format($g->harga * $g->qt) }}</td>
                                                       
                                                        @if (Auth::user()->role == 'petugas')
                                                            <td>
                                                               
                                                                <button class="btn btn-danger"
                                                                    onclick="if (confirm('Hapus Data {{ $g->nama_user }}?')){document.getElementById('destroy{{ $g->id }}').submit();}
                                                                else{event.stopPropagation(); event.preventDefault();};">
                                                                    Hapus
                                                                </button>

                                                                <form id="destroy{{ $g->id }}"
                                                                    action="{{ route('transaksi-destroy', $g->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                                            </td>
                                                        @endif

                                                    </tr>
                                                @endforeach

                                                <h5 class="total">Total Pengeluaran IDR.
                                                    {{ number_format($total_pengeluaran) }}</h5>

                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
@endsection
