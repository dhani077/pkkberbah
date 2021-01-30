<?php if (session('nama')) { ?>
    <?= $this->extend('layout/admin/template'); ?>
<?php } ?>
<?php if (empty(session('nama'))) { ?>
    <?= $this->extend('layout/users/template'); ?>
<?php } ?>

<?= $this->section('content'); ?>
<div class="col">
    <div class="row">
        <div class="col">
            <h5 align="center">SUSUNAN PENGURUS TIM PENGGERAK PKK<br>KECAMATAN BERBAH</h5>
            <br>
            <center>
                <img src="/icon/struktur_organisasi.png" alt="" height="auto" width="100%">
            </center>
        </div>
        <div class="col">
            <p><b>Kontak PKK Kecamatan Berbah</b></p>
            <table>
                <tr>
                    <th>No. Telp</th>
                    <th></th>
                    <th>:</th>
                    <th>(0274) 4435301</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th></th>
                    <th>:</th>
                    <th><a href="mailto:pkk.kecberbah@gmail.com">pkk.kecberbah@gmail.com</a></th>
                </tr>
            </table>
        </div>
    </div>
    <br><br>
    <div class="row">
        <h5>Lokasi Kecamatan Berbah</h5>
        <div class="embed-responsive embed-responsive-21by9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.853279346832!2d110.4406393142523!3d-7.805352894375338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a50bb74dfa311%3A0xc848e035603b71d0!2sDistrict%20Office%20Berbah!5e0!3m2!1sen!2sid!4v1603675086663!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>