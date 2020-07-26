
<!-- Begin Page Content -->
<div class="container ">
	
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg-12">

			<?php if ( user()['role_id'] == 1) : ?>

				<a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newuserModal">Add New Admin</a>

			<?php endif; ?>

			<div class="card shadow">
				<div class="card-body">
					<table class="table table-striped table-bordered text-center" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Role id</th>
								<?php if (user()['role_id'] == 1) : ?>

									<th>Action</th>
									
								<?php endif ?>
							</tr>
						</thead>
						<tbody>
							
							<?php $i = 1; foreach($user as $s) : ?>
							
							<tr>
								<th><?= $i++; ?></th>
								<td><?= $s['name']; ?></td>
								<td><?= $s['email']; ?></td>
								<td><?= $s['role']; ?></td>

								<?php if (user()['role_id'] == 1) : ?>

									<td>
										<a href="<?= base_url('admin/hapus/') ?><?= $s['id']; ?>" class="btn btn-danger hapus-user btn-sm"><i class="fas fa-trash"></i></a>
									</td>
									
								<?php endif ?>

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
<div class="modal fade" id="newuserModal" tabindex="-1" role="dialog" aria-labelledby="newuserModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newuserModalLabel">Add New admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Full Name">
						<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Email Address">
						<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
						<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
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
