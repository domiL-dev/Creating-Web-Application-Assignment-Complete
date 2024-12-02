<!DOCTYPE html>
<html lang="en">
<head>
<title>Display Orders</title>

<meta charset="utf-8" />
<meta name="description" content="Display Orders" />
<meta name="keywords" content="Display SQL Table" />

<title>Orders:</title>

<link href="styles/style.css" rel="stylesheet"/>


</head>
<body>
	<h1>Orders:</h1>
<?php

//sanitise-input function
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


// Display any error messages
if (!empty($errMsg)) {
	echo '<h2 id="errorMessage">Error Messages:</h2>';
    echo $errMsg;
    echo '<p><button onclick="window.history.back()">Go Back</button></p>';

} else {
    session_start();
    //log out link
    echo "<p><a href=logout.php>logout</a></p>";
    echo "<p><a href=manager.php>back to search form</a></p>";
    echo "<p><a href=index.php>back to website</a></p>";
    //store data except for $sort in an array if not empty

    $query_attributes = [];

    if(!empty($firstname)){
        $query_attributes[] = $_SESSION["firstname_table"];
    }

    if(!empty($lastname)){
        $query_attributes[] = $_SESSION["lastname_table"];
    }

    if(!empty($product)){
        $query_attributes[] = $_SESSION["product_table"];
    }

    if(!empty($status)){
        $query_attributes[] = $_SESSION["status_table"];
    }

    if(sizeof($query_attributes) != 0){
        $str_query_attributes = " WHERE ";

        for ($i = 0; $i < (sizeof($query_attributes)-1); $i++) {
            $str_query_attributes = $str_query_attributes . $query_attributes[$i] . " AND ";
        }

        $str_query_attributes = $str_query_attributes . $query_attributes[(sizeof($query_attributes)-1)];
    } else {
        $str_query_attributes = " ";
    }



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
		// Upon successful connection
		
	$sql_table="orders";

    $sort = $_GET['sort'];
	
		// Set up the SQL command to add the data into the table
		$query = "select * from " .$sql_table . $str_query_attributes. " order by " .$sort. " DESC";
			
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		// checks if the execuion was successful
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
			// Display the retrieved records
			echo "<table border=\"1\">";
			echo "<tr>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=order_id>Order ID</a></th>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=order_time>Time</a></th>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=order_status>Status</a></th>\n"
            ."<th scope=\"col\">Change Status</th>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=first_name>First Name</a></th>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=last_name>Last Name</a></th>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=product>Product</a></th>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=product_features>Features</a></th>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=product_quantity>Quanty</a></th>\n"
            ."<th scope=\"col\"><a href=displayOrdersSort.php?sort=order_cost>Cost</a></th>\n"
            ."<th scope=\"col\">Delete Order</th>\n"
				 ."</tr>\n";
			// retrieve current record pointed by the result pointer
			
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>",$row["order_id"],"</td>";
				echo "<td>",$row["order_time"],"</td>";  
				echo "<td>",$row["order_status"],"</td>";
                //echo change links for status
                echo 
                "<td>",
                "<p><a href=update.php?id=",$row["order_id"],"&action=updateStatusPending>pending</a></p>",
                "<p><a href=update.php?id=",$row["order_id"],"&action=updateStatusFulfilled>fulfilled</a></p>",
                "<p><a href=update.php?id=",$row["order_id"],"&action=updateStatusPaid>paid</a></p>",
                "<p><a href=update.php?id=",$row["order_id"],"&action=updateStatusArchived>archived</a></p>",
                "</td>";
                //____________________________
				echo "<td>",$row["first_name"],"</td>";
				echo "<td>",$row["last_name"],"</td>";
                echo "<td>",$row["product"],"</td>";
                echo "<td>",$row["product_features"],"</td>";
                echo "<td>",$row["product_quantity"],"</td>";
                echo "<td>",$row["order_cost"],"</td>";
                //delete order
                echo "<td>","<p><a href=update.php?id=",$row["order_id"],"&action=delete&status=",$row["order_status"],">delete</a></p>","</td>";
				echo "</tr>";
			}
			echo "</table>";
			// Frees up the memory, after using the result pointer
			mysqli_free_result($result);
		} // if successful query operation
		
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection

}
?>
</body>
</html>