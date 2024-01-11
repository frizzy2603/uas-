<?php
   session_start();

   require 'config.php';

   if (isset($_GET['id'])) {
      $customer = $collection_customer->findOne(['_id' => $_GET['id']]);
   }

   if(isset($_POST['submit'])) {
      $collection_customer->updateOne(
         ['_id' => $_GET['id']],
         ['$set' => [
            'nama_customer' => $_POST['nama_customer'],
            'telepon' => $_POST['telepon'],
            'alamat' => $_POST['alamat']
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
            <strong>Nama Customer</strong>
            <input type="text" name="nama_customer" value="<?php echo $customer->nama_customer; ?>" required="" class="form-control" placeholder="Masukkan Nama Customer">
         </div>
         <div class="form-group">
            <strong>Telepon</strong>
            <input type="text" name="telepon" value="<?php echo $customer->telepon; ?>" required="" class="form-control" placeholder="Masukkan Telepon">
         </div>
         <div class="form-group">
            <strong>Alamat</strong>
            <input type="text" name="alamat" value="<?php echo $customer->alamat; ?>" required="" class="form-control" placeholder="Masukkan Alamat">
         </div>
         <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
         </div>
      </form>
   </div>
</body>
</html>