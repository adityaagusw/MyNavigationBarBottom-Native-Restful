<?php

if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   //mendapatkan data
   $nama = $_POST['nama'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   require_once('koneksi.php');

   //Cek nim sudah terdaftar apa belum
   $sql = "SELECT * FROM login_tbl WHERE email ='$email'";
   $check = mysqli_fetch_array(mysqli_query($con,$sql));
   if(isset($check)){
     $response["value"] = 0;
     $response["message"] = "oops! User sudah terdaftar!";
     echo json_encode($response);
   } else {
     $sql = "INSERT INTO login_tbl (nama,email,password) VALUES('$nama','$email','$password')";
     if(mysqli_query($con,$sql)) {
       $response["value"] = 1;
       $response["message"] = "Sukses mendaftar";
       echo json_encode($response);
     } else {
       $response["value"] = 0;
       $response["message"] = "oops! Coba lagi!";
       echo json_encode($response);
     }
   }
   // tutup database
   mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Coba lagi!";
  echo json_encode($response);
}