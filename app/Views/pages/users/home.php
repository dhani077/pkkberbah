<?= $this->extend('layout/users/template'); ?>

<?= $this->section('content'); ?>

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
					<img src="/img/<?= $k['foto']; ?>" height="auto" width="60%">
				</a>
			<?php endif; ?>
		</tr>
		<p>&nbsp;</p>
		<tr>
			<?php if ($k['video'] == "") : ?>
				<td></td>
			<?php endif; ?>
			<?php if ($k['video'] != "") : ?>
				<video controls height="auto" width="60%">
					<source src="/img/<?= $k['video']; ?>">
				</video>
			<?php endif; ?>
		</tr>
		<tr>
			<p><?= $k['keterangan']; ?></p>
		</tr>
	<?php endforeach; ?>
</table>

<?= $this->endSection(); ?>