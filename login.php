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
                <a href=home_appliances_list.php> List of Goods </a>
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
                     <input type="password" name="pass" id="pass" placeholder= "Please enter your password here" style="height:35px; width:400px; font-size: 15pt"><br>



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
            //error_reporting(E_ALL);
            //ini_set("display_errors", "on");
            

            $lastName = $_POST["logid"];
            $firstName = $_POST["pass"];
            $server = "spring-2021.cs.utexas.edu";
            $user   = "cs329e_bulko_lavanyam";
            $pwd    = "Whole6Inlet6shore";
            $dbName = "cs329e_bulko_lavanyam";

            $mysqli = new mysqli($server, $user, $pwd, $dbName);

            if ($mysqli->connect_errno) {
                die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
            } 
            else {
                //echo "<code>...Connection successful</code> <br>";
            
            }
            //Select Database
            $mysqli->select_db($dbName) or die($mysqli->error);
            $lastName = $mysqli->real_escape_string($lastName);
            $firstName = $mysqli->real_escape_string($firstName);

            $query1 = "SELECT username, passwords FROM website_users WHERE username = '$lastName' AND passwords = '$firstName'";
            $result1 = $mysqli->query($query1) or die($mysqli->error);
            $row = $result1->fetch_array(MYSQLI_ASSOC);
            $query4 = "SELECT username FROM website_users WHERE username = '$lastName'";
            $result4 = $mysqli->query($query4) or die($mysqli->error);
            $row4 = $result4->fetch_array(MYSQLI_ASSOC);
        


            if (!empty($_POST)){
            if(!is_null($row['username'])) {
                //echo "This username doesn't exist, inserting into table";
                setcookie("logname", "$lastName", time()+(900), "/");
                header('Location:my_page.php');
                echo "User confirmed";
                } 
                else if(is_null($row4['username'])) {
                    echo "
                    <script>
                    alert('Username not found please register!');
                    </script>
                    ";
                    } 
                else if($row4['passwords'] != $firstName ){
                    echo "
                    <script>
                    alert('Wrong password, please try again!');
                    </script>
                    ";
                
                    } 
            
            }
        

?>

    </body>


</html>

