<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Enhancements"/>
        <meta name="keywords"    content="Details, Enhancements" />
        <meta name="author"      content="Dominik Leibel" />
        <title>Enhancements 2</title>

        <link href="styles/style.css" rel="stylesheet"/>

    </head>

<body>
    
    <header>

        <?php
        include_once("header.inc");
        include_once("menu.inc");
        ?>
      </header>

<h2>Briefly description of enhancements 2:</h2>

<article>
    <!--Description Image Map-->
    <section>
    <h3>Style Checker</h3>
        <section>
            
            The purpose of the enhancement is to check out if the VR Headset looks good on you. 
            I used just two example pictures, because it's not so easy to find suitable pictures with transparent background.
            You can drag and drop the images of the VR Headsets and put them on my face. Furthermore you can change the size by
            entering the width in pixel in the for it made input. After pressing the resize button the images resizes to your desired width.
        </section>
    
        <section>
            It was harder than expected to code this enhancement. I had problems it was not that easy to make the code running.
            During coding and testing it reacted silly to the drag and drop of the pictures. But i made it working.
        </section>
        
        <!--Descripton Code-->
        <ul>
            <li>I used different Eventlisteners to get and manipulate the coordinates</li>
            <li>style.left, style.top were used to initialize the image position and to set the new image position</li>
            <li>since style.left, style.top returns a string withc "px" at the end i used .replace to replace "px" with px so that only the number is inside the string </li> 
            <li>I used the Number() method to transform a string into a number for calculating purposes</li>
            <li>I calculated the new position with the help of the positions of the mouse when i started the drag and ended it. I added the difference to the actual position to get the new one.</li>
            <li>To resize the images i used .style.width to set the new width.</li>
            <li><a href="product.php#styleCheck_button">Get to the Style Checker and Click on the Button under the aside element</a></li>
        </ul>

    <!--Description Image Slider-->
    </section>
    <h3>Payment Timer</h3>
        <section>
            After the Style Checker i had really no idea what to implement so i implemented a payment timer.
            If the Timer runs out of time a alert pops up and the user is redirected to the homepage.
        </section>
    
        <section>
        The purpose of the timer is that if someones start entering his or her credit card information and forgets to confirm the payment or just forgets to finish it the sessionStorage is cleared and the browser is redirected to the homepage.
        </section>
        <!--About Code-->
        <ul>
            <li>I made the formatTime(seconds) function to dispay the remaining time in the format xx:xx</li>
            <li>With Math.floor(...) i round the solution of the calculation down to the neares integer  </li>
            <li>I'm using padStart() for format xx : xx if the minutes or seconds are smaller then 10, a zero is added to the beginning</li>
            <li>setInterval() https://www.w3schools.com/Jsref/met_win_setinterval.asp</li>
            <li><a href="payment.html#timerContainer">Get to the Payment Timer</a></li>
        </ul>
</article>
  
<?php
    include_once("footer.inc");
?>

</body>

</html>