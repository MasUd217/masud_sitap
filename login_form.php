<?php

@include 'config.php';

session_start();

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

      $row = mysqli_fetch_array($result);

      if($row['level'] == 'admin'){

         $_SESSION['admin_id'] = $row['id'];
         $_SESSION['admin_name'] = $row['nm_lengkap'];
         $_SESSION['admin_date'] = $row['tgl_lahir'];
         $_SESSION['admin_birth'] = $row['tempat_lhr'];
         $_SESSION['admin_gender'] = $row['jk'];
         $_SESSION['admin_phone'] = $row['no_telp'];
         $_SESSION['admin_address'] = $row['alamat'];
         $_SESSION['admin_level'] = $row['level'];
         header('location:dash_admin.php');

      }elseif($row['level'] == 'user'){

         $_SESSION['user_id'] = $row['id'];
         $_SESSION['user_name'] = $row['nm_lengkap'];
         $_SESSION['user_date'] = $row['tgl_lahir'];
         $_SESSION['user_birth'] = $row['tempat_lhr'];
         $_SESSION['user_gender'] = $row['jk'];
         $_SESSION['user_phone'] = $row['no_telp'];
         $_SESSION['user_address'] = $row['alamat'];
         $_SESSION['user_level'] = $row['level'];
         header('location:dash_user.php');

      }
     
   }else{
      $error[] = 'username atau password tidak ada!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Silahkan Lakukan Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Masukkan Username Anda">
      <input type="password" name="password" required placeholder="Masukkan Password Anda">
      <input type="submit" name="submit" value="login " class="form-btn">
      <p>tidak punya akun? <a href="register_form.php">registrasi sekarang</a></p>
   </form>

</div>

</body>
</html>