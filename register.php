<!DOCTYPE html>

<html lang="en">

    <head>
        <title> Registration </title>
        <meta charset="UTF-8">
        <meta name="description" content="Register Account">
        <meta name="author" content="Group 10 (Dogyun Kim, Yang-Kai Hsieh, Lavanya Makdani, Nitya Kopparapu)">
        <link rel="stylesheet" href="project.css">
        <script src="register.js" defer></script>
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


        

        <div id="login">
            <form onsubmit="login()">

    
                <div id= "regtxt">
                    <p id= "header"><br><b>Account Registration</b><br><br></p>
    
                    <p>
                    Please your e-mail address:
                    <input required type="email" name="email" id="email" placeholder= "Please enter your email here" value="" style="height:28px; width:375px; font-size: 13pt"><br>

                    Please your desired login ID:
                    <input required type="text" name="logid" id="logid" placeholder= "Please enter your ID here" value="" style="height:28px; width:375px; font-size: 13pt"><br>
        

                    Please enter your desired password:
                     <input required type="text" name="pass" id="pass" placeholder= "Please enter your password here" style="height:28px; width:375px; font-size: 13pt"><br>

                     Please re-enter your desired password:
                     <input required type="text" name="re_pass" id="re_pass" placeholder= "Please enter your password here" style="height:28px; width:375px; font-size: 13pt"><br>
            



                    <input type = "submit" value = "Register" id = "register" style="height:30px; width:150px; background-color:#fcda9f; font-size: 16pt"/>
                    <input type = "reset" value = "Clear" style="height:30px; width:130px; background-color:#fcda9f; font-size: 16pt"/><br>
                    </p>
                </div>

                
                    <p id = "required">
                    <b> Things to be note when creating account:</b><br>
                    The username and password must be between 6 and 20 characters long, inclusive.<br>
                    Username and password are case sensitive, so enter carefully<br>
                    The username and password must contain only letters and digits.<br>
                    The password must have at least one lower case letter, at least one upper case letter, and at least one digit.<br>

                    </p>
                

        </div>

        


        <div id="footer">
            <span>
                <script> document.write(new Date().toLocaleDateString()); </script>
            </span>
                <span style="float:right;" id="copyright">
                    All copyrights go to ©  Dogyun Kim, Yang-Kai Hsieh, Lavanya Makdani, Nitya Kopparapu
                </span>
        </div>


        <?php

            if((!empty($_POST))){
                $used = false;
                $file_r = fopen("passwd.txt", "r+");
                while (($line = fgets($file_r)) !== false) {
                    $line = str_replace("\n", "", $line);
                    $group = explode(":", $line);
                    if($_POST['logid'] == $group[0]){
                        $used = true;
                    }
                }
                fclose($file_r);
        
                if($used){
                    echo "<div id= 'login'>";
                    echo "This username has been used. Please pick another username";
                    echo "</div>";
                }else{
                    $file_w = fopen("passwd.txt", "a");
                    $string1 = $_POST['logid'] . ":";
                    fwrite($file_w, $string1);
                    $string2 = $_POST['pass'] . "\n";
                    fwrite($file_w, $string2);
                    fclose($file_w);
                    setcookie("logname", "$string1", time()+(60), "/");
                    header("Location:my_page.php");
            
                }

        
            }

        ?>
    </body>


</html>
