
<!-- Begin Page Content -->
<div class="container ">
	
	<div class="siswa-data" data-siswadata="<?= $this->session->flashdata('siswa'); ?>"></div>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-body">
					<form action="" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="hidden" name="id" value="<?= $siswa['id']; ?>">
								<div class="form-group">
									<label for=""></label>
									<input type="text" class="form-control" id="nisn" name="nisn" value="<?= $siswa['nisn'] ?>" placeholder="Masukan nisn" readonly>
									<?= form_error('nisn', '<span class="text-danger">', '</span>') ?>
								</div>
								<div class="form-group">
									<label for=""></label>
									<input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama'] ?>" placeholder="Masukan nama">
									<?= form_error('nama', '<span class="text-danger">', '</span>') ?>
								</div>
								<div class="form-group">
									<label for="jenis"></label>
									<select name="jenis" id="jenis" class="custom-select">
										<option value="" hidden>Jenis kelamin</option>

										<?php foreach( $jenis as $j) : ?>

											<?php if ( $j == $siswa['jenis']) : ?>

												<option value="<?= $j; ?>" selected><?= $j; ?></option>

												<?php else : ?>

													<option value="<?= $j; ?>"><?= $j; ?></option>

												<?php endif; ?>

											<?php endforeach; ?>

										</select>
										<?= form_error('jenis', '<span class="text-danger">', '</span>') ?>
									</div>

								</div>

								<div class="col-md-6">

									<div class="form-group">
										<label for="kelas"></label>
										<select name="id_kelas" id="kelas" class="custom-select">
											<option value="" hidden>Pilih kelas</option>

											<?php foreach( $kelas as $k) : ?>

												<?php if ($k['id_kelas'] == $siswa['id_kelas']) : ?>

													<option value="<?= $k['id_kelas'] ?>" selected><?= $k['kelas'] ?></option>

												<?php endif; ?>

												<option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>

											<?php endforeach; ?>
										</select>
										<?= form_error('id_kelas', '<span class="text-danger">', '</span>') ?>
									</div>
									<div class="form-group">
										<label for="alamat"></label>
										<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa['alamat'] ?>" placeholder="Masukan alamat">
										<?= form_error('alamat', '<span class="text-danger">', '</span>') ?>
									</div>

									<button type="submit" class="btn btn-primary mt-4">Edit</button>
									<a href="<?= base_url('siswa'); ?>" class="btn btn-danger mt-4">Batal</a>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
