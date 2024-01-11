<?php
   session_start();

   require 'config.php';

   if (isset($_GET['id'])) {
      $transaksi = $collection_transaksi->findOne(['_id' => $_GET['id']]);
   }

   if(isset($_POST['submit'])) {
      $collection_transaksi->updateOne(
         ['_id' => $_GET['id']],
         ['$set' => [
            'customer_id' => $_POST['customer_id'],
            'barang_id' => $_POST['barang_id'],
            'quantity' => intval($_POST['quantity']),
            'tgl_transaksi' => $_POST['tgl_transaksi']
            ]
         ]
      );
      $_SESSION['success'] = "Data Berhasil Diupdate";
      header("Location: index.php");
   }
?>


<!DOCTYPE html>
<html>
<head>
   <title>PHP & MongoDB - CRUD</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
   <div class="container">
      <h1>Edit Data Transaksi</h1>
      <a href="index.php" class="btn btn-primary" >Kembali</a>

      <form method="POST">
         <div class="form-group">
            <strong>Customer id</strong>
            <input type="text" name="customer_id" value="<?php echo $transaksi->customer_id; ?>" required="" class="form-control" placeholder="Masukkan Customer id">
         </div>
         <div class="form-group">
            <strong>Barang id</strong>
            <input type="text" name="barang_id" value="<?php echo $transaksi->barang_id; ?>" required="" class="form-control" placeholder="Masukkan Barang id">
         </div>
         <div class="form-group">
            <strong>Quantity</strong>
            <input type="text" name="quantity" value="<?php echo $transaksi->quantity; ?>" required="" class="form-control" placeholder="Masukkan Quantity">
         </div>
         <div class="form-group">
            <strong>Tanggal transaksi</strong>
            <input type="text" name="tgl_transaksi" value="<?php echo $transaksi->tgl_transaksi; ?>" required="" class="form-control" placeholder="Masukkan Tanggal Transkasi">
         </div>
         <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
         </div>
      </form>
   </div>
</body>
</html>