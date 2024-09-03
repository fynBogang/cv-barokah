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
                                    <h5 id="infoSetting">Barang</h5>
                                    <span id="infoDetail">Data Barang
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
                                    @include('cash.tambah')
                                    {{-- <a href="/export" class="btn btn-success">Export</a> --}}
                                    {{-- @include('petugas.import') --}}

                                    <div class="table-responsive">
                                        <table class="table table-hover" id="tableMonitoring">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Nama Barang</th>
                                                    <th>Banyaknya </th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Waktu Transaksi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cash as $c)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $c->userFK->name }}</td>
                                                        <td>{{ $c->barangFK->nama }}</td>
                                                        <td>{{ $c }}</td>
                                                        <td>{{ $c }}</td>
                                                        <td>{{ $c }}</td>
                                                        <td>{{ $c->waktu }}</td>
                                                        {{-- <td> <img src="{{ asset('images/petugas/' . $g->gambar) }}"
                                                                class="img-fluid img-thumbnail" width="200px"> </td> --}}
                                                        <td>
                                                            {{-- @include('barang.edit') --}}
                                                            <button class="btn btn-danger" {{-- onclick="if (confirm('Hapus Data {{ $g->nama }}?')){document.getElementById('destroy{{ $g->id }}').submit();} --}}
                                                                else{event.stopPropagation(); event.preventDefault();};">
                                                                Hapus
                                                            </button>
                                                            {{-- 
                                                            <form id="destroy{{ $g->id }}"
                                                                action="{{ route('barang-destroy', $g->id) }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                            </form> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
@endsection
