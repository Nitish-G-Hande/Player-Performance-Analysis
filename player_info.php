<?php 

    require_once("config/db.php");
    $query = " select * from players ";
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Player Information</title>
    <style>
        .botnav {
  overflow: hidden;
  padding-left:20px;
  padding-right:70px;
  margin-left:655px; 
  margin-right:650px;
}
body {
      background: linear-gradient(135deg, #FF4E50,#F9D423);
      background-size: 400% 400%;
      animation: gradientAnimation 5s ease infinite;
      color: #000;
    }

    @keyframes gradientAnimation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
    </style>
</head>
<body class="bg-dark">
<h3 style="color:white; text-align:center;margin-top:10px;" >PLAYER INFORMATION </h3>
        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        
                        <table class="table table-bordered">
                            <tr align="center">
                                <th>Cap Number</th>
                                <th>Name</th>
                                <th>Images</th>
                                <th>Age</th>
                                <th>Team</th>
                                
                                
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $cno = $row['cno'];
                                        $name = $row['name'];
                                        $photo=$row['photo'];
                                        $age = $row['age'];
                                        $team = $row['team'];
                            ?>
                                    <tr align="center">
                                        <td><?php echo $cno ?></td>
                                        <td><?php echo  $name ?></td>
                                        <td><?php echo "<img src='$photo' height='100' width='100'"?></td>
                                        <td><?php echo $age ?></td>
                                        <td><?php echo $team ?></td>
                                        
                                       
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="botnav">
        <a href="2.html" class='btn btn-primary'>Back</a>
</div><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>