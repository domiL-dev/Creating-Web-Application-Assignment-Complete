<?php
// you need to edit this file to include your mysql info 
require_once('settings.php');
   	
$conn = @mysqli_connect($host,
    $user,
    $pwd,
    $sql_db
);

// Checks if connection is successful
if (!$conn) {
    // Displays an error message
    echo "<p>Database connection failure</p>"; // Might not show in a production script 
} else {
  session_start();
    // Upon successful connection

// Get parameters from the URL
$id = $_GET['id'];
$action = $_GET['action'];
if(isset($_GET['status'])){
$status = $_GET['status'];
}
$updateTo = "";
    
$sql_table="orders";

if($action == "delete"){//delete Order only if its pending
  if($status == "PENDING"){

    // Set up the SQL command to update the status in orders
    $query = "DELETE FROM " .$sql_table . " WHERE order_id = " .$id. " AND order_status = 'PENDING'";
    echo $query;

    // execute the query and store result into the result pointer
    $result = mysqli_query($conn, $query);
    
    if ($result) {
      echo "Successfully canceled and deleted Order with id = 30.";
      $_SESSION["loginResult"] = "Order with id = ".$id." succesfully canceled and deleted";
      header("location: manager.php");
    } else {
      echo "Error updating order status: " . mysqli_error($conn);
    }


  } else{
    echo "Error: You only can delete Orders where status = PENDING";
    $_SESSION["loginResult"] = "Error: You only can delete Orders where status = PENDING";
    header("location: manager.php");
  }

}else{//Perform update of order status
switch ($action) {
    case "updateStatusPending":
      $updateTo = "PENDING";
      break;
    case "updateStatusFulfilled":
      $updateTo = "FULFILLED";
      break;
    case "updateStatusPaid":
      $updateTo = "PAID";
      break;
      case "updateStatusArchived":
      $updateTo = "ARCHIVED";
      break;
    default:
      //code block
  }

    // Set up the SQL command to update the status in orders
    $query = "UPDATE " .$sql_table . " SET order_status = '$updateTo'". " WHERE order_id = " .$id;
    echo $query;

    // execute the query and store result into the result pointer
    $result = mysqli_query($conn, $query);
    
    if ($result) {
      echo "Successfully updated status of Order with id = 30.";
      $_SESSION["loginResult"] = "Status of order with id = ".$id." succesfully changed to ".$updateTo;
      header("location: manager.php");
    } else {
      echo "Error updating order status: " . mysqli_error($conn);
    }
}
     

    // close the database connection
    mysqli_close($conn);
} // if successful database connection
?>