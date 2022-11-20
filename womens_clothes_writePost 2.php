<?php 
    ini_set('display_errors',1);
    error_reporting(E_WARNING);
    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_dkim11";
    $pwd = "Senior-chrome*noisy";
    $dbName = "cs329e_bulko_dkim11";
    $conn = new mysqli($server,$user,$pwd,$dbName);

    if($conn->connect_errno){
        die('Connect Error:'.$conn->connect_errno.":".$conn->connect_error);
    }
    
    $ext = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
    $file = $_FILES['fileToUpload']["tmp_name"];
    $filename = basename($file) . "." . $ext;
    $to = "images/" . $filename;
    $img = move_uploaded_file ($file , $to);

    $contact = $_POST['contact'];
    $idx= $_POST['idx'];
    $price = $_POST['price'];
    $subject = $_POST['subject'];
    $memo = $_POST['memo'];
    $pwd = $_POST['pwd'];

    // update
    if($idx){
        $query = "SELECT * FROM womens_clothes where idx='$idx' and pwd='$pwd' "; // update only when password matches
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result);

        if(!$data[idx]){
            echo "
            <script>
            alert('Could not be updated due to wrong password.');
            history.back(1);
            </script>
            ";
            exit;
        }

        $query = "UPDATE womens_clothes SET contact='$contact',
        subject='$subject',
        price='$price',
        memo='$memo',
        image='$to'
        where idx='$idx' ";

        mysqli_query($conn, $query);
    }
    else{

        $regdate = date("Y-m-d H:i:s");

        $query = "INSERT INTO womens_clothes(contact, price, subject, memo, regdate, pwd, image)
        VALUES('$contact','$price','$subject','$memo','$regdate', '$pwd', '$to') "; 

        mysqli_query($conn, $query);
    }
?>
<script>
    location.href='womens_clothes_list.php';
</script>