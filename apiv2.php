<?
// Get ID from QR using IN APP Scanner via JSON . Decode It. Connect to DB . Get values l1d1,r1d1,r1d1,l1d2,r12,r2d2 from DB using ID. Verify if it's 1 or 0. Send Appropriate Response Codes


// Response Code - 380 - DB Successfully Updated
// Response Code - 381 - Already Exists in DB
// Response Code - 382 - Unknown Error
// Response Code - 404.1 - Invalid User ID 
// Response Code - 404.2 - Invalid Mode 


$uid = $_POST['id'];
$mode = $_POST['mode'];

//$uid = '2';  * Used to Test DB Output Status without app Trigger *
//$mode = 'l1d1'; * Used to Test DB Output Status without app Trigger * 


$conn = mysqli_connect('host', 'user_id', 'passwd', 'db_name');
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
$l1d1 = $row["l1d1"];
$r1d1 = $row["r1d1"];
$r2d1 = $row["r2d1"];
$l1d2 = $row["l1d2"];
$r1d2 = $row["r1d2"];
$r2d2 = $row["r2d2"];
 }
}
else { echo json_encode("404.1"); }

if ($mode=='l1d1') {
  if ($l1d1=='1') {
    echo json_encode("381");
  }
  elseif ($l1d1=='0') {

    $sql = "UPDATE qrdb SET l1d1='1' WHERE id='$uid'";
    if(mysqli_query($conn, $sql)){
      echo json_encode("380");
     }
    else {
      echo json_encode("404.1" . mysqli_error($conn));
    }
  }
  else {
    echo json_encode("382");
  }
}
 else if ($mode=='r1d1') {
   if ($r1d1=='1') {
     echo json_encode("381");
   }
   elseif ($r1d1=='0') {

     $sql = "UPDATE qrdb SET r1d1='1' WHERE id='$uid'";
     if(mysqli_query($conn, $sql)){
       echo json_encode("380");
      }
     else {
       echo json_encode("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
     }
   }
   else {
     echo json_encode("382");
   }
 }

 else if ($mode=='r2d1') {
   if ($r2d1=='1') {
     echo json_encode("381");
   }
   elseif ($r2d1=='0') {

     $sql = "UPDATE qrdb SET r2d1='1' WHERE id='$uid'";
     if(mysqli_query($conn, $sql)){
       echo json_encode("380");
      }
     else {
       echo json_encode("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
     }
   }
   else {
     echo json_encode("382");
   }
 }
 else if ($mode=='l1d2') {
   if ($l1d2=='1') {
     echo json_encode("381");
   }
   elseif ($l1d2=='0') {

     $sql = "UPDATE qrdb SET l1d2='1' WHERE id='$uid'";
     if(mysqli_query($conn, $sql)){
       echo json_encode("380");
      }
     else {
       echo json_encode("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
     }
   }
   else {
     echo json_encode("382");
   }
 }
 else if ($mode=='r1d2') {
   if ($r1d2=='1') {
     echo json_encode("381");
   }
   elseif ($r1d2=='0') {

     $sql = "UPDATE qrdb SET r1d2='1' WHERE id='$uid'";
     if(mysqli_query($conn, $sql)){
       echo json_encode("380");
      }
     else {
       echo json_encode("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
     }
   }
   else {
     echo json_encode("382");
   }
 }
 else if ($mode=='r2d2') {
   if ($r2d2=='1') {
     echo json_encode("381");
   }
   elseif ($r2d2=='0') {

     $sql = "UPDATE qrdb SET r2d2='1' WHERE id='$uid'";
     if(mysqli_query($conn, $sql)){
       echo json_encode("380");
      }
     else {
       echo json_encode("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
     }
   }
   else {
     echo json_encode("382");
   }
 }
 else {
  echo json_encode("404.2");
 }
}
else {
  echo json_encode("404.1");
}

$conn->close();
?>
