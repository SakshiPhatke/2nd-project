<?php
include('connect.php');

$username=$_POST['username'];
$mobileno=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$std=$_POST['std'];



if($password!=$cpassword)
{
    echo '<script>
    alert("Passwords do not match");
    window.location="registration.php";
    </script>';
}

else{
     move_uploaded_file($tmp_name,"voter_project/$image");
    $sql="INSERT into userdata (username,mobile,password,photo,standard,status,votes) values ('$username','$mobileno ','$password','$image','$std',0,0)";

    $result=mysqli_query($con,$sql);

    if($result){
        echo '<script>
    alert("Registration successfull");
    window.location="registration.php";
    </script>';

    }else{
        die(mysqli_error($con));
    }
}












?>