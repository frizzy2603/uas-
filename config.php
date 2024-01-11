<?php
	require_once __DIR__ . "/vendor/autoload.php";

	$collection_barang = (new MongoDB\Client)->tugas->barang;
	$collection_customer = (new MongoDB\Client)->tugas->customer;
	$collection_transaksi = (new MongoDB\Client)->tugas->transaksi;
?>