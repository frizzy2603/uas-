<?php
   session_start();
   if(isset($_POST['submit'])) {
      require 'config.php';

      $insertOneResult = $collection_customer->insertOne([
         '_id' => $_POST['id'],
          'nama_customer' => $_POST['nama_customer'],
          'telepon' => $_POST['telepon'],
          'alamat' => $_POST['alamat'],
      ]);


      $_SESSION['success'] = "Data Berhasil Ditambahkan";
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
   <h1>Buat Data baru</h1>
   <a href="index.php" class="btn btn-primary">Kembali</a>
   <form method="POST">
      <div class="form-group">
         <strong>id Customer</strong>
         <input type="text" name="id" required="" class="form-control" placeholder="Masukkan id Customer">
      </div>
      <div class="form-group">
         <strong>Nama customer</strong>
         <input type="text" name="nama_customer" required="" class="form-control" placeholder="Masukkan Nama Customer">
      </div>
      <div class="form-group">
         <strong>Telepon</strong>
         <input type="text" name="telepon" required="" class="form-control" placeholder="Masukkan Telepon">
      </div>
      <div class="form-group">
         <strong>Alamat</strong>
         <input type="text" name="alamat" required="" class="form-control" placeholder="Masukkan Alamat">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>

</body>
</html>