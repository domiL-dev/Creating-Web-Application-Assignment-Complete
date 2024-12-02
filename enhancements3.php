<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Enhancements"/>
        <meta name="keywords"    content="Details, Enhancements" />
        <meta name="author"      content="Dominik Leibel" />
        <title>Enhancements 3</title>

        <link href="styles/style.css" rel="stylesheet"/>

    </head>

<body>
    
    <header>
        <?php
        include_once("header.inc");
        include_once("menu.inc");
        ?>
      </header>

<h2>Briefly description of enhancements 3:</h2>

<article>
    <!--Description Image Map-->
    <section>
    <h3>Manager Log in / Create account:</h3>
        <section>
        The purpose of this enhancement is to only allow managers to get Access to the Order table. You can Create an account or log in into your account
        The result of log in or create account appears on manager.php. If you are not logged in you have to create an account or log in to your account.
        After you have done this result is echoed above the form.    

        </section>
    
        <section>
            It was harder than expected to code this enhancement. It was a bit tricky.
        </section>
        
        <!--Descripton Code-->
        <ul>
            <li>The global variables $loginCreate, $userEmail, and $userPassword are created to store form inputs.</li>
            <li>Form submission is checked using the $_SERVER["REQUEST_METHOD"] == "POST" condition.</li>
            <li>Account selection validation: The script checks if the "account" form field is set. If not, it redirects the user to manager.php. </li> 
            <li>A table named managerAccounts is checked for existence. If it doesn't exist, it is created with columns for the account ID, email, and password.</li>
            <li> If the account is created successfully, a success message is set in the session and the user is redirected to manager.php.</li>
            <li>For Log In: The script selects the user from the managerAccounts table where the email and password match the input.</li>
            <li>If no user is found, a message is set in the session, and the user is redirected to manager.php.</li>
            <li>If the user is found, the login is successful, and the session is updated with the user's login status and email, and the user is redirected to manager.php.</li>
            <li><a href="manager.php">Get to the log in</a></li>
        </ul>

    <!-- Description of resort by column --> 
    <h3>Resort table by clicking on row header by row values:</h3>
    <section>
        The purpose of this enhancement is to resort the table by the row you clicked on the header. So if you click on the header the table is resorted by the values of the row if you click again on it it resorts in the other direction
    </section>
    
     <ul> 
            <li>The query attributes are dynamically built based on the session values for $firstname,$lastname, $product, and $status.</li>
            <li>The query string for filtering the SQL query is built conditionally, adding each non-empty attribute to the WHERE clause.</li> 
            <li>An SQL query is constructed to retrieve orders from the `orders` table, with sorting options passed through $_GET['sort'] parameter.</li>
            <li>The query result is checked, and if successful, the data is displayed in an HTML table with sortable column headers for order ID, time, status, and other attributes.</li>
            <li>For each order, there are action links for changing the order status (pending, fulfilled, paid, archived) and for deleting the order, linked to `update.php` with query parameters.</li>
            <li>The applikation enters through displayOrders.php to displayOrdersSort.php and jumps afterwards between displayOrdersSort.php to displayOrdersSort1.php, since the links in the header row redirect to this sites. You can go back to the search form by a link above the Table</li>
            <li><a href="manager.php">Get to the resort enhancement</a></li>
            <li>You just have to log in and search to get to the table</li>
        </ul>
  
<?php
    include_once("footer.inc");
?>

</body>

</html>