<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>

<meta charset="utf-8" />
<meta name="description" content="Display Orders" />
<meta name="keywords" content="Display SQL Table" />

<title>Login</title>

<link href="styles/style.css" rel="stylesheet"/>


</head>
<body>
	<h1>Login / Create Account:</h1>
<?php

//sanitise-input function
function sanitise_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// Create variables globally 
$loginCreate;
$userEmail;
$userPassword;


$errMsg = "";

    //Validate Input ---------------------------------------------------- 
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Validate first name
    if (isset($_POST["account"])) {
        $loginCreate = sanitise_input($_POST["account"]);
    
    } else {
        header("location: manager.php");
    }
    
        //Validate last name
        if(isset($_POST["userEmail"])){
            $userEmail = sanitise_input($_POST["userEmail"]);
    
            if ($userEmail == "") {
                $errMsg .= "<p class='errorMessage'>You must enter your email address.</p>";
            } else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                $errMsg .= "<p class='errorMessage'>Invalid email format.</p>";
            } 
        } else {
            header("location: manager.php");
        }
    
    //Validate pasword
    if(isset($_POST["userPassword"])){
        $userPassword = sanitise_input($_POST["userPassword"]);

        if($userPassword == ""){
            $errMsg .= "<p> Please enter a password</p>";
        } else if (!preg_match("/^[a-zA-Z0-9-]*$/",$userPassword)) {
            $errMsg .= "<p class='errorMessage'>Only alpha letters, numbers or hypen allowed for your password.</p>";
        } else if (strlen($userPassword) < 4){
            $errMsg .= "<p class='errorMessage'>You need at least 4 characters for your password.</p>";
        } 
    } else {
        header("location: manager.php");
    }


}

// Display any error messages
if (!empty($errMsg)) {
	echo '<h2 id="errorMessage">Error Messages:</h2>';
    echo $errMsg;
    echo '<p><button onclick="window.history.back()">Go Back</button></p>';

}  else {
    session_start();
    //include settings
       require_once('settings.php');
   	
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
  
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else if ($loginCreate == "createAccount") {
		// Upon successful connection
		
        $sql_table="managerAccounts";

        $fieldDefinition="
            account_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            user_email VARCHAR(100) NOT NULL UNIQUE,
            user_password VARCHAR(40) NOT NULL
            ";
        
		// check: if table does not exist, create it
		$sqlString = "show tables like '$sql_table'";  
		$result = @mysqli_query($conn, $sqlString);

		// checks if any tables of this name
		if(mysqli_num_rows($result)==0) {
			echo "<p>Table does not exist - create table $sql_table</p>"; 
			$sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";
			$result2 = @mysqli_query($conn, $sqlString);

		    // checks if the table was created
		    if($result2===false) {
                echo "<p class=\"wrong\">Unable to create Table $sql_table. " . mysqli_errno($conn) . ":" . mysqli_error($conn) . " </p>"; 
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
            user_email,
            user_password
            )"
					. " values "
						."(
        '$userEmail' ,
        '$userPassword'
                        )";
        
        // execute the query
		$result = mysqli_query($conn, $query);
		// checks if the execution was successful

		if(!$result) {
			echo "<p> User already exists</p>"; 
            $_SESSION["loginResult"] = "User already exists";
            header("location: manager.php");
		} else {
            echo "<p> User Account created successfully! </p>";
            $_SESSION["loginResult"] = "User Account created successfully!";
            header("location: manager.php");
        }
    
    
    } else if($loginCreate == "login"){

     //______________________________________________________   
	$sql_table="managerAccounts";
	
		// Set up the SQL command to add the data into the table
		$query = "select * from " .$sql_table. " WHERE user_email = '" .$userEmail. "' AND user_password = '" .$userPassword."'";
		echo $query;	
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		// checks if the execuion was successful
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";

		} else if (mysqli_num_rows($result) == 0) {
                // No user found
                echo "No user found with the provided email and password.";
                $_SESSION["loginResult"] = "No user found with the provided email and password.!";
                header("location: manager.php");
        } else {

			// Display the retrieved records
			echo "logged In succesfully";
            $_SESSION["loginResult"] = "logged In succesfully as '$userEmail'";
            $_SESSION["logedIn"] = true;
            header("location: manager.php");
			// Frees up the memory, after using the result pointer
			mysqli_free_result($result);
		 // if successful query operation
        }
    
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection
    
}
?>
</body>
</html>