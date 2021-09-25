<!DOCTYPE html>

<html lang="en">

    <head>
        <title> Login Page</title>
        <meta charset="UTF-8">
        <meta name="description" content="Login Page">
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

        <div id="login">
            <form action = '' method = 'post'>

                <div id="logintxt">
                
                    <p id= "header"><br><b>Login and Password</b><br><br></p>
    
                    
                    Please enter your login ID:
                    <input type="text" name="logid" id="logid" placeholder= "Please enter your username here" value="" style="height:35px; width:400px; font-size: 15pt"><br>
        

                    Please enter your password:
                     <input type="text" name="pass" id="pass" placeholder= "Please enter your password here" style="height:35px; width:400px; font-size: 15pt"><br>
        



                    <input type = "submit" value = "Log In" id = "log_btn" style="height:35px; width:150px; background-color:#fcda9f; font-size: 20pt"/>
                    <input type = "reset" value = "Clear" style="height:35px; width:150px; background-color:#fcda9f; font-size: 20pt"/><br>
                    </p>

                    </div>

                    <p style="font-size: 22pt;">
                    Or <a href="register.php">Register</a> for an account here.
                    </p>
                    

        </div>

        <?php }else{ ?>

        <p id="content">
            You have logged in! <br>
            Check My page for more information.
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


        <?php
            error_reporting(E_ALL);
            ini_set("display_errors", "on");

            if (!isset($_COOKIE['logname'])) {
                

                $file = fopen ("passwd.txt", "r+");

                if((!empty($_POST))){
                    while (($line = fgets($file)) !== false) {
                        $line = str_replace("\n", "", $line);
                        $group = explode(":", $line);
                        if($_POST["logid"] == $group[0]){
                            if($_POST["pass"] == $group[1]){
                                setcookie("logname", "$group[0]", time()+(60), "/");
                                header("Location: my_page.php");
                            }else{
                                echo "Wrong Password<br>";
                            }
                        }
                    }
                echo "<p style='text-align:center; font-size: 20pt; color:red;'>Cannot find such Username</p>";
        
                }else{
                    
                }   
    }


?>

    </body>


</html>

