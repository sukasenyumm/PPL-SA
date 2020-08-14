<?php 
session_start();
include '../koneksi.php';
$proses = $_GET['proses'];

if($proses == 'add_kategori'){
	mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$_POST[nama_kategori]')");
	header('location:index.php?page=kategori');
}
else if($proses == 'edit_kategori'){
	mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]' WHERE id_kategori = '$_POST[id_kategori]'");
	header('location:index.php?page=kategori');
}
else if($proses == 'delete_kategori'){
	mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$_GET[id_kategori]'");
	header('location:index.php?page=kategori');
}
else if($proses == 'add_barang'){
	$lokasi_file	=$_FILES['foto']['tmp_name'];
	$tipe_file		=$_FILES['foto']['type'];
	$nama_file		=$_FILES['foto']['name'];
	move_uploaded_file($lokasi_file, "../img/produk/$nama_file");

	mysqli_query($koneksi,"INSERT INTO barang (id_kategori, nama_barang, foto, stok, deskripsi, harga, diskon) VALUES ('$_POST[id_kategori]', '$_POST[nama_barang]', '$nama_file', '$_POST[stok]', '$_POST[deskripsi]', '$_POST[harga]', '$_POST[diskon]')");
	header('location:index.php?page=produk');
}
else if($proses == 'edit_barang'){
	$lokasi_file	=$_FILES['foto']['tmp_name'];
	$tipe_file		=$_FILES['foto']['type'];
	$nama_file		=$_FILES['foto']['name'];
	move_uploaded_file($lokasi_file, "../img/produk/$nama_file");

	if(empty($nama_file)){
		mysqli_query($koneksi,"UPDATE barang SET id_kategori = '$_POST[id_kategori]', nama_barang = '$_POST[nama_barang]', stok = '$_POST[stok]', deskripsi = '$_POST[deskripsi]', harga = '$_POST[harga]', diskon = '$_POST[diskon]' WHERE id_barang = '$_POST[id_barang]'");	
	}
	else{
		mysqli_query($koneksi,"UPDATE barang SET id_kategori = '$_POST[id_kategori]', nama_barang = '$_POST[nama_barang]', foto = '$nama_file', stok = '$_POST[stok]', deskripsi = '$_POST[deskripsi]', harga = '$_POST[harga]', diskon = '$_POST[diskon]' WHERE id_barang = '$_POST[id_barang]'");
	}
	header('location:index.php?page=produk');
}
else if($proses == 'delete_barang'){
	mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$_GET[id_barang]'");
	header('location:index.php?page=produk');
}
else if($proses == 'add_berita'){
	$lokasi_file	=$_FILES['foto']['tmp_name'];
	$tipe_file		=$_FILES['foto']['type'];
	$nama_file		=$_FILES['foto']['name'];
	move_uploaded_file($lokasi_file, "../img/berita/$nama_file");

	mysqli_query($koneksi,"INSERT INTO berita (judul, foto, penulis, tgl, isi) VALUES ('$_POST[judul]', '$nama_file', '$_POST[penulis]', '$_POST[tgl]', '$_POST[isi]')");
	header('location:index.php?page=berita');
}
else if($proses == 'edit_berita'){
	$lokasi_file	=$_FILES['foto']['tmp_name'];
	$tipe_file		=$_FILES['foto']['type'];
	$nama_file		=$_FILES['foto']['name'];
	move_uploaded_file($lokasi_file, "../img/berita/$nama_file");

	if(empty($nama_file)){
		mysqli_query($koneksi,"UPDATE berita SET judul = '$_POST[judul]', penulis = '$_POST[penulis]', tgl = '$_POST[tgl]', isi = '$_POST[isi]' WHERE id_berita = '$_POST[id_berita]'");	
	}
	else{
		mysqli_query($koneksi,"UPDATE berita SET judul = '$_POST[judul]', foto = '$nama_file', penulis = '$_POST[penulis]', tgl = '$_POST[tgl]', isi = '$_POST[isi]' WHERE id_berita = '$_POST[id_berita]'");
	}
	header('location:index.php?page=berita');
}
else if($proses == 'delete_berita'){
	mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita = '$_GET[id_berita]'");
	header('location:index.php?page=berita');
}
else if($proses == 'del_pesanan'){
	mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan = '$_GET[id_pesanan]'");
	header('location:index.php?page=pesanan');
}
if($proses == 'add_video'){
	mysqli_query($koneksi, "INSERT INTO video (link) VALUES ('$_POST[link]')");
	header('location:index.php?page=video');
}
else if($proses == 'delete_video'){
	mysqli_query($koneksi, "DELETE FROM video WHERE id_video = '$_GET[id_video]'");
	header('location:index.php?page=video');
}
?>