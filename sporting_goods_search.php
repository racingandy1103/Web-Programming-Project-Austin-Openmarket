<?php
    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_dkim11";
    $pwd = "Senior-chrome*noisy";
    $dbName = "cs329e_bulko_dkim11";
    $conn = new mysqli($server,$user,$pwd,$dbName);

    if($conn->connect_errno){
        die('Connect Error:'.$conn->connect_errno.":".$conn->connect_error);
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>
        <title>Products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <meta name="description" content="sporting_goods">
        <meta name="author" content="Group 10">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        
        <div id="sidenav">
            <a href-"javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="home_appliances_list.php"> Home Appliances</a>
            <a href="books_list.php">Books</a>
            <a href="sporting_goods_list.php">Sporting goods</a>
            <a href="womens_clothes_list.php">Women's clothes</a>
            <a href="mens_clothes_list.php">Men's clothes</a>
            <a href="healthandbeauty_list.php">Health and beauty</a>
            <a href="electronics_list.php">Electronics</a>
            <a href="others_list.php">Others</a>
        </div>
        
        <form action="sporting_goods_search.php" method="post">
            <div style="float:right;">
                <label for="sporting_goods_search">Search what you need:</label>
                <input type="text" id="sporting_goods_search" name="skey">
                <input type="submit" value="Search">
            </div>
        </form>

        <div style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Categories</div>

        <script>
            function openNav() {
                document.getElementById("sidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("sidenav").style.width = "0";
            }
        </script>

        <span class = "title" style="color:grey; font-size:30px;">Sporting Goods</span>
        <a href="sporting_goods_write.php">Post My Item</a> 

        <table width=800 border="1" >
            <tr>
                <th width=50 > No </th> 
                <th> Title </th> 
                <th width=90> Price </th> 
                <th width=150> Contact number </th>
                <th width=90 > Date posted </th> 
            </tr>    

        <?php
            $user_skey = $_POST['skey'];

            $query = "SELECT * FROM sporting_goods WHERE subject like '%$user_skey%' ORDER BY idx DESC";
            $result = mysqli_query($conn, $query);

            while($data = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td> <?=$data[idx]?> </td>
                <td> <a href="sporting_goods_view.php?idx=<?=$data[idx]?>"><?=$data[subject]?><br>
                <img src="<?=$data[image]?>" width="250" height="400"></a> </td>
                <td> <?=$data[price]?> </td>
                <td> <?=$data[contact]?> </td>
                <td> <?=substr($data[regdate],0,10)?> </td>

        <?php } ?>
        </table>

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