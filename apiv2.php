<?php
$uid = $_POST['id'];
$mode = $_POST['mode'];
if (empty($uid)){
  echo json_encode("404.1"); 
}
else if (empty($mode)){
  echo json_encode("404.2"); 
}
else
{
  $conn = mysqli_connect('mysql.hostinger.com', 'u531015697_srmrgds', 'srmrgds2020', 'u531015697_qr');
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo json_encode("382");
  }
  $sql = "SELECT $mode FROM qrdb WHERE id='$uid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $text = $row[$mode];
    }
  }
  if ($text=='1') {
    echo json_encode("381");
  }
  elseif ($text=='0') {

    $sql = "UPDATE qrdb SET $mode='1' WHERE id='$uid'";
    if(mysqli_query($conn, $sql)){
      echo json_encode("380");
     }
    else {
      echo json_encode("382" . mysqli_error($conn));
      }
    }
    else {
    echo json_encode("382");
  }
}
$conn->close();
?>