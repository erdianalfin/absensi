<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="rekap-data" data-rekapdata="<?= $this->session->flashdata('rekap'); ?>"></div>

	<div class="rekab-data" data-rekabdata="<?= $this->session->flashdata('rekab'); ?>"></div>


	<?php if ( user()['role_id'] == 1) : ?>

		<a href="<?= base_url() ?>rekap/create" class="btn btn-success mb-4">Rakap Data</a>

	<?php endif; ?>

	<div class="card shadow">
		<div class="card-body">
			<table class="table table-striped table-bordered text-center" id="example">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Sakit</th>
						<th>Izin</th>
						<th>Alfa</th>
						<th>Bulan</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach($rekap as $r) : ?>

					<tr>
						<th><?= $i++; ?></th>
						<td><?= $r['nama']; ?></td>
						<td><?= $r['kelas']; ?></td>
						<td><?= $r['sakit']; ?></td>
						<td><?= $r['izin']; ?></td>
						<td><?= $r['alfa']; ?></td>
						<td><?= $r['tgl']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div