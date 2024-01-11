<?php
   session_start();

   require 'config.php';

   if (isset($_GET['id'])) {
      $konterhp = $collection_barang->findOne(['_id' => $_GET['id']]);
   }

   if(isset($_POST['submit'])) {
      $collection_barang->updateOne(
         ['_id' => $_GET['id']],
         ['$set' => [
            'nama_barang' => $_POST['nama_barang'],
            'harga_barang' => intval($_POST['harga_barang']),
            'stock_barang' => intval($_POST['stock_barang'])
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
      <h1>Edit Data Barang</h1>
      <a href="index.php" class="btn btn-primary" >Kembali</a>

      <form method="POST">
         <div class="form-group">
            <strong>Nama Barang</strong>
            <input type="text" name="nama_barang" value="<?php echo $konterhp->nama_barang; ?>" required="" class="form-control" placeholder="Masukkan Nama Barang">
         </div>
         <div class="form-group">
            <strong>Harga Barang</strong>
            <input type="number" name="harga_barang" value="<?php echo $konterhp->harga_barang; ?>" required="" class="form-control" placeholder="Masukkan Harga Barang">
         </div>
         <div class="form-group">
            <strong>Stock Barang</strong>
            <input type="number" name="stock_barang" value="<?php echo $konterhp->stock_barang; ?>" required="" class="form-control" placeholder="Masukkan Stock Barang">
         </div>
         <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
         </div>
      </form>
   </div>
</body>
</html>