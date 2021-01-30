<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- My CSS  -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- chartjs -->
    <script src="/linechartjs/Chart.js"></script>
    <!-- <style>
        @media print {
            @page {
                margin-top: 30px;
                margin-bottom: 10px;
            }

            .card,
            .blockquote,
            a#debug-icon-link {
                display: none;
            }
        }
    </style> -->

    <title><?= $tittle; ?></title>
</head>

<body>
    <?= $this->include('layout/admin/navbar'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 pt-2 sidebar">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Visi</div>
                    <div class="card-body">
                        <p class="card-text"><?= session('visi'); ?></p>
                    </div>
                    <div class="card-header">Misi</div>
                    <div class="card-body">
                        <p class="card-text"><?= session('misi'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 pt-4 content">
                <?= $this->renderSection('content'); ?>
            </div>
            <div class="col-xl-2 pt-2 sidebar2">

                <p><strong>10 Program Pokok PKK</strong></p>
                <ol>
                    <li>Pengahayatan dan Pengamalan Pancasila</li>
                    <li>Gotong Royong</li>
                    <li>Pangan</li>
                    <li>Sandang</li>
                    <li>Perumahan dan tata laksana rumah tangga</li>
                    <li>Pendidikan dan Keterampilan</li>
                    <li>Kesehatan</li>
                    <li>Pengembangan hidup berkoperasi</li>
                    <li>Kelestarian lingkungan hidup</li>
                    <li>Perencanaan sehat</li>
                </ol>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            function previewImg() {
                const sampul = document.querySelector('#foto');
                const sampulLabel = document.querySelector('.custom-file-label');
                const imgPreview = document.querySelector('.img-preview');

                sampulLabel.textContent = sampul.files[0].name;

                const fileSampul = new FileReader();
                fileSampul.readAsDataURL(sampul.files[0]);

                fileSampul.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            }
            // function previewImg() {
            //     const foto = document.querySelector('#foto');
            //     const fotoLabel = document.querySelector('.custom-file-input');
            //     const imgPreview = document.querySelector('.img-preview');

            //     fotoLabel.textContent = foto.files[0].name;

            //     const fileFoto = new FileReader();
            //     fileFoto.readAsDataURL(foto.files[0]);

            //     fileSampul.onload = function(e) {
            //         imgPreview.src = e.target.result;
            //     }
            // }

            function previewFlash() {
                const foto = document.querySelector('#nama');
                const fotoLabel = document.querySelector('.custom-file-label');
                const imgPreview = document.querySelector('.img-preview');

                fotoLabel.textContent = foto.files[0].name;

                const fileFoto = new FileReader();
                fileFoto.readAsDataURL(foto.files[0]);

                fileSampul.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            }

            function previewVideo() {
                const foto = document.querySelector('#video');
                const fotoLabel = document.querySelector('.video');
                const imgPreview = document.querySelector('.img-preview');

                fotoLabel.textContent = foto.files[0].name;

                const fileFoto = new FileReader();
                fileFoto.readAsDataURL(foto.files[0]);

                fileSampul.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
<blockquote class="blockquote text-center">
    <footer><cite title="Source Title">PKK Kecamatan Berbah</cite></footer>
</blockquote>

</html>