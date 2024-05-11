<?php 
require_once("config/db.php");

if(isset($_GET['cn'])) {
    $id = $_GET['cn'];
    // Prepare the delete statement
    $query = "DELETE FROM `batting` WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    // Execute the delete statement
    if(mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    // Close the statement
    mysqli_stmt_close($stmt);
}

$query = "SELECT * FROM batting";
$result = mysqli_query($con, $query);
?>

<!-- Your HTML code here -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Batting</title>
    <style>
        tr {
            text-align:center;
        }
        .one{
           font-weight: bold;
        }
        .botnav {
  overflow: hidden;
  padding-left:20px;
  padding-right:70px;
  margin-left:655px; 
  margin-right:650px;
}
      .botnav1{
  overflow: hidden;
  padding-left:30px;
  padding-right:80px;
  margin-left:600px; 
  margin-right:650px;
  width: 300px;
}
body {
      background: linear-gradient(135deg, #b3ffab, #12fff7);
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
<h3 style="color:red; text-align:center;margin-top:10px;" >BATTING STATS</h3>
        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        
                        <table class="table table-bordered">
                            <tr class="one">
                                <td>ID</td>
                                <td>Cap Number</td>
                                <td>Name</td>
                                <td>Runs</td>
                                <td>Strike-Rate</td>
                                <td>Average</td>
                                <td>Highest-Score</td>
                                <td>Not-Outs</td>
                                <td>Delete</td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id= $row['id'];
                                        $cnum = $row['cnum'];
                                        $plname = $row['plname'];
                                        $totalruns=$row['totalruns'];
                                        $sr=$row['sr'];
                                        $average = $row['average'];
                                        $hs = $row['hs'];
                                        $noto = $row['noto'];
                            ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $cnum ?></td>
                                        <td><?php echo  $plname ?></td>
                                        <td><?php echo  $totalruns ?></td>
                                        <td><?php echo  $sr ?></td>
                                        <td><?php echo  $average ?></td>
                                        <td><?php echo $hs ?></td>
                                        <td><?php echo $noto ?></td>
                                        <td><a href="batting_stats.php?cn=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>

                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="botnav1">
                <a href="addbattingrec.php" class="btn btn-primary">Add New Record</a>
        </div>
        <br>
        <div class="botnav">
        <a href="2.html" class='btn btn-primary'>Back</a>
        </div>
        <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
</body>
</html>