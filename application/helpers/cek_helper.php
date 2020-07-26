<?php 


function is_logged_in()
{
	$ci = get_instance();

	if (!$ci->session->userdata('email')) {

		redirect('home');

	}
}

function user()
{
	$ci = get_instance();

	return $ci->db->get_where('user', ['email' => $ci->session->userdata('email')])->row_array();
}

function indoDate()
{
	$h = date('N');
	$d = date('d');
	$m = date('m');
	$y = date('Y');

	if ($h == 0) {
		$h = "Minggu";
	} else if ($h == 1) {
		$h = "Senin";
	} else if ($h == 2) {
		$h = "Selasa";
	} else if ($h == 3) {
		$h = "Rabu";
	} else if ($h == 4) {
		$h = "Kamis";
	} else if ($h == 5) {
		$h = "Jumat";
	} else if ($h == 6) {
		$h = "Sabtu";
	}

	if ($m == 1) {
		$m = "Januari";
	} else if ($m == 2) {
		$m = "Februari";
	} else if ($m == 3) {
		$m = "Maret";
	} else if ($m == 4) {
		$m = "April";
	} else if ($m == 5) {
		$m = "Mei";
	} else if ($m == 6) {
		$m = "Juni";
	} else if ($m == 7) {
		$m = "Juli";
	} else if ($m == 8) {
		$m = "Agustus";
	} else if ($m == 9) {
		$m = "September";
	} else if ($m == 10) {
		$m = "Oktober";
	} else if ($m == 11) {
		$m = "November";
	} else {
		$m = "Desember";
	}

	return $h . ", " . $d . " " . $m . " " . $y;
}

function indoDateMinOneMonth()
{
	$h = date('N');
	$d = date('d');
	$m = date('m') - 1;
	$y = date('Y');

	$real_month = date('F');

	if ($h == 0) {
		$h = "Minggu";
	} else if ($h == 1) {
		$h = "Senin";
	} else if ($h == 2) {
		$h = "Selasa";
	} else if ($h == 3) {
		$h = "Rabu";
	} else if ($h == 4) {
		$h = "Kamis";
	} else if ($h == 5) {
		$h = "Jumat";
	} else if ($h == 6) {
		$h = "Sabtu";
	}

	if ($m == 1) {
		$m = "Januari";
	} else if ($m == 2) {
		$m = "Februari";
	} else if ($m == 3) {
		$m = "Maret";
	} else if ($m == 4) {
		$m = "April";
	} else if ($m == 5) {
		$m = "Mei";
	} else if ($m == 6) {
		$m = "Juni";
	} else if ($m == 7) {
		$m = "Juli";
	} else if ($m == 8) {
		$m = "Agustus";
	} else if ($m == 9) {
		$m = "September";
	} else if ($m == 10) {
		$m = "Oktober";
	} else if ($m == 11) {
		$m = "November";
	} else {
		$m = "Desember";
	}

	if ($real_month == 'January') {
		return $m . " " . ($y - 1);
	} else {
		return $m . " " . $y;
	}

}