<?php
// Get ID from QR using IN APP Scanner via JSON . Decode It. Connect to DB . Get values l1d1,r1d1,r1d1,l1d2,r12,r2d2 from DB using ID. Verify if it's 1 or 0. Send Appropriate Response Codes


// Response Code - 380 - DB Successfully Updated
// Response Code - 381 - Already Exists in DB
// Response Code - 382 - Unknown Error
// Response Code - 404.1 - Invalid User ID 
// Response Code - 404.2 - Invalid Mode 


//$uid = $_POST['id'];
//$mode = $_POST['mode'];

$uid = '394';  //* Used to Test DB Output Status without app Trigger *
$mode = 'r2d1'; // * Used to Test DB Output Status without app Trigger * 


$conn = mysqli_connect('mysql.hostinger.com', 'u531015697_srmrgds', 'srmrgds2020', 'u531015697_qr');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo json_encode("382");
  }
  $sql = "SELECT * FROM qrdb WHERE id='$uid'";
  $result = $conn->query($sql);
  if ($result) {
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $id = $row["id"];
  $type = $row["$mode"];
   }

   if ($type=='1') {
    echo json_encode("381");
  }
  elseif ($type=='0') {

    $sql = "UPDATE qrdb SET $mode = '1' WHERE id='$uid'";
    if(mysqli_query($conn, $sql)){
      echo json_encode("380");
     }
    else {
      echo json_encode("404.1 " . mysqli_error($conn));
    }
  }
  else {
    echo json_encode("382");
  }

  }
  else {
     echo json_encode("404.1"); 
  }
}
else {
  echo json_encode("382");
}


$conn->close();
?>