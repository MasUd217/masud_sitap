<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $nm_lengkap = mysqli_real_escape_string($conn, $_POST['nm_lengkap']);
   $tgl_lahir = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
   $tempat_lhr = mysqli_real_escape_string($conn, $_POST['tempat_lhr']);
   $jk = $_POST['jk'];
   $no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
   $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $level = $_POST['level'];

   $select = " SELECT * FROM tb_users WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'username sudah ada!';

   }else{

      if($pass != $cpass){
         $error[] = 'password tidak sama!';
      }else{
         $insert = "INSERT INTO tb_users(nm_lengkap, tgl_lahir, tempat_lhr, jk, no_telp, alamat, username, password, level) VALUES('$nm_lengkap', '$tgl_lahir', '$tempat_lhr', '$jk', '$no_telp', '$alamat', '$username','$pass','$level')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Silahkan Registrasi</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="nm_lengkap" required placeholder="Nama lengkap">
      <input type="date" name="tgl_lahir" required placeholder="Tanggal Lahir">
      <input type="text" name="tempat_lhr" required placeholder="Tempat Lahir">
      <select name="jk">
         <option value="laki-laki">Laki-laki</option>
         <option value="perempuan">Perempuan</option>
      </select>
      <input type="text" name="no_telp" required placeholder="No. Telepon">
      <input type="text" name="alamat" required placeholder="Alamat">
      <input type="text" name="username" required placeholder="Masukkan Username">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="level">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>sudah punya akun? <a href="login_form.php">silahkan login</a></p>
   </form>

</div>

</body>
</html>