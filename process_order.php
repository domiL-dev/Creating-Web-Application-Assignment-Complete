<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Produt Payment"/>
        <meta name="keywords"    content="Payment" />
        <meta name="author"      content="Dominik Leibel" />
        <title>Product Payment</title>

        <link href="styles/style.css" rel="stylesheet"/>



      <!-- <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-eval';"> -->


    </head>

    <body>

        
        <h1>Product Payment</h1>

        <?php


//sanitise-input function
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$errMsg ="";

session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Validate Credit Card Type
if (isset($_POST["Credit_card_type"])) {
	$typeCC = sanitise_input($_POST["Credit_card_type"]);

	if($typeCC == ""){
		$errMsg .= "<p class='errorMessage'>You must select the Credit Card Type.</p>";
	}  else if (isset($_POST["Credit_card_number"])) {

		$numberCC = sanitise_input($_POST["Credit_card_number"]);

		if($numberCC == ""){
			$errMsg .= "<p class='errorMessage'>You must enter the Credit Card number.</p>";
		}  else {
			$_SESSION["credit_card_type"] = $typeCC;
		}
		
		if (!preg_match("/^\d{15,16}$/", $numberCC)){
			$errMsg .= "<p class='errorMessage'>Only exactly 15 till 16 digigts allowed for Credit Card number.</p>";
		} else {
		switch ($typeCC) {
			case "Visa":
				if ($numberCC[0] != "4") {
					$errMsg .= "<p class='errorMessage'>VISA CC Number starts with 4!</p>";
				} else {
					$_SESSION["card_number"] = $numberCC;
				}
				break;
		
			case "MasterCard":
				if (!preg_match("/^(51|52|53|54|55)$/", substr($numberCC, 0, 2))) {
					$errMsg .= "<p class='errorMessage'>MasterCard CC Number starts with digits from 51-55!</p>";
				} else {
					$_SESSION["card_number"] = $numberCC;
				}
				break;
		
			case "American Express":
				if (substr($numberCC, 0, 2) != "34" && substr($numberCC, 0, 2) != "37") {
					$valid = false;
					$errMsg .= "<p class='errorMessage'>American Express CC Number starts with 34 or 37!</p>";
				} else {
					$_SESSION["card_number"] = $numberCC;
				}
				break;
		
			default:
				break;
		}
	}
}
} else {
	header("location: enquire.php");
}


//Validate Name on Credit Card
if(isset($_POST["Name_on_credit_card"])){
	$nameCC = sanitise_input($_POST["Name_on_credit_card"]);

	if($nameCC == ""){
		$errMsg .= "<p class='errorMessage'>You must enter your Name on your credit card.</p>";
	} else if (!preg_match("/^[a-zA-Z\s]+$/",$nameCC)) {
		$errMsg .= "<p class='errorMessage'>Only alpha letters or spaces allowed for Name on credit card.</p>";
	} else if (strlen($nameCC) > 40){
		$errMsg .= "<p class='errorMessage'>Only a maximum of 40 characters allowed for Name on credit card.</p>";
	} else {
		$_SESSION["name_on_credit_card"] = $nameCC;
	}
} else {
	header("location: enquire.php");
}

//Validate VCC
if(isset($_POST["expiry_date"])){
	$expiryCC = sanitise_input($_POST["expiry_date"]);

	if($expiryCC == ""){
		$errMsg .= "<p class='errorMessage'>You must enter the expiry date of the credit card.</p>";
	} else if (!preg_match("/(0[1-9]|1[0-2])-(2[0-9]|3[0-9])/",$expiryCC)) {
		$errMsg .= "<p class='errorMessage'>Only digits and hyphen allowed in the following format MM-YY expiry date of credit card.</p>";
	} else {
		$_SESSION["vcc"] = $expiryCC;
	}
} else {
	header("location: enquire.php");
}

//Validate CCV 
if(isset($_POST["CVV"])){
	$cvv = sanitise_input($_POST["CVV"]);

	if($cvv == ""){
		$errMsg .= "<p class='errorMessage'>You must enter the CVV of the credit card.</p>";
	} else if (!preg_match("/^\d{3}$/",$cvv)) {
		$errMsg .= "<p class='errorMessage'>Only exactly 3 digits allowed for CVV of credit card.</p>";
	} else {
		$_SESSION["cvv"] = $cvv;
	}
} else {
	header("location: enquire.php");
}



}

$expected_referrer = "https://mercury.swin.edu.au/cos60004/s105323278/assign3/payment.php";

if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] !== "$expected_referrer") {
    header("location: enquire.php"); 
    } 

// Display any error messages
if (!empty($errMsg)) {

    // Start the session if it's not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //session variable is set to handle problem with submitting form when returning from process_order.php to payment.php
    $_SESSION["process_order_failed"] = true;
	echo '<h2 id="errorMessage">Error Messages:</h2>';
    echo $errMsg;
    echo '<p><button onclick="window.history.back()">Go Back</button></p>';


} else {
//End of Validation of Credit Card Details



            //connect to mysql database
            require_once('settings.php');
   
            $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
            );
            //----------------------------

        // Checks if connection is successful
	if (!$conn) {
		// Displays an error message, avoid using die() or exit() as this terminates the execution
		// of the PHP script
		echo "<p>Database connection failure</p>";  //Would not show in a production script 
	} else {
		// Upon successful connection
		
		// Get data from the PHP Session

        $product_price = $_SESSION["product_price"];
        $first_name = $_SESSION["first_name"];
        $last_name = $_SESSION["last_name"];
        $email = $_SESSION["email"];
        $street_address = $_SESSION["street_address"];
        $suburb_town = $_SESSION["suburb_town"];
        $state = $_SESSION["state"];
        $postcode = $_SESSION["postcode"];
        $phone_number = $_SESSION["phone_number"];
        $preferred_contact = $_SESSION["preferred_contact"];
        $product = $_SESSION["product"];
        $product_features = $_SESSION["product_features"];
        $comment_field = $_SESSION["comment_field"];
        $product_quantity = $_SESSION["product_quantity"];
        $card_number = $_SESSION["card_number"];
        $credit_card_type = $_SESSION["credit_card_type"];
        $name_on_credit_card = $_SESSION["name_on_credit_card"];
        $vcc = $_SESSION["vcc"];
        $cvv = $_SESSION["cvv"];
	
		$sql_table="orders";

        $fieldDefinition="
            order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            order_cost FLOAT NOT NULL,
            order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            order_status ENUM('PENDING', 'FULFILLED', 'PAID', 'ARCHIVED') DEFAULT 'PENDING',
            first_name VARCHAR(25) NOT NULL,
            last_name VARCHAR(25) NOT NULL,
            email_address VARCHAR(100) NOT NULL,
            street_address VARCHAR(40) NOT NULL,
            suburb_town VARCHAR(20) NOT NULL,
            state VARCHAR(3) NOT NULL,
            postcode VARCHAR(4) NOT NULL,
            phone_number VARCHAR(12) NOT NULL,
            preferred_contact VARCHAR(5) NOT NULL,
            product VARCHAR(25) NOT NULL,
            product_features VARCHAR(20) NOT NULL,
            comment_field TEXT,
            product_quantity INT NOT NULL,
            credit_card_type VARCHAR(20) NOT NULL,
            name_on_credit_card VARCHAR(40) NOT NULL,
            vcc VARCHAR(5) NOT NULL,
            cvv VARCHAR(3) NOT NULL,
            card_number VARCHAR(16) NOT NULL
            ";
        
		// check: if table does not exist, create it
		$sqlString = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
		$result = @mysqli_query($conn, $sqlString);

		// checks if any tables of this name
		if(mysqli_num_rows($result)==0) {
			echo "<p>Table does not exist - create table $sql_table</p>"; 
			$sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";
			$result2 = @mysqli_query($conn, $sqlString);

		    // checks if the table was created
		    if($result2===false) {
                echo "<p class=\"wrong\">Unable to create Table $sql_table. " . mysqli_errno($conn) . ":" . mysqli_error($conn) . " </p>"; // Would not show in a production script
			} else {
			// display an operation successful message
			echo "<p class=\"ok\">Table $sql_table created OK</p>";
			} // if successful query operation

		} else {
			// display an operation successful message
			echo "<p>Table  $sql_table already exists</p>"; 
		} // if successful query operation
		
		// Set up the SQL command to add the data into the table
		
        $query = "insert into $sql_table"
						."(
            order_cost,
            first_name,
            last_name,
            email_address,
            street_address,
            suburb_town,
            state,
            postcode,
            phone_number,
            preferred_contact,
            product,
            product_features,
            comment_field,
            product_quantity,
            card_number,
            credit_card_type,
            name_on_credit_card,
            vcc,
            cvv
            )"
					. " values "
						."(
        '$product_price' ,
        '$first_name' ,
        '$last_name' ,
        '$email' ,
        '$street_address' ,
        '$suburb_town' ,
        '$state' ,
        '$postcode' ,
        '$phone_number' ,
        '$preferred_contact' ,
        '$product' ,
        '$product_features' ,
        '$comment_field' ,
        '$product_quantity' ,
        '$card_number' ,
        '$credit_card_type' ,
        '$name_on_credit_card' ,
        '$vcc' ,
        '$cvv' 
                        )";
        
        // execute the query
		$result = mysqli_query($conn, $query);
		// checks if the execution was successful
		if(!$result) {
			echo "<p> Order already exists</p>";  //Would not show in a production script
		} 
   
$sql_query_failed = false;

// Query to get order_id into session variable
$order_id_query = "SELECT order_id FROM $sql_table";  // Replace `order` with your actual table name
$order_id_result = mysqli_query($conn, $order_id_query);  // Separate result for each query

if ($order_id_result) {
    if (mysqli_num_rows($order_id_result) > 0) {
        $row = mysqli_fetch_assoc($order_id_result);
        $_SESSION["order_id"] = $row['order_id'];  // Store the order_id in session
    } else {
        $sql_query_failed = true;
    }
} else {
    $sql_query_failed = true;
}

// Query to get order_time into session variable
$order_time_query = "SELECT order_time FROM $sql_table";  // Replace `order` with your actual table name
$order_time_result = mysqli_query($conn, $order_time_query);  // Separate result for each query

if ($order_time_result) {
    if (mysqli_num_rows($order_time_result) > 0) {
        $row = mysqli_fetch_assoc($order_time_result);
        $_SESSION["order_time"] = $row['order_time'];  // Store the order_time in session
    } else {
        $sql_query_failed = true;
    }
} else {
    $sql_query_failed = true;
}

// Query to get order_status into session variable
$order_status_query = "SELECT order_status FROM $sql_table";  // Replace `order` with your actual table name
$order_status_result = mysqli_query($conn, $order_status_query);  // Separate result for each query

if ($order_status_result) {
    if (mysqli_num_rows($order_status_result) > 0) {
        $row = mysqli_fetch_assoc($order_status_result);
        $_SESSION["order_status"] = $row['order_status'];  // Store the order_status in session
    } else {
        $sql_query_failed = true;
    }
} else {
    $sql_query_failed = true;
}



        if($sql_query_failed){
            echo"<p> Something went wrong, please try again<p>";
            echo '<p><button onclick="window.history.back()">Go Back</button></p>';
        }
        else {
			// display an operation successful message
			echo "<p>Successfully added New Order</p>";

            header("location: receipt.php");
		} // if successful query operation
				
		// close the database connection
		mysqli_close($conn);

	}  // if successful database connection

            echo 'sucessful';
        }

        include_once("footer.inc");
?>



        <script src="scripts/payment.js"></script>

    </body>

</html>