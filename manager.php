<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Manager Area"/>
        <meta name="keywords"    content="Manager" />
        <meta name="author"      content="Dominik Leibel" />
        <title>Product Enquire</title>

        <link href="styles/style.css" rel="stylesheet"/>

        <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-eval';">


    </head>

<body>
    
    <header>
        <h1>Manager</h1>
      </header>

<?php
session_start();
//if(loggedIn)
if (isset($_SESSION["loginResult"])){
    $strLoginResult = $_SESSION["loginResult"];
echo "<p>$strLoginResult</p>";
$_SESSION["loginResult"] = "";
}
if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"]) {

echo "<p><a href=logout.php>logout</a></p>";
echo "<p><a href=index.php>back to website</a></p>";
echo "
      <h2>search for Orders:</h2>

<!--<form method='get' action='payment.html' novalidate>-->
<form id='queryForm' novalidate='novalidate' method='post' action='displayOrders.php'>

        <!--select to display all Orders or specified Orders-->
        <fieldset id='selectCustomOrders'>
            <legend>Custom Query:</legend>
            <p>
            <label for='allOrders' >All Orders
            <input type='radio' name='queryType' id='allOrders' value='allOrders' checked='checked'>
            </label>

            <label for='customOrders'>Custom Orders
            <input type='radio' name='queryType' id='customOrders' value='customOrders'>
            </label>
            </p>
        </fieldset>
    <!--Contact information-->
    <fieldset id='customQuery'>
        <legend>Custom Search for Orders:</legend>
           
            <p>
                <label for='First_Name'>First Name</label> 
                <input type='text' name= 'First Name' id='First_Name' maxlength='25' size='10' pattern='^[a-zA-Z]+$'  title='only alphabetical characters allowed, max 25' required='required'>
                
            </p>

            <p>
                <label for='Last_Name'>Last Name</label> 
                <input type='text' name= 'Last Name' id='Last_Name' maxlength='25' size='10' pattern='^[a-zA-Z]+$' title='only alphabetical characters allowed, max 25 chars' required='required'>   
            </p>



                <label for='Product'>Product</label>
                    <select name='Product' id='Product' class='select_option' required='required'>
                        <option value='' selected='selected'>Please Select a Product</option>
                        <option value='SONY PLAYSTATION VR2' >SONY PLAYSTATION VR2</option>
                        <option value='META Quest 3' >META Quest 3</option>
                        <option value='PICO 4 All-in-One'>PICO 4 All-in-One</option>
                        <option value='HTC XR Elite'>HTC XR Elite</option>
                    </select>

                <label for='Status'>Product</label>
                    <select name='Status' id='Status' class='select_option' required='required'>
                        <option value='' selected='selected'>Don't search for specific status</option>
                        <option value='PENDING' >Pending</option>
                        <option value='FULFILLED' >Fulfilled</option>
                        <option value='PAID'>Paid</option>
                        <option value='ARCHIVED'>Archived</option>
                    </select>

        </fieldset>

        <fieldset id='sortBy'>
            <legend>Sort By:</legend>
            <p>
                <label for='byCost'>Cost</label>
                <input type='radio' name='sortBy' id='byCost' value='order_cost' checked='checked'>
            
                <label for='byTime'>Time</label>
                <input type='radio' name='sortBy' id='byTime' value='order_time'>

            </p>
        </fieldset>




   
    <input id='submitButton'  type='submit' value='Display Orders'> 
    <input type='reset' value='Reset form'>
</form>
";
} else {
    echo "<p><a href=index.php>back to website</a></p>";
    echo "<p>You have to login or create an account to search for Orders!</p>";
    echo "
    <form id='queryForm' novalidate='novalidate' method='post' action='login.php'>
            <!--select to log in or create new account-->
        <fieldset id='createAccount'>
            <legend>Log in / Create account:</legend>
            <p>
            <label for='login' >Login
            <input type='radio' name='account' id='login' value='login' checked='checked'>
            </label>

            <label for='create'>Create new Account
            <input type='radio' name='account' id='createAccount' value='createAccount'>
            </label>
            </p>

            <p>
                <label for='userEmail'>User Email</label> 
                <input type='text' name= 'userEmail' id='userEmail' maxlength='25' size='10' >
                
            </p>

            <p>
                <label for='userPassword'>Password</label> 
                <input type='text' name= 'userPassword' id='userPassword'>   
            </p>
        </fieldset>
        <input id='submitButton'  type='submit' value='Login / Create Account'> 
    </form>
    ";
}

include_once("footer.inc");

?>

<script src="scripts/manager.js"></script>

</body>

</html>