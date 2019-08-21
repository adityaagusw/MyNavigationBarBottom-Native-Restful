<?php
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='GET') {

  $sql = "SELECT * FROM mahasiswatbl ORDER BY nama ASC";
  $res = mysqli_query($con,$sql);
  $result = array();

  while($row = mysqli_fetch_array($res))
  {
    array_push($result, array('nama'=>$row[0], 'email'=>$row[1], 'password'=>$row[2]));
  }

  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);

}