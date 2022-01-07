<?php
	$nama_pic = $_FILES['foto']['name'];
	$lokasi_foto = $_FILES['foto']['tmp_name'];
	$tipe_foto = $_FILES['foto']['type'];
	$ukuran_foto = $_FILES['foto']['size'];

	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensifoto = explode('.', $nama_pic);
	$ekstensifoto = strtolower(end($ekstensifoto));
	if (!in_array($ekstensifoto, $ekstensigambarvalid)) {
		echo "900";
		die;
	}
	if ($ukuran_foto>2000000){
		echo "800";
		die;
	}
	$nama_foto = "SISWA_" . round(microtime(true) * 1000) . '.' . $ekstensifoto;
	if (file_exists(base_url("assets/foto_siswa/$nama_foto"))){
		$nama_foto = "SISWA_0000000000000".$ekstensifoto;
	}
	if (count($_FILES) > 0) {
		move_uploaded_file($lokasi_foto, 'assets/foto_siswa/' . $nama_foto);
	}
	// header('Access-Control-Allow-Origin: *');
	//
	// // echo json_encode($_REQUEST);
	// echo json_encode($_FILES);
