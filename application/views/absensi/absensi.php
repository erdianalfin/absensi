<div class="container-fluid">

	<div class="absensi-data" data-absensidata="<?= $this->session->flashdata('absensi'); ?>"></div>

	<div class="absen-data" data-absendata="<?= $this->session->flashdata('absen'); ?>"></div>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?php if ( user()['role_id'] == 1) : ?>

		<a href="<?= base_url() ?>rekap/create" class="btn btn-success mb-4">Rakap Data</a>

	<?php endif; ?>

	<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

	<?= $this->session->flashdata('messege') ?>
	
	<div class="card shadow">
		<div class="card-body">
			<div class="table table-responsive">
				<table class="table table-striped table-bordered text-center" id="example">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Keterangan</th>
							<th>Tanggal</th>
							<?php if (user()['role_id'] == 1) : ?>

								<th>Action</th>

							<?php endif ?>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; foreach($absensi as $absen) : ?>

						<tr>
							<th><?= $i++; ?></th>
							<td><?= $absen['nama']; ?></td>
							<td><?= $absen['kelas']; ?></td>
							<td><?= $absen['keterangan']; ?></td>
							<td><?= $absen['tanggal']; ?></td>

							<?php if (user()['role_id'] == 1) : ?>

								<td>
									<a href="<?= base_url('absensi/hapus/') ?><?= $absen['id_absensi']; ?>" class="btn btn-danger hapus-absensi"><i class="fas fa-trash"></i></a>
								</td>

							<?php endif ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>
