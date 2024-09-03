<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ asset('admin/images/avatar-2.jpg') }}" alt="User-Profile-Image">
                {{-- <div class="user-details">
                    <span id="more-details">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span>
                </div> --}}
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="ti-layout-sidebar-left"></i>Logout</a>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label">Menu Utama</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ Nav::isRoute('home') }}">
                <a href="{{ route('home') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @if (Auth::user()->role == 'petugas')
                <li class="{{ Nav::isRoute('petugas') }}">
                    <a href="{{ route('petugas') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class=""></i><b>D</b></span>
                        <span class="pcoded-mtext">Pengguna</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif
            {{-- <li class="{{ Nav::isRoute('petugas') }}">
                <a href="{{ route('petugas') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class=""></i><b>D</b></span>
                    <span class="pcoded-mtext">Pengguna</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> --}}
            {{-- @if (Auth::user()->role == 'admin')
                <li class="{{ Nav::isRoute('tanaman') }}">
                    <a href="{{ route('tanaman') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class=""></i><b>D</b></span>
                        <span class="pcoded-mtext">Petugas</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif --}}
            {{-- @if (Auth::user()->role == 'admin')
                <li class="{{ Nav::isRoute('petugas') }}">
                    <a href="{{ route('petugas') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class=""></i><b>D</b></span>
                        <span class="pcoded-mtext">Pelanggan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif --}}
            <li class="{{ Nav::isRoute('barang') }}">
                <a href="{{ route('barang') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class=""></i><b>D</b></span>
                    <span class="pcoded-mtext">Data Barang</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Nav::isRoute('transaksi') }}">
                <a href="{{ route('transaksi') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class=""></i><b>D</b></span>
                    <span class="pcoded-mtext">Transaksi Pemasukan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="{{ Nav::isRoute('pengeluaran') }}">
                <a href="{{ route('pengeluaran') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class=""></i><b>D</b></span>
                    <span class="pcoded-mtext">Transaksi Pengeluaran</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>






            {{-- <li class="{{ Nav::isRoute('qrcode') }}">
                <a href="{{ route('qrcode') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class=""></i><b>D</b></span>
                    <span class="pcoded-mtext">Scan QR-Code</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> --}}
        </ul>

    </div>
</nav>
