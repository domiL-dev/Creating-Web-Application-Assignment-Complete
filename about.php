<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="About My Assignment"/>
        <meta name="keywords"    content="Details, About My Assignment" />
        <meta name="author"      content="Dominik Leibel" />
        <title>About My Assignment</title>

        <link href="styles/style.css" rel="stylesheet"/>

    </head>

<body>
 
    <header>
        <?php
        include_once("header.inc");
        include_once("menu.inc");
        ?>
      </header>

      <!--Definition list Information about me-->
      <dl>
        <dt>My Name</dt>
        <dd>Dominik Leibel</dd>
        
        <dt>Student number</dt>
        <dd>105323278</dd>
        
        <dt>My tutor's name</dt>
        <dd>Yi Tian</dd>

        <dt>My Course</dt>
        <dd>International student abroad program</dd>

        <dt>Student email</dt>
        <dd><a id="email" href="mailto:105323278@student.swin.edu.au">105323278@student.swin.edu.au</a></dd>
      </dl>

    <!--Picture of me-->  
    <figure id="me">
        <img src="images/Me.png" alt="Photo of me" title="Filsize 76 kb"/>
        <figcaption>That's me!</figcaption>
    </figure>
   
<!--Timetable-->    
<section id="timetable">
    <table>
        <thead>
            <tr>
                <th colspan="6">Student Timetable</th>
            </tr>
            <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>09:30 - 10:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10:30 - 11:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td>COS60009 Data Management for the Big Data Age</td>
                <td></td>
            </tr>
            <tr>
                <td>11:30 - 12:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>12:30 - 13:30</td>
                <td>COS80022 Software Quality and Testing</td>
                <td>COS60004 Creating Web Applications</td>
                <td>COS60009 Data Management for the Big Data Age</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>13:30 - 14:30</td>
                <td></td>
                <td>COS60004 Creating Web Applications</td>
                <td>COS60009 Data Management for the Big Data Age</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>14:30 - 15:30</td>
                <td>COS60004 Creating Web Applications</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>15:30 - 16:30</td>
                <td>COS60004 Creating Web Applications</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>16:30 - 17:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>17:30 - 18:30</td>
                <td>COS80022 Software Quality and Testing</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</section>

<?php
    include_once("footer.inc");
?>

</body>

</html>