<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: ../");
    exit();
}

// Access the username and mobile number from session
$username = $_SESSION['username'];
$mobilenumber = $_SESSION['mob'];

// Check voting status
if (isset($_SESSION["status"])) {
    $status = '<b class="text-success">Voted</b>';
} else {
    $status = '<b class="text-danger">Not Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system - Dashboard</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     <!-- CSS file -->
     <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-secondary text-light">
    <div class="container my-5">
        <a href="../"><button class="btn btn-dark text-light px-3">Back</button></a>
        <a href="logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>
        <h1 class="my-3">Voting System</h1>
        <div class="row my-5">
            <div class="col-md-7">
                <?php
        if(isset($_SESSION['groups'])){
               $groups= $_SESSION['groups'];
               for($i=0;$i<count($groups);$i++){
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="../uploads/<?php echo $groups[$i]['photo'] ?>" alt="Group image">
                    </div>
                    <div class="col-md-8">
                        <strong class="text-dark h5">Group name:</strong><br>
                        <strong class="text-dark h5">Votes:</strong><br>
                    </div>
                </div>
                <hr>
                <?php
               }
        }
                ?>
                <!-- Groups -->
                
            </div>
            <div class="col-md-5">
                <!-- User profile -->
                <img src="../uploads/<?php echo $data['photo'] ?>" alt="User image">
                <br><br>
                <strong class="text-dark h5">Name:</strong>
                <?php echo $data['photo'] ?>
                <?php echo $username; ?><br><br>


                <strong class="text-dark h5">Mobile:</strong>
                <?php echo $mobilenumber; ?><br><br>
                <strong class="text-dark h5">Status:</strong>
                <?php echo $status; ?><br><br>
            </div>
        </div>
    </div>
</body>
</html>
