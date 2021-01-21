<nav class="navbar navbar-light bg-light">
    <div class="row" style="height: 130px;">
        <div class="col-sm-2">
            <img src="/icon/logopkk.png" class="img-fluid float-left" width="130px" alt="">
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col" align="center">
                    <!-- <img src="/icon/judulpkk.png" alt="judul"> -->
                    <h2 class="align-middle">PKK KECAMATAN BERBAH</h2>
                </div>
            </div>
            <div class="row">
                <?php if (session()) : ?>
                    <marquee bgcolor="#fdfdfd" direction="left" scrollamount="5">
                        <div class="embed-responsive embed-responsive-16by9" style="width: 1100px; height: 40px;">
                            <!-- <marquee bgcolor="#fdfdfd" direction="left" scrollamount="5" width="1100px">
                    <div id="carouselStandar" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselStandar" data-slide-to="0" class="active" align="center"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/flash/</?= session('flash'); ?>" class="d-block w-100" alt="gambar">
                            </div>
                        </div>
                    </div>
                </marquee> -->
                            <!-- <marquee bgcolor="#fdfdfd" direction="left" scrollamount="5"> -->
                            <embed src="/flash/<?= session('flash'); ?>">
                            <!-- </marquee> -->
                            <!-- <embed src="/flash/</?= session('flash'); ?>"> -->
                        </div>
                    </marquee>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-2">
            <img src="/icon/logo_kecBerbah.png" class="img-fluid float-right" width="110px" alt="Kabupaten Sleman">
        </div>
    </div>
</nav>
<!-- <nav class="navbar navbar-light bg-light">
    <div class="navbar-nav mx-auto">
         <form class="form-inline">
            <input class="form-control mr-sm-0" type="search" aria-label="Search">
            <button class="btn" type="submit">
                <img src="/icon/search.png" width="40" height="40" alt="" loading="lazy">
            </button>
        </form> -->
<!-- </div>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> Menu
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link <?= ($PagesAdmin == 'home') ? 'active' : ''; ?>" href="/admin/home">Home</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($PagesAdmin == 'pokja') ? 'active' : ''; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        POKJA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/pokjai">POKJA I</a>
                        <a class="dropdown-item" href="/admin/pokjaii">POKJA II</a>
                        <a class="dropdown-item" href="/admin/pokjaiii">POKJA III</a>
                        <a class="dropdown-item" href="/admin/pokjaiv">POKJA IV</a>
                    </div>
                </li>
                <a class="nav-link <?= ($PagesAdmin == 'pendataan') ? 'active' : ''; ?>" href="/admin/data">Data</a>
                <a class="nav-link <?= ($PagesAdmin == 'laporan') ? 'active' : ''; ?>" href="/admin/laporan">Monitoring & Laporan</a>
                <a class="nav-link <?= ($PagesAdmin == 'tentang') ? 'active' : ''; ?>" href="/admin/tentang">Tentang</a>
            </div>
            <div class="navbar-nav mx-auto">
                <form action="/admin/cari" class="form-inline" method="post">
                    <input class="form-control" type="search" aria-label="Search" placeholder="cari..." name="keywords">
                    <button class="btn" type="submit" name="submit">
                        <img src="/icon/search.png" width="40" height="40" alt="" loading="lazy">
                    </button>
                </form>
            </div>
            <div class="btn-group dropleft">
                <img id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="/img/iconadmin.png" width="40px" height="40px">
                <div class="dropdown-menu bg-light">
                    <a class="dropdown-item" type="button"><?= session('nama') ?></a>
                    <?php if (allow('1')) : ?>
                        <a class="dropdown-item" type="button" href="/admin">Daftar admin</a>
                        <a class="dropdown-item" type="button" href="/visimisi">Visi Misi</a>
                        <a class="dropdown-item" type="button" href="/flash/index">Atur Flash</a>
                    <?php endif; ?>
                    <a class="dropdown-item" type="button" href="/admin/ganti/<?= session('id_admin') ?>">Ubah Password</a>
                    <hr>
                    <a class="dropdown-item" type="button" href="/logout">Logout</a>
                </div>
            </div>

        </div>
    </div>
</nav>
<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Aisyiyah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="/">Home</a>
                <a class="nav-link" href="/pages/about">About</a>
                <a class="nav-link" href="/pages/contact">Kontak</a>
                <a class="nav-link" href="/komik">Komik</a>
            </div>
        </div>
    </div>
</nav>-->