<?php
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "UPDATE mahasiswatbl SET nama = '$nama', email = '$email' , password = '$password' WHERE id = '$id'";
  if(mysqli_query($con,$sql)) {
    $response["value"] = 1;
    $response["message"] = "Berhasil diperbarui";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Gagal merubah!";
    echo json_encode($response);
  }
  mysqli_close($con);
}