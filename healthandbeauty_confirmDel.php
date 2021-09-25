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
?>


<form action="healthandbeauty_del.php" method="post"> 
    <input type="hidden" name="idx" value="<?=$idx?>">
    <table width=800 border="1" cellpadding=5 >
        <tr>
            <th colspan=2> Delete #<?=$idx?> Post? </th>
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