@extends('index')
@section('isi-content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Beranda</h5>
                        <p class="m-b-0">Selamat Datang</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href=""> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Beranda</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pelanggan</h5>
                                </div>
                                <div class="card-block">
                                    <h1>{{ $pelanggan }}</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <li class="{{ Nav::isRoute('transaksi') }}">
                                        <a href="{{ route('transaksi') }}">
                                            <h5>Total Pemasukan</h5>
                                        </a>
                                    </li>

                                </div>
                                <div class="card-block">
                                    <h2>IDR. {{ number_format($total_pemasukan) }}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <li class="{{ Nav::isRoute('pengeluaran') }}">
                                        <a href="{{ route('pengeluaran') }}">
                                            <h5>Total Pengeluaran</h5>
                                        </a>
                                    </li>
                                </div>
                                <div class="card-block">
                                    <h2>IDR. {{ number_format($total_pengeluaran) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="styleSelector"></div>
    </div>
@endsection
