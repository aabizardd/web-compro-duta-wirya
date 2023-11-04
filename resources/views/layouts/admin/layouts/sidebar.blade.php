<nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color: #00247E;padding-top: 70px;">


    <center>

        <img src="{{ asset('/') }}assets/admin/assets/img/logo dwpc.png" alt="" width="100">
    </center>


    <div class="sb-sidenav-menu">



        <div class="nav" style="color: white">
            <div class="sb-sidenav-menu-heading">Main Menu</div>
            <a class="nav-link" href="{{ route('home') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                Profil Kami
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('sejarah') }}">Sejarah</a>
                    <a class="nav-link" href="{{ route('visi-misi') }}">Visi dan Misi</a>
                    <a class="nav-link" href="{{ route('kantor-cabang') }}">Kantor Cabang</a>
                    <a class="nav-link" href="{{ route('legalitas') }}">Legalitas</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#clientDropdown" aria-expanded="false" aria-controls="clientDropdown">
                <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                Client
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse" id="clientDropdown" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('bidang-client') }}">Daftar Bidang Client</a>
                    <a class="nav-link" href="{{ route('client') }}">Daftar Client</a>
                </nav>
            </div>



            <a class="nav-link" href="{{ route('jasa') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Jasa
            </a>

            <a class="nav-link" href="{{ route('berita') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Berita
            </a>

            <a class="nav-link" href="{{ route('kegiatan') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                Foto Kegiatan
            </a>


            <a class="nav-link" href="{{ route('contact-us') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Kontak
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>















































        Start Bootstrap
    </div>
</nav>