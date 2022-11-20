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
    $query = "SELECT * FROM sporting_goods where idx='$idx' ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

    $ext = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
    $file = $_FILES['fileToUpload']["tmp_name"];
    $filename = basename($file) . "." . $ext;
    $to = "images/" . $filename;
?>

<head>
    <link rel="stylesheet" href="project.css">
</head>

<form action="sporting_goods_writePost.php" method="post"> 
    <input type="hidden" name="idx" value="<?=$idx?>">
    <table width=800 border="1" cellpadding=5 >
        <tr>
            <th> Contact number </th> 
            <td> <?=$data[contact]?> </td>
        </tr>
        <tr>
            <th> Product name </th> 
            <td> <?=$data[subject]?></td>
        </tr>
        <tr>
            <th> Price </th> 
            <td> <?=$data[price]?> </td>
        </tr>
        <tr>
            <th> Description </th> 
            <td><?php if ($data[image]!='images/.') echo "<img src=\"$data[image]\" width=\"250\" height=\"400\"><br>";?>
            <?=nl2br($data[memo])?></td>
        </tr>

        <tr>
            <td colspan="2">
                <div style="float:right; ">
                    <a href="sporting_goods_confirmDel.php?idx=<?=$idx?>">Delete</a>
                    <a href="sporting_goods_write.php?idx=<?=$idx?>">Update</a>
                </div>

                <a href="sporting_goods_list.php">Go back to list</a>
            </td>
        </tr>
    </table> 
</form> 
