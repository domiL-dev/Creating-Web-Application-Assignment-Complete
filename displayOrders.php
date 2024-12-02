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

// Create variables globally 
$firstname;
$lastname;
$product;
$status;
$sort;


    //Validate Input ---------------------------------------------------- 
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Validate first name
        if (isset($_POST["First_Name"])) {
            $firstname = sanitise_input($_POST["First_Name"]);
        
            if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
                $errMsg .= "<p class='errorMessage'>Only alpha letters allowed in your first name.</p>";
            }  else if (strlen($firstname) > 25){
                $errMsg .= "<p class='errorMessage'>Only a maximum of 25 characters allowed in your first name.</p>";
            } else if($firstname != ""){
                $firstname = "first_name = " ."'".$firstname."' ";
            } else {
                $_SESSION["firstname_table"]=$firstname;
            }
        } else {
            header("location: manager.php");
        }

    //Validate last name
    if(isset($_POST["Last_Name"])){
        $lastname = sanitise_input($_POST["Last_Name"]);

        if (!preg_match("/^[a-zA-Z-]*$/",$lastname)) {
            $errMsg .= "<p class='errorMessage'>Only alpha letters or hypen allowed in your last name.</p>";
        } else if (strlen($lastname) > 25){
            $errMsg .= "<p class='errorMessage'>Only a maximum of 25 characters allowed in your last name.</p>";
        } else if($lastname != ""){
            $lastname = "last_name = " . "'".$lastname."' ";
        }else {
            $_SESSION["lastname_table"]=$lastname;
        }
    } else {
        header("location: manager.php");
    }
    

    //Validate Product as Product (dropdown)

if(isset($_POST["Product"])){
	$product = sanitise_input($_POST["Product"]); 

    if($product != ""){
        $product = "product = " . "'" . $product . "' ";
    }else {
        $_SESSION["product_table"]=$product;
    }
} else {
	header("location: manager.php");
}

if(isset($_POST["Status"])){
	$status = sanitise_input($_POST["Status"]); 

    if($status != ""){
        $status = "order_status = " ."'". $status . "' ";
    } else {
        $_SESSION["status_table"]=$status;
    }
} else {
	header("location: manager.php");
}

if(isset($_POST["sortBy"])){
	$sort = sanitise_input($_POST["sortBy"]); 

} else {
	header("location: manager.php");
}

} else {
    header("location: manager.php"); 
}

// Display any error messages
if (!empty($errMsg)) {
	echo '<h2 id="errorMessage">Error Messages:</h2>';
    echo $errMsg;
    echo '<p><button onclick="window.history.back()">Go Back</button></p>';

} else {
    //log out link
    echo "<p><a href=logout.php>logout</a></p>";
    echo "<p><a href=manager.php>back to search form</a></p>";
    echo "<p><a href=index.php>back to website</a></p>";
    //store data except for $sort in an array if not empty

    $query_attributes = [];

    if(!empty($firstname)){
        $query_attributes[] = $firstname;
    }

    if(!empty($lastname)){
        $query_attributes[] = $lastname;
    }

    if(!empty($product)){
        $query_attributes[] = $product;
    }

    if(!empty($status)){
        $query_attributes[] = $status;
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
	
		// Set up the SQL command to add the data into the table
		$query = "select * from " .$sql_table . $str_query_attributes. " order by " .$sort;
			
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