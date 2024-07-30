<?php
session_start();
include('connect.php');

// $username = mysqli_real_escape_string($con, $_POST['username']);
// $mobileno = mysqli_real_escape_string($con, $_POST['mobile']);
// $password = mysqli_real_escape_string($con, $_POST['password']);
// $std = mysqli_real_escape_string($con, $_POST['std']);

    $username=$_POST['username'];
    $mobileno=$_POST['Mobile'];
    $password=$_POST['Password'];
    $std=$_POST['std'];

$sql = "SELECT * FROM userdata WHERE username='$username' AND mobile='$mobileno' AND password='$password' AND standard='$std'";
    $result = mysqli_query($con, $sql);

    $num=mysqli_num_rows($result); 

        if($num>0)
        {
         $sql = "SELECT username, photo, votes, id FROM userdata WHERE standard='group'";
         $resultgroup = mysqli_query($con, $sql);

        if (mysqli_num_rows($resultgroup) > 0) {
        $groups = mysqli_fetch_all($resultgroup, MYSQLI_ASSOC);
        $_SESSION['groups'] = $groups;
    }

    $data = mysqli_fetch_array($result);
    $_SESSION['id'] = $data['id'];
    $_SESSION['status'] = $data['status'];
    $_SESSION['data'] = $data;

    echo '<script>
    window.location="dash1.php";
    </script>';
} else {
    echo '<script>
    alert("Invalid credentials");
    window.location="index1.php";
    </script>';
}
?>
