const flashData = $('.flash-data').data('flashdata');

if (flashData) {

	Swal.fire("user", flashData, "success");

}


const siswaData = $('.siswa-data').data('siswadata');

if (siswaData) {

	Swal.fire("Data siswa", siswaData, "success");

}

const kelasData = $('.kelas-data').data('kelasdata');

if (kelasData) {

	Swal.fire("Data kelas", kelasData, "success");

}


const alertData = $('.alert-data').data('alertdata');

if (alertData) {

	Swal.fire("User", alertData, "error");

}


const absensiData = $('.absensi-data').data('absensidata');

if (absensiData) {

	Swal.fire("Absensi", absensiData, "success");

}


const absenData = $('.absen-data').data('absendata');

if (absenData) {

	Swal.fire("Absensi", absenData, "error");

}



const rekabData = $('.rekab-data').data('rekabdata');

if (rekabData) {

	Swal.fire("Rekap Data", rekabData, "success");

}


const rekapData = $('.rekap-data').data('rekapdata');

if (rekapData) {

	Swal.fire("Rekap Data", rekapData, "error");

}

// tombol hapus siswa

$('.hapus-siswa').on('click', function (e) {
	
	e.preventDefault();

	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data siswa akan di hapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});



// tombol hapus kelas

$('.hapus-kelas').on('click', function (e) {
	
	e.preventDefault();

	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data kelas akan di hapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});



// tombol hapus kelas

$('.hapus-user').on('click', function (e) {
	
	e.preventDefault();

	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data user akan di hapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});



// tombol hapus kelas

$('.hapus-absensi').on('click', function (e) {
	
	e.preventDefault();

	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data absensi akan di hapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
								
