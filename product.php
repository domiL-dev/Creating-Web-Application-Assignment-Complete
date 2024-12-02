<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Product Description"/>
        <meta name="keywords"    content="Details, Product" />
        <meta name="author"      content="Dominik Leibel" />
        <title>Our Product</title>

        <link href="styles/style.css" rel="stylesheet"/>

    </head>

<body id="ProductPage">

    <header>
    <?php
        include_once("header.inc");
        include_once("menu.inc");
    ?>
    </header>

    <h2 >Our Products:</h2>

    <!--Container: Product Range-->
    <div id="ProductRange">

        <!--Container Product Range slides-->
        <div class="ProductRange_slides">
            <!--Container Product 1-->
    
            <div class="slide">
                <div class="slideNumber">Product: 1 / 4</div>

                <div  class="Product">
                    <img  class="ProductImage" src="images/SONY_PLAYSTATION_VR2.png" alt="META_Quest_3" title="Filsize 5,29 kb"/>
                    <a class="ImageSource" href="https://www.mediamarkt.de/de/product/_sony-playstation-vr2-vr-system-2874327.html">Image source</a>
                    <p id="Product_1"><a href="#ProductDescription_1">SONY PLAYSTATION VR2</a></p>
                        
                        <div class="ProductOptions">
                            <p>Prices:</p>
                            <p>128 GB (800 EUR)</p>
                            <p>256 GB (1000 EUR)</p>
                        </div>
            </div>
            <!--Arrows Product 1-->
            <div class="arrows">
                <label for="slide_2" class="next">&#9654;</label>
            </div>

        </div>

            <!--Container Product 2-->
            <div class="slide">
                <div class="slideNumber">Product: 2 / 4</div>
            <div class="Product">
                <img  class="ProductImage" src="images/META_Quest_3.png" alt="META_Quest_3" title="Filsize 6,65 kb"/>
                <a class="ImageSource" href="https://www.mediamarkt.de/de/product/_meta-quest-3-vr-headset-2885269.html">Image source</a>
                <p><a href="#ProductDescription_2">META Quest 3</a> </p>
                
                <div class="ProductOptions">
                    <p>Prices:</p>
                    <p>128 GB (900 EUR)</p>
                    <p>256 GB (1100 EUR)</p>
                </div>
            </div>
            <!--Arrows Product 2-->
            <div class="arrows">
                <label for="slide_1" class="last">&#9664;</label>
                <label for="slide_3" class="next">&#9654;</label>
            </div>
    </div>
    
            <!--Container Product 3-->

            <div class="slide">
                <div class="slideNumber">Product: 3 / 4</div>
                <div  class="Product">
                    <img class="ProductImage" src="images/PICO_4_All-in-One.png" alt="PICO_4-All-in-One" title="Filsize 4,51 kb"/>
                    <a class="ImageSource" href="https://www.mediamarkt.de/de/product/_pico-4-all-in-one-vr-headset-128-gb-vr-headset-2836062.html">Image source</a>
                    <p><a href="#ProductDescription_3">PICO 4 All-in-One</a></p>
                
                    <div class="ProductOptions">
                        <p>Prices:</p>
                        <p>128 GB (600 EUR)</p>
                        <p>256 GB (800 EUR)</p>
                    </div>
                </div>
                <!--Arrows Product 3-->
                <div class="arrows">
                    <label for="slide_2" class="last">&#9664;</label>
                    <label for="slide_4" class="next">&#9654;</label>
                </div>
            </div>

            <!--Container Product 4-->
            <div class="slide">
                <div class="slideNumber">Product: 4 / 4</div>
                <div class="Product">
                    <img class="ProductImage" src="images/HTC_XR_Elite.png" alt="HTC_XR_Elite" title="Filsize 4,09 kb"/>
                    <a class="ImageSource" href="https://www.mediamarkt.de/de/product/_htc-xr-elite-vr-headset-2852492.html">Image source</a>
                    <p><a href="#ProductDescription_4">HTC XR Elite</a></p>
                    
                    <div class="ProductOptions">
                        <p>Prices:</p>
                        <p>128 GB (1000 EUR)</p>
                        <p>256 GB (1200 EUR)</p>
                    </div>
                </div>
                
                <!--Arrows Product 3-->
                <div class="arrows">     
                    <label for="slide_3" class="last">&#9664;</label>
                    </div>
                </div>

        </div>

    </div>


<!--Product Description-->
<section id="ProductDescriptions">
    <h2>Product Descriptions:</h2>
        <!--Product 1-->
        <section id="ProductDescription_1" class="ProductDescriptions">
           
            <article class="ProductDescription">
            <h4>SONY PLAYSTATION VR2</h4> 
                <p>
                Experience a New Reality: Escape into worlds that feel, look, and sound truly real with next-generation VR gaming on PlayStation VR2.  
                </p>
    
                <p>
                Unmatched Performance: Immerse yourself in stunning 4K HDR visuals in compatible games, with an expansive 110º field of view and cutting-edge graphic rendering, all powered by the PS5.    
                </p>
    
                <p>
                Enhanced Sensory and Emotional Experiences: Discover the revolutionary PlayStation VR2 Sense technology, featuring eye-tracking, headset feedback, and 3D audio. These advanced features work in harmony with the new intuitive controllers to deliver more realistic sensations and emotional responses in compatible games.
                </p>
    
                <p>
                Effortless Setup: With a quick and simple single-cable connection to your PS5 console, you can dive straight into the action without delay.
                </p>
    
                <p>
                Thrilling New Worlds: Venture into groundbreaking next-generation virtual reality games and explore new worlds in ways you've never imagined. Each adventure promises to captivate and immerse you, redefining what's possible in the realm of gaming. 
                </p>
    
                <p>
                More about the options on the right-hand side or below. 
                </p>
            </article>
        <a class="Reference" href="https://www.mediamarkt.de/de/product/_sony-playstation-vr2-vr-system-2874327.html">Reference</a>
    </section>

    <!--Product 2-->
    <section id="ProductDescription_2" class="ProductDescriptions">
              
            <article class="ProductDescription">
            <h4>META Quest 3</h4>  
                <p>
                Be ready to transform your home into an exciting experience where virtual elements seamlessly blend with your real environment. With a library of over 500 titles, there's something for everyone to discover. Completely redesigned from the ground up, Meta Quest 3 is a wireless headset that offers entirely new experiences and limitless possibilities. It is suitable for individuals aged 10 and up. 
                </p>
    
                <p>
                As the most advanced wireless all-in-one Quest headset, Meta Quest 3 delivers full freedom of movement and even more power. Transform your home into a thrilling world where virtual elements merge with your surroundings. Experience stunning, crystal-clear visuals and immersive spatial audio for incredibly intense experiences. The new design features a 40% slimmer optical profile compared to Quest 2 and includes adjustable straps for maximum comfort. The Touch Plus controllers, equipped with TruTouch haptics, offer an enhanced grip, bringing virtual worlds even closer to your fingertips. 
                </p>
    
                <p>
                Dive into the extensive library of over 500 titles and enjoy your favorite content in gaming, fitness, entertainment, social spaces, travel, and more like never before.
                </p>
    
                <p>
                More about the options on the right-hand side or below. 
                </p>
            </article>
        <a class="Reference" href="https://www.mediamarkt.de/de/product/_meta-quest-3-vr-headset-2885269.html">Reference</a>
    </section>

    <!--Product 3-->
    <section id="ProductDescription_3" class="ProductDescriptions">
        
            <article class="ProductDescription">
            <h4>PICO 4 All-in-One</h4>
                <p>
                The PICO 4 All-in-One VR Headset offers a cutting-edge virtual reality experience with top-tier software and a comfortable design. Featuring a 4K+ resolution, 8 GB of RAM, the PICO 4 delivers stunning visuals with a 35% higher resolution than standard 4K. Weighing just 300 grams without the head strap, it's designed for all-day comfort, with an ergonomic headband ensuring a secure fit.    
                </p>
    
                <p>
                With its pancake lens design, the PICO 4 is lighter and more compact, while the enhanced motion tracking and 90 Hz refresh rate provide smooth, immersive gameplay. The headset also supports motorized IPD adjustment for precise visual clarity.
                </p>
    
                <p>
                The PICO Store offers over 250 games, with new titles released weekly, alongside a fitness app, live video performances, and wireless streaming from a PC-VR library. Powered by PICO OS 5.0, the headset ensures seamless access to a wide range of entertainment, making it a versatile and powerful VR device.
                </p>
    
                <p>
                More about the options on the right-hand side or below. 
                </p>
            </article>
        <a class="Reference" href="https://www.mediamarkt.de/de/product/_pico-4-all-in-one-vr-headset-128-gb-vr-headset-2836062.html">Reference</a>
    </section>

    <!--Product 4-->
    <section id="ProductDescription_4" class="ProductDescriptions">
         
            <article class="ProductDescription">
            <h4>HTC XR Elite</h4>   
                <p>
                The HTC XR Elite is a powerful standalone headset that seamlessly transforms into a portable pair of glasses, offering exceptional graphics and high-resolution. This dynamic XR device merges realities with vivid, high-definition XR passthrough, powered by four wide-angle tracking cameras, a high-resolution RGB color camera, and a depth sensor.
                </p>
    
                <p>
                Customize your visual experience with adjustable interpupillary distance and diopters, allowing you to fine-tune sharpness without the need for glasses. The device delivers stunning visuals with a combined resolution of 3840 x 1920, a field of view up to 110°, and a 90Hz refresh rate.    
                </p>
    
                <p>
                The hand-tracking technology enables intuitive, natural interactions, while the 6-Degrees-of-Freedom controllers with ergonomically placed buttons enhance your experience.
                </p>
    
                <p>
                The built-in speakers provide powerful, clear sound, and the detachable battery offers up to 2 hours of continuous power. Designed for comfort, the adjustable fit and balanced design ensure a comfortable experience for everyday use. 
                </p>
    
                <p>
                More about the options on the right-hand side or below. 
                </p>
            </article>
        <a class="Reference" href="https://www.mediamarkt.de/de/product/_htc-xr-elite-vr-headset-2852492.html">Reference</a>
    </section>
</section>

    <!--aside with Product options-->
    <aside>
    <h2>Options:</h2>
        <section id="Options">
            <p> &#9432; Hover with your mouse over the titles to show options</p>
            
            <ol>
                <li>SONY PLAYSTATION VR2
                    <div class="VisibilityOptions">
                        <h5>options:</h5>
                        <ul>
                            <li>128 GB</li>
                            <li>256 GB</li>
                            <li>white</li>
                            <li>black</li>
                        </ul>
                    </div>
                </li>

                <li>META Quest 3
                    <div class="VisibilityOptions">
                        <h5>Options:</h5>
                        <ul>
                            <li>128 GB</li>
                            <li>256 GB</li>
                            <li>white</li>
                            <li>black</li>
                        </ul>
                    </div>
                </li>

                <li>PICO 4 All-in-One
                
                    <div class="VisibilityOptions">
                        <h5>Options:</h5>
                        <ul>
                            <li>128 GB</li>
                            <li>256 GB</li>
                            <li>white</li>
                            <li>black</li>
                        </ul>
                    </div>
                </li>

                <li>HTC XR Elite
    
                    <div class="VisibilityOptions">
                        <h5>Options:</h5>
                        <ul>
                            <li>128 GB</li>
                            <li>256 GB</li>
                            <li>white</li>
                            <li>black</li>
                        </ul>
                    </div>
                </li>
        
            </ol>
        </section>

    <!--Button to open the Style Checker-->
        <div id="styleCheck">
        <h2>Get to the Style Checker:</h2>
        <button id="styleCheck_button">Style Check</button>
        </div>

    </aside>



<?php
    include_once("footer.inc");
?>

    <script src="scripts/product.js"></script>

</body>


</html>