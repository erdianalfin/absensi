<div class="container-fluid">

	<div class="absensi-data" data-absensidata="<?= $this->session->flashdata('absensi'); ?>"></div>

	<div class="absen-data" data-absendata="<?= $this->session->flashdata('absen'); ?>"></div>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?php if ( user()['role_id'] == 1) : ?>

		<a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#absensiModal">Absen Siswa</a>

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

<!-- Modal -->
<div class="modal fade" id="absensiModal" tabindex="-1" role="dialog" aria-labelledby="absensiModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="absensiModalLabel">Tambah Data Absensi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('absensi'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<select class="custom-select" name="kelas" id="kelas">
							<option value="" hidden>Pilih Kelas</option>
							<?php foreach ($kelas as $kls) : ?>
								<option value="<?= $kls['id_kelas'] ?>"><?= $kls['kelas']; ?></option>
							<?php endforeach ?>
						</select>
						<?= form_error('kelas', '<span class="text-danger">', '</span>') ?>
					</div>
					<div class="form-group">
						<select class="custom-select" name="siswa" id="siswa" disabled>
							<option value="">Pilih Siswa</option>
						</select>
						<?= form_error('siswa', '<span class="text-danger">', '</span>') ?>
					</div>
					<div class="form-group">
						<select class="custom-select" name="keterangan" id="keterangan" disabled>
							<option value="" hidden>Pilih Keterangan</option>
							<option value="Sakit">Sakit</option>
							<option value="Izin">Izin</option>
							<option value="Alfa">Alfa</option>
							<option value="PKL">PKL</option>
						</select>
					</div>
					<?= form_error('keterangan', '<span class="text-danger">', '</span>') ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>

		</div>
	</div>
</div>

</div>

</div>

<?php if ($this->session->flashdata('absen_error')) : ?>
	<script>
		$('#absensiModal').modal('show');
	</script>
<?php endif ?>

<script>
	
	$('#kelas').change(function(){

		let kelas = $(this).val();

		$.ajax({

			url: '<?= base_url('absensi/getSiswaByKelas/') ?>' + kelas,
			data: {},
			type: 'get',
			dataType: 'html',
			success: function(result)
			{
				$('#siswa').html(result);
				$('#siswa').removeAttr('disabled');
			}
		})

	})

	$('#siswa').change(function(){

		$('#keterangan').removeAttr('disabled');

	})

</script>