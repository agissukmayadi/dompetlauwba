<?php
function format_rupiah($price)
{
	$rupiah = number_format($price, 0, ',', '.');
	return 'Rp.' . $rupiah;
}
function generate_id_donation()
{
	$ci = get_instance();

	// Mendapatkan nilai maksimum dari kolom id pada tabel rents
	$query = $ci->db->query('SELECT MAX(id_donation) AS max_id FROM donate');
	$result = $query->row();

	// Mendapatkan nilai maksimum
	$maxId = $result->max_id;

	// Mengekstrak angka dari format R###
	$lastNumber = intval(substr($maxId, 3));

	// Increment angka terakhir
	$newNumber = $lastNumber + 1;

	// Format ulang angka dengan R### format
	$newId = 'DNS' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

	// Jika tabel rents kosong, atur ke R001
	if ($maxId === null) {
		$newId = 'DNS001';
	}

	return $newId;
}

?>