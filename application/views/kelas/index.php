
<!-- Begin Page Content -->
<div class="container ">

  <div class="kelas-data" data-kelasdata="<?= $this->session->flashdata('kelas'); ?>"></div>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg-12">

			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

			<?= $this->session->flashdata('messege') ?>

			<?php if ( user()['role_id'] == 1) : ?>

				<a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newKelasModal">Add New Kelas</a>

			<?php endif; ?>

			<div class="card shadow">
				<div class="card-body">
					<table class="table table-striped table-bordered text-center" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Kelas</th>

								<?php if ( user()['role_id'] == 1) : ?>

									<th>Action</th>

								<?php endif; ?>

							</tr>
						</thead>
						<tbody>
							
							<?php $i = 1; foreach($kelas as $k) : ?>

							<tr>
								<th><?= $i++; ?></th>
								<td><?= $k['kelas']; ?></td>

								<?php if ( user()['role_id'] == 1) : ?>

									<td>
										<a href="<?= base_url('kelas/hapus/') ?><?= $k['id_kelas'] ?>" class="btn btn-danger hapus-kelas"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="newKelasModal" tabindex="-1" role="dialog" aria-labelledby="newKelasModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newKelasModalLabel">Add New Kelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('kelas'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas name">
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



<!-- Modal -->
<div class="modal fade" id="editkelas" tabindex="-1" role="dialog" aria-labelledby="editkelasLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editkelasLabel">Add New Kelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('kelas'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="edit_kelas" name="kelas" placeholder="Kelas name">
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






<script>
	
	$(".editbtn").click(function(){

		let id_kelas = $(this).data('id_kelas')

		$.ajax({

			url: 'kelas/getkelas',
			data: 'id_kelas=' + id_kelas,
			dataType: 'json',
			type: 'post',
			success: function(result) {
				console.log(result);
				$('#edit_kelas').val(result.kelas)
			}

		})

	})

</script>