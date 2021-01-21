<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('pesan')) : ?>
	<div class="alert alert-success" role="alert">
		<?= session()->getFlashData('pesan'); ?>
	</div>
<?php endif; ?>
<table class="table table-borderless">
	<?php foreach ($kegiatanpkk as $k) : ?>
		<tr>
			<h4><?= $k['nama_kegiatan']; ?></h4>
		</tr>
		<tr>
			<?php if ($k['foto'] == "") : ?>
				<td></td>
			<?php endif; ?>
			<?php if ($k['foto'] != "") : ?>
				<a href="/img/<?= $k['foto']; ?>">
					<img src="/img/<?= $k['foto']; ?>" width="500px">
				</a>
			<?php endif; ?>
		</tr>
		
		<tr>
			<?php if ($k['video'] != "") : ?>
				<p>&nbsp;</p>
				<video controls width="500px">
					<source src="/img/<?= $k['video']; ?>">
				</video>
			<?php endif; ?>

		</tr>
		<tr>
			<p><?= $k['keterangan']; ?></p>
		</tr>
	<?php endforeach; ?>
</table>
<!-- <div class="row">
		<div class="col-xl-12 mt-5">
			<p>
				<center>PKK Kecamtan Berbah</center>
			</p>
		</div>
	</div> -->
<?= $this->endSection(); ?>