<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Enhancements"/>
        <meta name="keywords"    content="Details, Enhancements" />
        <meta name="author"      content="Dominik Leibel" />
        <title>Enhancements</title>

        <link href="styles/style.css" rel="stylesheet"/>

    </head>

<body>
    
    <header>
        <?php
        include_once("header.inc");
        include_once("menu.inc");
        ?>
      </header>

<h2>Briefly description of enhancements 1:</h2>

<article>
    <!--Description Image Map-->
    <section>
    <h3>Image Map</h3>
        <section>
        After i started to implement a usual image map, 
        i realised that this is not the right way to go
        to manifest my idea in code without javaScript.
        </section>
    
        <section>
        My own created Image Map gives users an interactive
        and playful way to get to know the delivery times based on
        the destination location. By hovering over the destiny the 
        delivery box is travelling from its origin to the destination
        and displaying the delivery time.
        </section>
        
        <!--Descripton Code-->
        <ul>
            <li>The .ImageMap container displays the background map image and positions child elements absolutely. The attribute "position" with the value "relative" inside the .ImageMap-Container allows the child-containers to be placed absolutely inside the .ImageMap-Container. In othe case they were placed absolutly to the whole website.</li>
            <li>Each state (for Example, div#WA, div#NT, etc.) is positioned over the map with the attribute "z-index" with the value "5" levels up the container so they are in the foreground, this is good for the usability in the other case without "z-index" the animation effect triggerd by hovering over the area made some trouble when the delivery Box arrived on its destination.</li>
            <li>The #Plane tooltip is positioned absolutely and moves to destiny coordinates when a state is hovered over.</li>
            <li>Furthermore I used CSS transitions and the sibling selector "~" so the tooltip and reveal delivery information are somethly blend in.</li>
            <li>Additionally I used @media (max-width: 600px) {} to rearrange the elements so it is still usable with a smaller window width.</li>
            <li><a href="index.html#deliveryTime">Get to the Image Map</a></li>
        </ul>

    <!--Description Image Slider-->
    </section>
    <h3>Product slider</h3>
        <section>
        I got the idea from this 
        <a href="https://devncoffee.com/responsive-image-slider-in-html-css/">Site</a><div class=""></div>
        When the width of the screen is more than 600px than the products are shown in a flex box.
        In my opinion it makes no sense to use the Product Slider on fullscreen. But when the Window width
        becomes smaller the Products wrap and you have to scroll far down to get to the Product Descriptions 
        manually. Another option is to click on the link inside the .Product-Containers wich will jump to the
        right Product description.
        </section>
    
        <section>
        My idea was to implement a Product slider when the screen is narrow so you don't have to scroll that much.
        </section>
        <!--About Code-->
        <ul>
            <li>I used radio buttons to achive showing one product</li>
            <li>Labels were used to achive to click through the radio-buttons/Products </li>
            <li>The radio buttons are hidden for the look</li>
            <li>The labels and the .slideNumber are just displayed when the display is narrow, otherwise they are hidden as well.</li>
            <li>Attention: Make the window narrow!<a href="product.php#ProductRange">Get to the Product slider</a></li>
        </ul>
</article>
  
<?php
    include_once("footer.inc");
?>

</body>

</html>