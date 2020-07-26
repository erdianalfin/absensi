
<!-- Begin Page Content -->
<div class="container ">
	
	<div class="siswa-data" data-siswadata="<?= $this->session->flashdata('siswa'); ?>"></div>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg-12">

			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

			<?= $this->session->flashdata('messege') ?>

			<?php if ( user()['role_id'] == 1) : ?>

				<a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newSiswaModal">Add New Siswa</a>

			<?php endif; ?>

			<div class="card shadow">
				<div class="card-body">
					<table class="table table-striped table-bordered text-center" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nisn</th>
								<th>Nama</th>
								<th>Kelas</th>
								<?php if ( user()['role_id'] == 1) : ?>

									<th>Action</th>
									
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							
							<?php $i = 1; foreach($siswa as $s) : ?>
							
							<tr>
								<th><?= $i++; ?></th>
								<td><?= $s['nisn']; ?></td>
								<td><?= $s['nama']; ?></td>
								<td><?= $s['kelas']; ?></td>

								<?php if ( user()['role_id'] == 1) : ?>

									<td>
										<a href="<?= base_url('siswa/edit/') ?><?= $s['id']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
										<a href="<?= base_url('siswa/hapus/') ?><?= $s['id']; ?>" class="btn btn-danger hapus-siswa"><i class="fas fa-trash"></i></a>
									</td>

								<?php endif; ?>

							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newSiswaModal" tabindex="-1" role="dialog" aria-labelledby="newSiswaModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSiswaModalLabel">Add New Siswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukan nisn">
						<?= form_error('nisn', '<span class="text-danger">', '</span>') ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
						<?= form_error('nama', '<span class="text-danger">', '</span>') ?>
					</div>
					<div class="form-group">
						<select name="jenis" class="custom-select" id="jenis">
							<option value="" hidden>Pilih kelamin</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<?= form_error('jenis', '<span class="text-danger">', '</span>') ?>
					</div>
					<div class="form-group">
						<select name="id_kelas" id="kelas" class="custom-select">
							<option value="" hidden>Jenis kelas</option>

							<?php foreach( $kelas as $k) : ?>

								<option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>

							<?php endforeach; ?>
						</select>
						<?= form_error('id_kelas', '<span class="text-danger">', '</span>') ?>
					</div>
					<div class="form-group">
						<textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukan alamat"></textarea>
						<?= form_error('alamat', '<span class="text-danger">', '</span>') ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>

		</div>
	</div>
</div>

