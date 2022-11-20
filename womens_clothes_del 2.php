<?php
    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_dkim11";
    $pwd = "Senior-chrome*noisy";
    $dbName = "cs329e_bulko_dkim11";
    $conn = new mysqli($server,$user,$pwd,$dbName);

    if($conn->connect_errno){
        die('Connect Error:'.$conn->connect_errno.":".$conn->connect_error);
    }

    $idx = $_POST['idx'];
    $pwd = $_POST['pwd'];
    
    $query = "SELECT * FROM womens_clothes where idx='$idx' and pwd='$pwd' "; // update only when password matches
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result);

        if(!$data[idx]){
            echo "
            <script>
            alert('Could not be deleted due to wrong password.');
            history.back(1);
            </script>
            ";
            exit;
        } 

    $query = "DELETE FROM womens_clothes WHERE idx='$idx' ";

    mysqli_query($conn, $query);

?>
<script>
    location.href='womens_clothes_list.php';
</script>