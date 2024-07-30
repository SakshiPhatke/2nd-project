<?php
session_start();

include('connect.php');

$votes=$_POST['gvotes'];
$totalvotes=$votes+1;
$gid=$_POST['gid'];
$uid=$_POST['id'];

$update_votes=mysqli_query($con,"UPDATE userdata SET votes='$totalvotes' WHERE id='$gid'");

$update_status=mysqli_query($con,"UPDATE userdata SET status=1 WHERE id='$gid'");

if($update_votes and $update_status)
{
    $getgroups=mysqli_query($con,"SELECT username,photo,votes,id from userdata  WHERE standard='group'");
    $groups=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
    $_SESSION['groups']=$groups;
    $_SESSION['status']=1;

    echo '
    <script>
        alert("Voting Successfully......!");
        window.location="dash1.php";
    </script> ';
   
}
else{
     
    echo '
    <script>
        alert("Technical error !! please login after sometime....!");
        window.location="dash1.php";
    </script>  ';
  
}

?>