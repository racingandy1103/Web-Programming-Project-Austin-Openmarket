<!DOCTYPE html>

<html lang="en">

    <head>
        <title> My Page </title>
        <meta charset="UTF-8">
        <meta name="description" content="buying/selling website">
        <meta name="author" content="Group 10 (Dogyun Kim, Yang-Kai Hsieh, Lavanya Makdani, Nitya Kopparapu)">
        <link rel="stylesheet" href="project.css">
    </head>

    <body>

        <div id="topnav">
            <p>
                <a href=homepage.html>
                    <img src="logo.jpeg" width="200px" height="20px">
                </a>
            </p>
            <p>
                <a href=aboutUs.html> About Us </a>
            </p>
            <p>
                <a href=tutorial.html> Tutorial Page </a>
            </p>
            <p>
                <a href=tips_for_safe_transactions.html> Tips for Safe Transactions </a>
            </p>
            <p>
                <a href=listofgoods_homeappliances.html> List of Goods </a>
            </p>
            <p>
                <a href=my_page.php> My page </a> <!--redundant??should we have it after logging in-->
            </p>
            <p>
                <a href=login.php> Log In </a>
            </p>
            <p>
                <a href=contactus.html> Contact Us </a>
            </p>
        </div>
        <?php

            if(!isset($_COOKIE['logname'])) {

        ?>

        <div id="searchbar">
            <input type="text" placeholder="Search what you need.." size="50" />
            <input type="submit" value="Submit">
        </div>

        
        <p id="content">
            Please <a href="login.php">Log In</a> before acccessing my page.
        </p>

        </div>

        <?php }else{ ?>

        <p id="content">
            You have logged in! <br>
            <h2>My Page Content Here</h2>
        </p>

        <?php } ?>


        <div id="footer">
            <span>
                <script> document.write(new Date().toLocaleDateString()); </script>
            </span>
                <span style="float:right;" id="copyright">
                    All copyrights go to ©  Dogyun Kim, Yang-Kai Hsieh, Lavanya Makdani, Nitya Kopparapu
                </span>
        </div>

    </body>


</html>

