<nav class="navbar navbar-light bg-light">
    <div class="row">
        <div class="col">
            <img src="/icon/logopkk.png" class="img-fluid float-left" width="30%" height="auto" alt="">
        </div>
        <div class="col">
            <div class="row" align="center">
                <h4 class="align-middle">
                    <center>PKK KECAMATAN BERBAH</center>
                </h4>
            </div>
            <div class="row">
                <?php if (session()) : ?>
                    <marquee bgcolor="#fdfdfd" direction="left" scrollamount="5">
                        <div class="embed-responsive embed-responsive-16by9" style="width: 1100px; height: 40px;">
                            <embed src="/flash/<?= session('flash'); ?>">
                        </div>
                    </marquee>
                <?php endif; ?>
            </div>
        </div>
        <div class="col">
            <img src="/icon/logo_kecBerbah.png" class="img-fluid float-right" width="25%" height="auto" alt="Kabupaten Sleman">
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">Menu
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link <?= ($users == 'home') ? 'active' : ''; ?>" href="/users">Home</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($users == 'pokja') ? 'active' : ''; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        POKJA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/users/pokjai">POKJA I</a>
                        <a class="dropdown-item" href="/users/pokjaii">POKJA II</a>
                        <a class="dropdown-item" href="/users/pokjaiii">POKJA III</a>
                        <a class="dropdown-item" href="/users/pokjaiv">POKJA IV</a>
                    </div>
                </li>
                <a class="nav-link <?= ($users == 'laporan') ? 'active' : ''; ?>" href="/users/laporan">Monitoring & Laporan</a>
                <a class="nav-link <?= ($users == 'tentang') ? 'active' : ''; ?>" href="/users/tentang">Tentang</a>
            </div>
            <div class="navbar-nav mx-auto">
                <form action="/users/cari" class="form-inline" method="post">
                    <input class="form-control" type="search" aria-label="Search" placeholder="cari..." name="keywords">
                    <button class="btn" type="submit" name="submit">
                        <img src="/icon/search.png" width="40" height="40" alt="" loading="lazy">
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>