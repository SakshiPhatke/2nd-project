<?php 
session_start();
if(isset($_SESSION['id']))
{
    header('loacation:index1.php');
}
$data=$_SESSION['data'];
if($_SESSION['status']==1)
{
    $status='<b class="text-success">voted</b>';
}
else{
    $status='<b class="text-danger">Not voted</b>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
     crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
</head>
<body class="bg-secondary text-light">
    <div class="container my-5">

    <a href="index1.php"><button class="btn btn-dark text-light px-3">Back</button></a>
    <a href="logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>

    <h1 class="my-3">Voting System</h1>
    <div class="row my-5">
        <div class="col-md-7">

        <?php 
            if(isset($_SESSION['groups']))
            {
                $groups=$_SESSION['groups'];
                for($i=0;$i<count($groups);$i++){
        ?>
                    <div class="row">
                    <div class="col-md-4">
                        <img src="uploads/<?php echo $groups[$i]['photo'];?>" alt="Group Image" style="height:80px;width:35%;">
                    </div>
                    <div class="col-md-8">
                        <strong class="text-dark h5">Group Name:</strong>
                        <?php echo $groups[$i]['username'];?>
                        <br>

                        <strong class="text-dark h5">Votes:</strong>
                        <?php echo $groups[$i]['votes'];?>
                        <br>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
               
                <form action="voting.php" method="POST">
                    <input type="hidden" name="gvotes" value="<?php echo $groups[$i]['votes'];?>">
                    <input type="hidden" name="gid" value="<?php echo $groups[$i]['id'];?>">

                    <?php 
                            if($_SESSION['status']==1){
                    ?>
                            <button class="bg-success my-3 text-white px-3">Voted</button>
                            <hr>
                    <?php 
                            }
                            else
                            {
                    ?>
                            <button class="bg-danger my-3 text-white px-3" type="submit">vote</button>
                            <hr>
                     </form>
                    <?php 
                  }
                }
            } 
            else{
            ?>
                    <div class="container">
                        <p>No Groups to Display</p>
                    </div>
                <?php
                 }
            
                ?>
    
    

            <!-- groups -->
           
        </div>

        <div class="col-md-5">
            <!-- user profile -->
            <img src="uploads/<?php echo $data['photo'];?>" alt="user Image" style="height:100px;width:30%;">
            <br>
            <br>
            <strong class="text-dark h5">Name:</strong>
            <?php echo $data['username'];?><br><br>
            <strong class="text-dark h5">Mobile:</strong>
            <?php echo $data['mobile'];?><br><br>
            <strong class="text-dark h5">Status:</strong>
            <?php echo $status;?><br><br>
        </div>

    </div>
    </div>
</body>
</html>