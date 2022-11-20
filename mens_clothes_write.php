<?php
    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_dkim11";
    $pwd = "Senior-chrome*noisy";
    $dbName = "cs329e_bulko_dkim11";
    $conn = new mysqli($server,$user,$pwd,$dbName);

    if($conn->connect_errno){
        die('Connect Error:'.$conn->connect_errno.":".$conn->connect_error);
    }
    
    $idx = $_GET['idx'];
    $query = "SELECT * FROM mens_clothes where idx='$idx' ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
?>

<head>
    <link rel="stylesheet" href="project.css">
</head>

<form action="mens_clothes_writePost.php" method="post"> 
    <input type="hidden" name="idx" value="<?=$idx?>">
    <table width=800 border="1" cellpadding=5 >
        <tr>
            <th> Contact number </th> 
            <td> <input type="text" name="contact" value="<?=$data[contact]?>"> </td>
        </tr>
        <tr>
            <th> Product name </th> 
            <td> <input type="text" name="subject" style="width:100%; " value="<?=$data[subject]?>"> </td>
        </tr>
        <tr>
            <th> Price </th> 
            <td> <input type="text" name="price" value="<?=$data[price]?>"> </td>
        </tr>
        <tr>
            <th> Description </th> 
            <td> 
                <textarea name="memo" style="width:100%; height:300px;"><?=$data[memo]?></textarea> 
            </td>
        </tr>
        <tr>
            <th> Image Upload </th> 
            <td>
                    <input type="file" name="fileToUpload" id="fileToUpload">
            </td>
        </tr>
        <tr>
            <th> Password </th> 
            <td> <input type="password" name="pwd" placeholder="password" size=20> </td>
        </tr>

        <tr>
            <td colspan="2">
                <div style="text-align:center; ">
                        <input type="submit" value="Post">
                </div> 
            </td>
        </tr>
    </table>
</form> 